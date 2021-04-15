<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Car.php';
include_once '../../models/Rental_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set VIN to update
$rental_car = new Car($db);
$rentalcar_entry = new Rental_car($db);

$rentalcar_entry->VIN = $data->VIN;

$result = $rentalcar_entry->check_vin();

// Get row count
$num = $result->rowCount();

// Check for any new car entries with given VIN
if ($num > 0) {
    // array of entries
    $rentalcar_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($rentalcar_arr, $VIN);
    }

    // Set VIN to update
    $rental_car->VIN = $data->VIN;

    if (in_array($rental_car->VIN, $rentalcar_arr)) {

        $rental_car->Manufacturer = $data->Manufacturer;
        $rental_car->Make = $data->Make;
        $rental_car->Year = $data->Year;
        $rental_car->Engine = $data->Engine;
        $rental_car->Output = $data->Output;
        $rental_car->No_of_doors = $data->No_of_doors;
        $rental_car->Fuel_tank_cap = $data->Fuel_tank_cap;
        $rental_car->Transmission = $data->Transmission;
        $rental_car->Terrain = $data->Terrain;
        $rental_car->Seating_capacity = $data->Seating_capacity;
        $rental_car->Torque = $data->Torque;
        $rental_car->Region = $data->Region;
        $rental_car->DRL = $data->DRL;

        $rentalcar_entry->LPlateNo = $data->LPlateNo;

        // Update the rental car entry
        if ($rental_car->update()) {
            $rentalcar_entry->update();
            echo json_encode(
                array('message' => 'The rental car entry has been updated')
            );
        } else {
            echo json_encode(
                array('message' => 'Entry has not been updated')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'No rental car entry with the given VIN.')
        );
    }
} else {
    // No rental car entry
    echo json_encode(
        array('message' => 'No rental car entry with the given VIN OR Incorrect function usage')
    );
}
