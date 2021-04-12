<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Parts.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog part object
  $part = new Parts($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $part->PartID = $data->PartID;

  $part->Part_Desc = $data->Part_Desc;
  $part->PartName = $data->PartName;
  $part->Price = $data->Price;

  // Update part
  if($part->update()) {
    echo json_encode(
      array('message' => 'Part information Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Part information did not update.')
    );
  }