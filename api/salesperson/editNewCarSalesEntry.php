<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Facilitates_new_sale.php';
include_once '../../models/CarOwner.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate newSale object
$newSale = new Facilitates_new_sale($db);

$update_owner = new CarOwner($db);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$newSale->SaleID = $data->SaleID;

$newSale->EmployeeID = $data->EmployeeID;
$newSale->CustomerID = $data->CustomerID;
$newSale->VIN = $data->VIN;
$newSale->SaleDate = $data->SaleDate;
$newSale->LPlateNo = $data->LPlateNo;
$newSale->RegistrationDetails = $data->RegistrationDetails;
$newSale->Method_of_Payment = $data->Method_of_Payment;

$update_owner->CustomerID = $data->CustomerID;
$update_owner->RegistrationInfo = $data->RegistrationDetails;
$update_owner->LPlateNumber = $data->LPlateNo;
$update_owner->VIN = $data->VIN;

// Update post
if ($newSale->update()) {
  $update_owner->update();
  echo json_encode(
    array('message' => 'New Car Sale Entry Updated')
  );
} else {
  if (is_null($newSale->errormsg)) {
    echo json_encode(
      array('message' => 'Entry information did not update.')
    );
  } else {
    echo json_encode(
      array('message' => 'Entry information did not update. ' . $newSale->errormsg)
    );
  }
}
