<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/New_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate new car sale entry object object
$new_car = new New_car($db);

// Get parameters
$new_car->VIN = isset($_GET['VIN']) ? $_GET['VIN'] : die();



// Get sales
$new_car->read_single();

// Create an array
$newCar_arr = array();

$newCar_entry = array(
    'VIN' => $new_car->VIN,
    'Manufacturer' => $new_car->Manufacturer,
    'Make' => $new_car->Make,
    'Year' => $new_car->Year,
    'Engine' => $new_car->Engine,
    'Output' => $new_car->Output,
    'No_of_doors' => $new_car->No_of_doors,
    'Fuel_tank_cap' => $new_car->Fuel_tank_cap,
    'Transmission' => $new_car->Transmission,
    'Terrain' => $new_car->Terrain,
    'Seating_capacity' => $new_car->Seating_capacity,
    'Torque' => $new_car->Torque,
    'Region' => $new_car->Region,
    'DRL' => $new_car->DRL
);

//Make JSON
print_r(json_encode($newCar_entry));
