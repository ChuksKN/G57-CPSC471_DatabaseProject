<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Employee.php';
  include_once '../../models/Technician.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $tech = new Employee($db);
  $tech_entry = new Technician($db);

  $tech_entry->Super_EID = $data->Super_EID;

  $result = $tech_entry->read_under();
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
      $tech->EmployeeID = $data->EmployeeID;
      $tech_entry->EmployeeID = $data->EmployeeID;

        if(in_array($tech->EmployeeID, $tech_arr))
        {

            $tech->Fname = $data->Fname;
            $tech->Lname = $data->Lname;
            $tech->DOB = $data->DOB;
            $tech->Email = $data->Email;
            $tech->Address = $data->Address;
            $tech->PhoneNumber = $data->PhoneNumber;
            $tech->Salary = $data->Salary;
            $tech->Super_EID = $data->Super_EIDUpdate;
            $tech_entry->T_grade = $data->T_grade;
        
            // Update tech
            if($tech->update() && $tech_entry->update()) {
            echo json_encode(
                array('message' => 'Technician Updated')
            );
            } else {
            echo json_encode(
                array('message' => 'Technician Not Updated')
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
        array('message' => 'No Technician Found working under Employee ID: ' .$tech_entry->Super_EID)
        );
    }