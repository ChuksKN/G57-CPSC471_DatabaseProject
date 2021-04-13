<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Facilitates_used_sale.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate new car sale entry object object
    $used_sale = new Facilitates_used_sale($db);

    // Get parameters
    $used_sale->EmployeeID = isset($_GET['EmployeeID']) ? $_GET['EmployeeID']:
    $used_sale->CustomerID = isset($_GET['CustomerID']) ? $_GET['CustomerID']:
    $used_sale->VIN = isset($_GET['VIN']) ? $_GET['VIN']:
    $used_sale->USaleID = isset($_GET['USaleID']) ? $_GET['USaleID']: die();



    // Get sales
    $used_sale->read_single();

    // Create an array
    $usedSale_arr = array();

    $usedSale_entry = array(
        'EmployeeID' => $used_sale->EmployeeID,
        'CustomerID' => $used_sale->CustomerID,
        'VIN' => $used_sale->VIN,
        'USaleID' => $used_sale->USaleID,
        'USaleDate' => $used_sale->USaleDate,
        'LPlateNo' => $used_sale->LPlateNo,
        'PaymentMethod' => $used_sale->PaymentMethod

    );

    //Make JSON
    print_r(json_encode($usedSale_entry));
