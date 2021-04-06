<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Car.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate car object
  $car = new Car($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $car->VIN = $data->VIN;
  $car->Manufacturer = $data->Manufacturer;
  $car->Make = $data->Make;
  $car->Year = $data->Year;
  $car->Engine = $data->Engine;
  $car->Output = $data->Output;
  $car->No_of_doors = $data->No_of_doors;
  $car->Fuel_tank_cap = $data->Fuel_tank_cap;
  $car->Transmission = $data->Transmission;
  $car->Terrain = $data->Terrain;
  $car->Seating_capacity = $data->Seating_capacity;
  $car->Torque = $data->Torque;
  $car->Region = $data->Region;
  $car->DRL = $data->DRL;

  // Create car
  if($car->create()) {
    echo json_encode(
      array('message' => 'Car successfully added.')
    );
  } else {
    echo json_encode(
      array('message' => 'Unsuccessful.')
    );
  }
