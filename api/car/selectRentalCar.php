<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Rental_car.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate rental car sale entry object object
$rental_car = new Rental_car($db);

// Get parameters
$rental_car->VIN = isset($_GET['VIN']) ? $_GET['VIN'] : die();



// Get sales
$rental_car->read_single();

// Create an array
$rentalCar_arr = array();

$rentalCar_entry = array(
    'VIN' => $rental_car->VIN,
    'Manufacturer' => $rental_car->Manufacturer,
    'Make' => $rental_car->Make,
    'Year' => $rental_car->Year,
    'Engine' => $rental_car->Engine,
    'Output' => $rental_car->Output,
    'No_of_doors' => $rental_car->No_of_doors,
    'Fuel_tank_cap' => $rental_car->Fuel_tank_cap,
    'Transmission' => $rental_car->Transmission,
    'Terrain' => $rental_car->Terrain,
    'Seating_capacity' => $rental_car->Seating_capacity,
    'Torque' => $rental_car->Torque,
    'Region' => $rental_car->Region,
    'DRL' => $rental_car->DRL,
    'LPlateNo' => $rental_car->LPlateNo
);

//Make JSON
print_r(json_encode($rentalCar_entry));
