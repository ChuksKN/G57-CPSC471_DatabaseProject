<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Facilitates_used_sale.php';
include_once '../../models/CarOwner.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate usedSale object
$usedSale = new Facilitates_used_sale($db);

$update_owner = new CarOwner($db);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$usedSale->USaleID = $data->USaleID;

$usedSale->EmployeeID = $data->EmployeeID;
$usedSale->CustomerID = $data->CustomerID;
$usedSale->VIN = $data->VIN;
$usedSale->USaleDate = $data->USaleDate;
$usedSale->LPlateNo = $data->LPlateNo;
$usedSale->PaymentMethod = $data->PaymentMethod;

$update_owner->CustomerID = $data->CustomerID;
$update_owner->RegistrationInfo = $data->RegistrationDetails;
$update_owner->LPlateNumber = $data->LPlateNo;
$update_owner->VIN = $data->VIN;

// Update usedSale
if ($usedSale->update()) {
  $update_owner->update();
  echo json_encode(
    array('message' => 'Used Car Sale Entry Updated')
  );
} else {
  if (is_null($usedSale->errormsg)) {
    echo json_encode(
      array('message' => 'Entry information did not update.')
    );
  } else {
    echo json_encode(
      array('message' => 'Entry information did not update. ' . $usedSale->errormsg)
    );
  }
}
