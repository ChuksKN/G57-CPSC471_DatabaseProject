<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';
    include_once '../../models/Salesperson.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate sales object
    $emp = new Employee($db);
    $sales = new Salesperson($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $sales->Super_EID = $data->Super_EID;

    $result = $sales->read_under();
    // Get row count
    $num = $result->rowCount();
  
    // Check for any employee under admin
    if($num > 0) {
  
        // array of entries
        $sales_arr = array();
  
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        // Push to "data"
        array_push($sales_arr, $EmployeeID);
        }

      // Set EmployeeID to update
      $emp->EmployeeID = $data->EmployeeID;
      $sales->EmployeeID = $data->EmployeeID;

      if(in_array($sales->EmployeeID, $sales_arr))
      {

            // Delete sales person
            if($sales->delete() && $emp->delete()){
                echo json_encode(
                    array('message' => 'Sales Person Has Been Deleted')
                );
            }
            else{
                echo json_encode(
                    array('message' => 'Failed To Delete Sales Person')
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
      array('message' => 'No Salesperson Found working under Employee ID: ' .$sales->Super_EID)
      );
  }
