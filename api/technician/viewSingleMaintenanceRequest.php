<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Maintenance_req.php';
  
    // Instantiate DB & connect 
    $database = new Database();
    $db = $database->connect();
    // Instantiate request object
    $request = new Maintenance_req($db);

    // Get EmployeeID
    $request->WorkOrderID = isset($_GET['WorkOrderID']) ? $_GET['WorkOrderID'] : die();

    // Get request
    $request->read_single();

    $request_entry = array(
        'WorkOrderID' => $request->WorkOrderID,
        'WorkCost' => $request->WorkCost,
        'Request_Date' => $request->Request_Date
    );

    //Make JSON
    print_r(json_encode($request_entry));