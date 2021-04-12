<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Technician.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate employee and technician object
  $emp = new Employee($db);
  $tech = new Technician($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $emp->EmployeeID = $data->EmployeeID;
  $tech->EmployeeID = $data->EmployeeID;
  $emp->Fname = $data->Fname;
  $emp->Lname = $data->Lname;
  $emp->DOB = $data->DOB;
  $emp->Email = $data->Email;
  $emp->Address = $data->Address;
  $emp->PhoneNumber = $data->PhoneNumber;
  $emp->Salary = $data->Salary;
  $tech->Super_EID = $data->Super_EID;
  $tech->T_grade = $data->T_grade


  // Create Technician
  if($emp->create() && $tech->create()) {
    echo json_encode(
      array('message' => 'Technician successfully added.')
    );
  } else {
    echo json_encode(
      array('message' => 'Unsuccessful.')
    );
  }
