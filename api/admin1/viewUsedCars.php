<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Used_car.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate used car object
    $used_car = new Used_car($db);

    // used car query
    $result = $used_car->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any used car entries
    if($num > 0) {

      // array of entries
      $usedCar_arr = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $car_entry = array(
          'VIN' => $VIN,
          'Manufacturer' => $Manufacturer,
          'Make' => $Make,
          'Year' => $Year,
          'Engine' => $Engine,
          'Output' => $Output,
          'No_of_doors' => $No_of_doors,
          'Fuel_tank_cap' => $Fuel_tank_cap,
          'Transmission' => $Transmission
          'Terrain' => $Terrain
          'Seating_capacity' => $Seating_capacity
          'Torque' => $Torque
          'Region' => $Region
          'DRL' => $DRL
          'DistanceTravelled' => $DistanceTravelled
        );

        // Push to "data"
        array_push($usedCar_arr, $car_entry);
      }

      // Turn to JSON & output
      echo json_encode($usedCar_arr);

    } else {
      // No used car entries
      echo json_encode(
        array('message' => 'No Used Car Sales Entries Found')
      );
    }
