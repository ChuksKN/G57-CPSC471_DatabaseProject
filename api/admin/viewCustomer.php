<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Customer.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate customer object
$customer = new Customer($db);

// customer query
$result = $customer->read();
// Get row count
$num = $result->rowCount();

// Check for any customer entries
if ($num > 0) {

    // array of entries
    $customer_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $customer_entry = array(
            'CustomerID' => $CustomerID,
            'CName' => $CName,
            'C_DOB' => $C_DOB,
            'Credit_Score' => $Credit_Score,
            'Drivers_License' => $Drivers_License,
            'PhoneNo' => $PhoneNo
        );

        // Push to "data"
        array_push($customer_arr, $customer_entry);
    }

    // Turn to JSON & output
    echo json_encode($customer_arr);
} else {
    // No customer
    echo json_encode(
        array('message' => 'No Salesperson Found')
    );
}
