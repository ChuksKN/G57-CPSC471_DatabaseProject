<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Maintenance_req.php';
    include_once '../../models/Handle_req.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $request = new Maintenance_req($db);
    $handler = new Handle_req($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $handler->EmployeeID = $data->EmployeeID;

    $result = $handler->read_under();
    // Get row count
    $num = $result->rowCount();
  
    // Check for any requests under technician
    if($num > 0) {
  
        // array of entries
        $request_arr = array();
  
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        // Push to "data"
        array_push($request_arr, $WorkOrderID);
        }

        $request->WorkOrderID = $data->WorkOrderID;
        $request->WorkCost = $data->WorkCost;
        $request->Request_Date = $data->Request_Date;

        if(in_array($request->WorkOrderID, $request_arr))
        {

              // Delete handler person
              if($request->update()){
                  echo json_encode(
                      array('message' => 'Maintenance Request Has Been updated')
                  );
              }
              else{
                    if(is_null($request->errormsg))
                    {
                        echo json_encode(
                        array('message' => 'Failed to update Maintenance Request')
                        );
                    }
                    else{
                        echo json_encode(
                            array('message' => 'Failed to update Maintenance Request. Error '.$request->errormsg)
                            );
                    }
              }
        }
        else
        {
          echo json_encode(
              array('message' => 'Not Authorized to update this request.')
          );
        } 
    } 
    else{
        // No salespeople
        echo json_encode(
        array('message' => 'No maintenance requests found under Employee ID: ' .$handler->EmployeeID)
        );
    }