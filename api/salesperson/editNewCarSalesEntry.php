<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Facilitates_new_sale.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate newSale object
$newSale = new Facilitates_new_sale($db);

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


// Update newSale
if ($newSale->update()) {
    echo json_encode(
        array('Success!' => 'New Car Sale Entry Updated')
    );
} else {
    echo json_encode(
        array('Failed!' => 'New Car Sale Not Updated')
    );
}
