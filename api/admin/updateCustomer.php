<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Customer.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set VIN to update
$customer = new Customer($db);

$customer->CustomerID = $data->CustomerID;

$result = $customer->check_id();

// Get row count
$num = $result->rowCount();

// Check for any new car entries with given VIN
if ($num > 0) {
    // array of entries
    $customer_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($customer_arr, $CustomerID);
    }

    if (in_array($customer->CustomerID, $customer_arr)) {

        $customer->CName = $data->CName;
        $customer->C_DOB = $data->C_DOB;
        $customer->Credit_Score = $data->Credit_Score;
        $customer->Drivers_License = $data->Drivers_License;
        $customer->PhoneNo = $data->PhoneNo;

        // Update the customer
        if ($customer->update()) {
            echo json_encode(
                array('message' => 'The customer has been updated')
            );
        } else {
            echo json_encode(
                array('message' => 'Entry has not been updated')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'No customer with the given ID.')
        );
    }
} else {
    // No customer
    echo json_encode(
        array('message' => 'No customer with the given ID OR Incorrect function usage')
    );
}
