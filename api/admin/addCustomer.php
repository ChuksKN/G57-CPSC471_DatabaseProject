<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Customer.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate employee and Customer object
$customer = new Customer($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$customer->CustomerID = $data->CustomerID;
$customer->CName = $data->CName;
$customer->C_DOB = $data->C_DOB;
$customer->Credit_Score = $data->Credit_Score;
$customer->Drivers_License = $data->Drivers_License;
$customer->PhoneNo = $data->PhoneNo;


// Create Customer
if ($customer->create()) {
    echo json_encode(
        array('message' => 'Customer successfully added.')
    );
} else {
    echo json_encode(
        array('message' => 'Failed to add Customer.')
    );
}
