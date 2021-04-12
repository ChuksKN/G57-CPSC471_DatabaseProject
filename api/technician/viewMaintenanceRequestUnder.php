<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Handle_req.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $request = new Handle_req($db);

  // Get ID
  $request->EmployeeID = isset($_GET['EmployeeID']) ? $_GET['EmployeeID'] : die();

  // Get request
  $result = $request->read_under();
  // Get row count
  $num = $result->rowCount();

  if($num > 0) {

      // array of entries
      $request_arr = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $request_entry = array(
          'EmployeeID' => $EmployeeID,
          'WorkOrderID' => $WorkOrderID,
          'WorkCost' => $WorkCost,
          'Request_Date' => $Request_Date,
        );

    // Push to "data"
    array_push($request_arr, $request_entry);
    }

    // Turn to JSON & output
    echo json_encode($request_arr);

} else {
    // No salespeople
    echo json_encode(
    array('message' => 'No Maintenace Request found currently being handled by Technician(Employee ID:  ' .$request->Super_EID. ')')
    );
}
