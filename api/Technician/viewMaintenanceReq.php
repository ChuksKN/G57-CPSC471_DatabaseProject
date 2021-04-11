<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Technician.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate Technician object
    $tech = new Technician($db);

    // maintenance request query
    $result = $tech->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any maintenance entries
    if($num > 0) {

      // array of entries
      $maintenanceReq_arr = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $request_entry = array(
          'WorkOrderID' => $WorkOrderID,
          'WorkCost' => $WorkCost,
          'Request_Date' => $Request_Date,

        );

        // Push to "data"
        array_push($rentalCar_arr, $car_entry);
      }

      // Turn to JSON & output
      echo json_encode($rentalCar_arr);

    } else {
      // No maintenance request entries
      echo json_encode(
        array('message' => 'No Maintenance Request Entries Found')
      );
    }
