<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/New_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate new car object
$newCar = new New_car($db);

// new car query
$result = $newCar->read();
// Get row count
$num = $result->rowCount();

// Check for any new car entries
if ($num > 0) {

    // array of entries
    $newCar_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
            'Transmission' => $Transmission,
            'Terrain' => $Terrain,
            'Seating_capacity' => $Seating_capacity,
            'Torque' => $Torque,
            'Region' => $Region,
            'DRL' => $DRL
        );

        // Push to "data"
        array_push($newCar_arr, $car_entry);
    }

    // Turn to JSON & output
    echo json_encode($newCar_arr);
} else {
    // No new car entries
    echo json_encode(
        array('message' => 'No New Cars Found')
    );
}
