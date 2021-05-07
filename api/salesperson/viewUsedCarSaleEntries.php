<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Facilitates_used_sale.php';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate used car sale entry object object
    $used_sale = new Facilitates_used_sale($db);
  
    // new car sale entry query
    $result = $used_sale->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any salesperson entries
    if($num > 0) {

      // array of entries
      $usedSale_arr = array();
  
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        $used_sale_entry = array(
          'EmployeeID' => $EmployeeID,
          'CustomerID' => $CustomerID,
          'VIN' => $VIN,
          'USaleID' => $USaleID,
          'USaleDate' => $USaleDate,
          'LPlateNo' => $LPlateNo,
          'PaymentMethod' => $PaymentMethod
        );
  
        // Push to "data"
        array_push($usedSale_arr, $used_sale_entry);
      }
  
      // Turn to JSON & output
      echo json_encode($usedSale_arr);
  
    } else {
      // No salespeople
      echo json_encode(
        array('message' => 'No Used Car Sale Entry Found')
      );
    }