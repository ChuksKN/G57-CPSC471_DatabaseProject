<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/CarOwner.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate object
    $owner = new CarOwner($db);

    // Get parameters
    
    $owner->CustomerID = isset($_GET['CustomerID']) ? $_GET['CustomerID']: die();



    // Get sales
    $owner->read_single();

    // Create an array
    $owner_arr = array();

    $owner_entry = array(
        'CustomerID' => $owner->CustomerID,
        'VIN' => $owner->VIN,
        'LPlateNumber' => $owner->LPlateNumber,
        'RegistrationInfo' => $owner->RegistrationInfo

    );

    //Make JSON
    print_r(json_encode($owner_entry));
