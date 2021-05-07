<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Parts.php';
  
    // Instantiate DB & connect 
    $database = new Database();
    $db = $database->connect();
    // Instantiate part object
    $part = new Parts($db);

    // Get EmployeeID
    $part->PartID = isset($_GET['PartID']) ? $_GET['PartID'] : die();

    // Get part
    $part->read_single();

    $part_entry = array(
        'PartID' => $part->PartID,
        'Part_Desc' => $part->Part_Desc,
        'PartName' => $part->PartName,
        'Price' => $part->Price
    );

    //Make JSON
    print_r(json_encode($part_entry));