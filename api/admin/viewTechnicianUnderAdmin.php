<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Technician.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $tech = new Technician($db);

  // Get ID
  $tech->Super_EID = isset($_GET['Super_EID']) ? $_GET['Super_EID'] : die();

  // Get tech
  $result = $tech->read_under();
  // Get row count
  $num = $result->rowCount();

  // Check for any salesperson entries
  if($num > 0) {

      // array of entries
      $sales_arr = array();

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
          'Super_EID' => $Super_EID,
          'T_grade' => $T_grade
        
        );

    // Push to "data"
    array_push($sales_arr, $employee_entry);
    }

    // Turn to JSON & output
    echo json_encode($sales_arr);

} else {
    // No salespeople
    echo json_encode(
    array('message' => 'No Technician Found working under Admin Employee ID: ' .$tech->Super_EID)
    );
}