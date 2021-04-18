<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Maintenance_req.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate request object
  $request = new Maintenance_req($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $request->WorkOrderID = $data->WorkOrderID;
  $request->WorkCost = $data->WorkCost;
  $request->Request_Date = $data->Request_Date;

  // Create request
  if($request->create()) {
    echo json_encode(
      array('message' => 'Maintenance Request successfully added.')
    );
  } else {
    if(is_null($request->errormsg))
    {
      echo json_encode(
        array('message' => 'Unsuccessful.')
      );
    }
    else
    {
      echo json_encode(
        array('message' => 'Unsuccessful. '.$request->errormsg)
      );
    }
  }