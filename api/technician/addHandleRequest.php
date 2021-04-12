<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Handle_req.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate part object
  $request = new Handle_req($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $request->WorkOrderID = $data->WorkOrderID;
  $request->EmployeeID = $data->EmployeeID;

  // Create request
  if($request->create()) {
    echo json_encode(
      array('message' => 'Request successfully assigned to Employee: '.$request->EmployeeID)
    );
  } else {
    echo json_encode(
      array('message' => 'Unsuccessful.')
    );
  }