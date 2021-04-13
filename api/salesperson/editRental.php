<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Facilitates_rental.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$rental = new Facilitates_rental($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$rental->RentalID = $data->RentalID;

$rental->EmployeeID = $data->EmployeeID;
$rental->CustomerID = $data->CustomerID;
$rental->VIN = $data->VIN;
$rental->RentalDetails = $data->RentalDetails;
$rental->LPlateNo = $data->LPlateNo;
$rental->PaymentMethod = $data->PaymentMethod;
$rental->StartDate = $data->StartDate;
$rental->ReturnDate = $data->ReturnDate;

// Update post
if ($rental->update()) {
  echo json_encode(
    array('Succes!' => 'Car Rental Updated')
  );
} else {
  echo json_encode(
    array('Failed!' => 'Car Rental Not Updated')
  );
}
