<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Rental_car.php';
include_once '../../models/Car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate car object
$add_car = new Car($db);
$rental_car = new Rental_car($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$rental_car->VIN = $data->VIN;
$rental_car->LPlateNo = $data->LPlateNo;

$add_car->VIN = $data->VIN;
$add_car->Manufacturer = $data->Manufacturer;
$add_car->Make = $data->Make;
$add_car->Year = $data->Year;
$add_car->Engine = $data->Engine;
$add_car->Output = $data->Output;
$add_car->No_of_doors = $data->No_of_doors;
$add_car->Fuel_tank_cap = $data->Fuel_tank_cap;
$add_car->Transmission = $data->Transmission;
$add_car->Terrain = $data->Terrain;
$add_car->Seating_capacity = $data->Seating_capacity;
$add_car->Torque = $data->Torque;
$add_car->Region = $data->Region;
$add_car->DRL = $data->DRL;

// Create car
if ($add_car->create()) {
    $rental_car->create();
    echo json_encode(
        array('message' => 'Rental car successfully added.')
    );
} else {
    echo json_encode(
        array('message' => 'Unsuccessful.')
    );
}
