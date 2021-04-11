<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Salesperson.php';
  
    // Instantiate DB & connect 
    $database = new Database();
    $db = $database->connect();
    // Instantiate salesperson object
    $sales = new Salesperson($db);

    // Get EmployeeID
    $sales->EmployeeID = isset($_GET['EmployeeID']) ? $_GET['EmployeeID'] : die();

    // Get sales
    $sales->read_single();

    // Create an array
    $sales_arr = array();

    $employee_entry = array(
        'EmployeeID' => $sales->EmployeeID,
        'Fname' => $sales->Fname,
        'Lname' => $sales->Lname,
        'DOB' => $sales->DOB,
        'Email' => $sales->Email,
        'Address' => $sales->Address,
        'PhoneNumber' => $sales->PhoneNumber,
        'Salary' => $sales->Salary,
        'Super_EID' => $sales->Super_EID
    );

    //Make JSON
    print_r(json_encode($employee_entry));