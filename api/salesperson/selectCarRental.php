<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Facilitates_rental.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate car rental entry object object
    $rental = new Facilitates_rental($db);

    // Get parameters
    $rental->EmployeeID = isset($_GET['EmployeeID']) ? $_GET['EmployeeID']:
    $rental->CustomerID = isset($_GET['CustomerID']) ? $_GET['CustomerID']:
    $rental->VIN = isset($_GET['VIN']) ? $_GET['VIN']:
    $rental->RentalID = isset($_GET['RentalID']) ? $_GET['RentalID']: die();



    // Get sales
    $rental->read_single();

    // Create an array
    $rental_arr = array();

    $rental_entry = array(
        'EmployeeID' => $rental->EmployeeID,
        'CustomerID' => $rental->CustomerID,
        'VIN' => $rental->VIN,
        'RentalID' => $rental->RentalID,
        'RentalDetails' => $rental->RentalDetails,
        'LPlateNo' => $rental->LPlateNo,
        'PaymentMethod' => $rental->PaymentMethod,
        'StartDate' => $rental->StartDate,
        'ReturnDate' => $rental->ReturnDate

    );

    //Make JSON
    print_r(json_encode($rental_entry));