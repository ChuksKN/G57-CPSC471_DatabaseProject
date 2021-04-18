<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Maintenance_req.php';
    include_once '../../models/Handle_req.php';
    include_once '../../models/Make_req.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $request = new Maintenance_req($db);
    $handler = new Handle_req($db);
    $mk = new Make_req($db);

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
        $handler->WorkOrderID = $data->WorkOrderID;
        $mk->WorkOrderID = $data->WorkOrderID;

        if(in_array($handler->WorkOrderID, $request_arr))
        {

              // Delete handler person
              if($handler->delete() && $request->delete() && $mk->delete()){
                  echo json_encode(
                      array('message' => 'Maintenance Request Has Been Deleted')
                  );
              }
              else{
                    if(!is_null($handler->errormsg))
                    {
                        echo json_encode(
                            array('message' => 'Failed To Delete Maintenance Request. '.$handler->errormsg)
                        );
                    }
                    else if(!is_null($request->errormsg))
                    {
                        echo json_encode(
                            array('message' => 'Failed To Delete Maintenance Request. '.$request->errormsg)
                        );
                    }
                    else if(!is_null($mk->errormsg))
                    {
                        echo json_encode(
                            array('message' => 'Failed To Delete Maintenance Request. '.$request->errormsg)
                        );
                    }
                    else
                    {
                        echo json_encode(
                            array('message' => 'Failed To Delete Maintenance Request.')
                        );
                    }
              }
        }
        else
        {
          echo json_encode(
              array('message' => 'Not Authorized to delete this request.')
          );
        } 
    } 
    else{
        // No salespeople
        echo json_encode(
        array('message' => 'No maintenance requests found under Employee ID: ' .$handler->EmployeeID)
        );
    }