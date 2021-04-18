<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Maintenance_req.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $request = new Maintenance_req($db);

  // Get request
  $result = $request->read();
  // Get row count
  $num = $result->rowCount();

  if($num > 0) {

      // array of entries
      $request_arr = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $request_entry = array(
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
    array('message' => 'No Maintenace Request found.')
    );
}