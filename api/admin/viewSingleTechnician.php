<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Technician.php';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate technician object
    $tech = new Technician($db);

    // Get EmployeeID
    $tech->EmployeeID = isset($_GET['EmployeeID']) ? $_GET['EmployeeID'] : die();

    // Get tech
    $tech->read_single();

    // Create an array
    $tech_arr = array(
        'EmployeeID' => $tech->EmployeeID,
        'Fname' => $tech->Fname,
        'Lname' => $tech->Lname,
        'DOB' => $tech->DOB,
        'Email' => $tech->Email,
        'Address' => $tech->Address,
        'PhoneNumber' => $tech->PhoneNumber,
        'Salary' => $tech->Salary,
        'Super_EID' => $tech->Super_EID,
        'T_grade' => $tech->T_grade
    );

    // Make JSON object
    print_r(json_encode($tech_arr));
