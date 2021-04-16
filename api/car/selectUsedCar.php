<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Used_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate used car sale entry object object
$used_car = new Used_car($db);

// Get parameters
$used_car->VIN = isset($_GET['VIN']) ? $_GET['VIN'] : die();



// Get sales
$used_car->read_single();

// Create an array
$usedCar_arr = array();

$usedCar_entry = array(
    'VIN' => $used_car->VIN,
    'Manufacturer' => $used_car->Manufacturer,
    'Make' => $used_car->Make,
    'Year' => $used_car->Year,
    'Engine' => $used_car->Engine,
    'Output' => $used_car->Output,
    'No_of_doors' => $used_car->No_of_doors,
    'Fuel_tank_cap' => $used_car->Fuel_tank_cap,
    'Transmission' => $used_car->Transmission,
    'Terrain' => $used_car->Terrain,
    'Seating_capacity' => $used_car->Seating_capacity,
    'Torque' => $used_car->Torque,
    'Region' => $used_car->Region,
    'DRL' => $used_car->DRL,
    'DistanceTravelled' => $used_car->DistanceTravelled
);

//Make JSON
print_r(json_encode($usedCar_entry));
