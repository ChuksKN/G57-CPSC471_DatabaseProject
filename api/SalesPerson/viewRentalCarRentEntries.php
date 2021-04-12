<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Facilitates_rental.php';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate car sale rental object
    $rental = new Facilitates_rental($db);
  
    // new car sale entry query
    $result = $rental->read();
    // Get row count
    $num = $result->rowCount();

    // Check for any salesperson entries
    if($num > 0) {

      // array of entries
      $rental_arr = array();
  
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        $rental_entry = array(
          'EmployeeID' => $EmployeeID,
          'CustomerID' => $CustomerID,
          'VIN' => $VIN,
          'RentalID' => $RentalID,
          'StartDate' => $StartDate,
          'ReturnDate' => $ReturnDate,
          'LPlateNo' => $LPlateNo,
          'RentalDetails' => $RentalDetails,
          'PaymentMethod' => $PaymentMethod
        );
  
        // Push to "data"
        array_push($rental_arr, $rental_entry);
      }
  
      // Turn to JSON & output
      echo json_encode($rental_arr);
  
    } else {
      // No salespeople
      echo json_encode(
        array('message' => 'No Car Rental Entry Found')
      );
    }