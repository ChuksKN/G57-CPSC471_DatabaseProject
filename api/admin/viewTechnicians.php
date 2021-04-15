<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Technician.php';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate salesperson object
    $tech = new Technician($db);
  
    // salesperson query
    $result = $tech->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any salesperson entries
    if($num > 0) {

      // array of entries
      $tech_arr = array();
  
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        $employee_entry = array(
          'EmployeeID' => $EmployeeID,
          'Fname' => $Fname,
          'Lname' => $Lname,
          'DOB' => $DOB,
          'Email' => $Email,
          'Address' => $Address,
          'PhoneNumber' => $PhoneNumber,
          'Salary' => $Salary,
          'Super_SSN' => $Super_SSN,
          'T-grade' => $T_grade
        );
  
        // Push to "data"
        array_push($tech_arr, $employee_entry);
      }
  
      // Turn to JSON & output
      echo json_encode($tech_arr);
  
    } else {
      // No salespeople
      echo json_encode(
        array('message' => 'No Technician Found')
      );
    }