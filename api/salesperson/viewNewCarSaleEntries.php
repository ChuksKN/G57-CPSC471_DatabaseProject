<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Facilitates_new_sale.php';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate new car sale entry object object
    $new_sale = new Facilitates_new_sale($db);
  
    // new car sale entry query
    $result = $new_sale->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any salesperson entries
    if($num > 0) {

      // array of entries
      $newSale_arr = array();
  
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        $new_sale_entry = array(
          'EmployeeID' => $EmployeeID,
          'CustomerID' => $CustomerID,
          'VIN' => $VIN,
          'SaleID' => $SaleID,
          'SaleDate' => $SaleDate,
          'LPlateNo' => $LPlateNo,
          'RegistrationDetails' => $RegistrationDetails,
          'Method_of_Payment' => $Method_of_Payment
        );
  
        // Push to "data"
        array_push($newSale_arr, $new_sale_entry);
      }
  
      // Turn to JSON & output
      echo json_encode($newSale_arr);
  
    } else {
      // No salespeople
      echo json_encode(
        array('message' => 'No New Car Sale Entry Found')
      );
    }