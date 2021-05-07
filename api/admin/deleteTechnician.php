<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';
    include_once '../../models/Technician.php';
    include_once '../../models/Handle_req.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate tech object
    $emp = new Employee($db);
    $tech = new Technician($db);
    $request = new Handle_req($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $tech->Super_EID = $data->Super_EID;

    $result = $tech->read_under();
    // Get row count
    $num = $result->rowCount();
  
    // Check for any employee under admin
    if($num > 0) {
  
        // array of entries
        $tech_arr = array();
  
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        // Push to "data"
        array_push($tech_arr, $EmployeeID);
        }

      // Set EmployeeID to update
      $emp->EmployeeID = $data->EmployeeID;
      $tech->EmployeeID = $data->EmployeeID;
      $request->EmployeeID = $data->EmployeeID;

      if(in_array($tech->EmployeeID, $tech_arr))
      {

            // Delete tech person
            if($request->delete_by_eid() && $tech->delete() && $emp->delete()){
                echo json_encode(
                    array('message' => 'Technician Has Been Deleted')
                );
            }
            else{
                echo json_encode(
                    array('message' => 'Failed To Delete Technician')
                );
            }
       
      }
      else
      {
        echo json_encode(
            array('message' => 'Not Authorized to delete this employee.')
        );
      } 
  } 
  else{
      // No salespeople
      echo json_encode(
      array('message' => 'No Technician Found working under Employee ID: ' .$tech->Super_EID)
      );
  }