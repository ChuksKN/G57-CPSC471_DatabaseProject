<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate admin object
$admin = new Admin($db);

// admin query
$result = $admin->read();
// Get row count
$num = $result->rowCount();

// Check for any admin entries
if ($num > 0) {

    // array of entries
    $admin_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $employee_entry = array(
            'EmployeeID' => $EmployeeID,
            'Fname' => $Fname,
            'Lname' => $Lname,
            'DOB' => $DOB,
            'Email' => $Email,
            'Address' => $Address,
            'PhoneNumber' => $PhoneNumber,
            'Salary' => $Salary,
            'Super_SSN' => $Super_SSN
        );

        // Push to "data"
        array_push($admin_arr, $employee_entry);
    }

    // Turn to JSON & output
    echo json_encode($admin_arr);
} else {
    // No admin
    echo json_encode(
        array('message' => 'No Admin Found')
    );
}
