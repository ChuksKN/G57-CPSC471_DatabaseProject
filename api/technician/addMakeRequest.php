<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Make_req_req.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate part object
  $request = new Make_req($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $request->CustomerID = $data->CustomerID;
  $request->WorkOrderID = $data->WorkOrderID;

  // Create request
  if($request->create()) {
    echo json_encode(
      array('message' => 'Request successfully assigned to Customer: '.$request->CustomerID)
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