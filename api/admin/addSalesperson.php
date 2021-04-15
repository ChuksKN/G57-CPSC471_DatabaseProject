<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Employee.php';
  include_once '../../models/Salesperson.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate employee and Salesperson object
  $emp = new Employee($db);
  $sales = new Salesperson($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $emp->EmployeeID = $data->EmployeeID;
  $sales->EmployeeID = $data->EmployeeID;
  $emp->Fname = $data->Fname;
  $emp->Lname = $data->Lname;
  $emp->DOB = $data->DOB;
  $emp->Email = $data->Email;
  $emp->Address = $data->Address;
  $emp->PhoneNumber = $data->PhoneNumber;
  $emp->Salary = $data->Salary;
  $emp->Super_EID = $data->Super_EID;


  // Create Salesperson
  if($emp->create() && $sales->create()) {
    echo json_encode(
      array('message' => 'Successfully added Sales Person:'.$emp->EmployeeID)
    );
  } else {
    if(is_null($emp->errormsg && $sales->errormsg))
    {
        echo json_encode(
          array('message' => 'Unsuccessful.')
        );
    }
    else
    {
      echo json_encode(
        array('message' => 'Unsuccessful. '.$emp->errormsg)
      );
    }
  }
