<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Car.php';
include_once '../../models/Used_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set VIN to update
$used_car = new Car($db);
$usedcar_entry = new Used_car($db);

$usedcar_entry->VIN = $data->VIN;

$result = $usedcar_entry->check_vin();

// Get row count
$num = $result->rowCount();

// Check for any new car entries with given VIN
if ($num > 0) {
    // array of entries
    $usedcar_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($usedcar_arr, $VIN);
    }

    // Set VIN to update
    $used_car->VIN = $data->VIN;

    if (in_array($used_car->VIN, $usedcar_arr)) {

        $used_car->Manufacturer = $data->Manufacturer;
        $used_car->Make = $data->Make;
        $used_car->Year = $data->Year;
        $used_car->Engine = $data->Engine;
        $used_car->Output = $data->Output;
        $used_car->No_of_doors = $data->No_of_doors;
        $used_car->Fuel_tank_cap = $data->Fuel_tank_cap;
        $used_car->Transmission = $data->Transmission;
        $used_car->Terrain = $data->Terrain;
        $used_car->Seating_capacity = $data->Seating_capacity;
        $used_car->Torque = $data->Torque;
        $used_car->Region = $data->Region;
        $used_car->DRL = $data->DRL;

        $usedcar_entry->DistanceTravelled = $data->DistanceTravelled;

        // Update the used car entry
        if ($used_car->update()) {
            $usedcar_entry->update();
            echo json_encode(
                array('message' => 'The used car entry has been updated')
            );
        } else {
            echo json_encode(
                array('message' => 'Entry has not been updated')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'No used car entry with the given VIN.')
        );
    }
} else {
    // No used car entry
    echo json_encode(
        array('message' => 'No used car entry with the given VIN OR Incorrect function usage')
    );
}
