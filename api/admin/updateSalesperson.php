<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Employee.php';
  include_once '../../models/Salesperson.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $sales = new Employee($db);
  $sales_entry = new Salesperson($db);

  $sales_entry->Super_EID = $data->Super_EID;

  $result = $sales_entry->read_under();
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
    $sales->EmployeeID = $data->EmployeeID;

        if(in_array($sales->EmployeeID, $sales_arr))
        {

            $sales->Fname = $data->Fname;
            $sales->Lname = $data->Lname;
            $sales->DOB = $data->DOB;
            $sales->Email = $data->Email;
            $sales->Address = $data->Address;
            $sales->PhoneNumber = $data->PhoneNumber;
            $sales->Salary = $data->Salary;
            $sales->Super_EID = $data->Super_EIDUpdate;
        
            // Update sales
            if($sales->update()) {
            echo json_encode(
                array('message' => 'Salesperson Updated')
            );
            } else {
            echo json_encode(
                array('message' => 'Salesperson Not Updated')
            );
            }
        
        }
        else
        {
        echo json_encode(
            array('message' => 'Not Authorized to update this employee.')
        );
        } 
    } 
    else{
        // No salespeople
        echo json_encode(
        array('message' => 'No Salesperson Found working under Employee ID: ' .$sales_entry->Super_EID)
        );
    }
