<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Car.php';
include_once '../../models/New_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set VIN to update
$new_car = new Car($db);
$newcar_entry = new New_car($db);

$newcar_entry->VIN = $data->VIN;

$result = $newcar_entry->check_vin();

// Get row count
$num = $result->rowCount();

// Check for any new car entries with given VIN
if ($num > 0) {
    // array of entries
    $newcar_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($newcar_arr, $VIN);
    }

    // Set VIN to update
    $new_car->VIN = $data->VIN;

    if (in_array($new_car->VIN, $newcar_arr)) {

        $new_car->Manufacturer = $data->Manufacturer;
        $new_car->Make = $data->Make;
        $new_car->Year = $data->Year;
        $new_car->Engine = $data->Engine;
        $new_car->Output = $data->Output;
        $new_car->No_of_doors = $data->No_of_doors;
        $new_car->Fuel_tank_cap = $data->Fuel_tank_cap;
        $new_car->Transmission = $data->Transmission;
        $new_car->Terrain = $data->Terrain;
        $new_car->Seating_capacity = $data->Seating_capacity;
        $new_car->Torque = $data->Torque;
        $new_car->Region = $data->Region;
        $new_car->DRL = $data->DRL;

        // Update the new car entry
        if ($new_car->update()) {
            echo json_encode(
                array('message' => 'The new car entry has been updated')
            );
        } else {
            echo json_encode(
                array('message' => 'Entry has not been updated')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'No new car entry with the given VIN.')
        );
    }
} else {
    // No new car entry
    echo json_encode(
        array('message' => 'No new car entry with the given VIN OR Incorrect function usage')
    );
}
