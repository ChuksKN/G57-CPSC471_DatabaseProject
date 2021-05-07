<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Facilitates_new_sale.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate new car sale entry object object
    $new_sale = new Facilitates_new_sale($db);

    // Get parameters
    $new_sale->EmployeeID = isset($_GET['EmployeeID']) ? $_GET['EmployeeID']:
    $new_sale->CustomerID = isset($_GET['CustomerID']) ? $_GET['CustomerID']:
    $new_sale->VIN = isset($_GET['VIN']) ? $_GET['VIN']:
    $new_sale->SaleID = isset($_GET['SaleID']) ? $_GET['SaleID']: die();



    // Get sales
    $new_sale->read_single();

    // Create an array
    $newSale_arr = array();

    $newSale_entry = array(
        'EmployeeID' => $new_sale->EmployeeID,
        'CustomerID' => $new_sale->CustomerID,
        'VIN' => $new_sale->VIN,
        'SaleID' => $new_sale->SaleID,
        'SaleDate' => $new_sale->SaleDate,
        'LPlateNo' => $new_sale->LPlateNo,
        'RegistrationDetails' => $new_sale->RegistrationDetails,
        'Method_of_Payment' => $new_sale->Method_of_Payment

    );

    //Make JSON
    print_r(json_encode($newSale_entry));