<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Rental_car.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate rental car object
    $rental_car = new Rental_car($db);

    // rental car query
    $result = $rental_car->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any rental car entries
    if($num > 0) {

      // array of entries
      $rentalCar_arr = array();

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
          'LPlateNo' => $LPlateNo
        );

        // Push to "data"
        array_push($rentalCar_arr, $car_entry);
      }

      // Turn to JSON & output
      echo json_encode($rentalCar_arr);

    } else {
      // No rental car entries
      echo json_encode(
        array('message' => 'No Rental Car Entries Found')
      );
    }
