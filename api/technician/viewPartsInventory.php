<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  
    include_once '../../config/Database.php';
    include_once '../../models/Parts.php';
  
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate salesperson object
    $part = new Parts($db);
  
    // salesperson query
    $result = $part->read_inventory();
    // Get row count
    $num = $result->rowCount();

    // Check for any salesperson entries
    if($num > 0) {

      // array of entries
      $part_arr = array();
  
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  
        $part_entry = array(
          'PartID' => $PartID,
          'Part_Desc' => $Part_Desc,
          'PartName' => $PartName,
          'Price' => $Price
        );
  
        // Push to "data"
        array_push($part_arr, $part_entry);
      }
  
      // Turn to JSON & output
      echo json_encode($part_arr);
  
    } else {
      // No salespeople
      echo json_encode(
        array('message' => 'No Parts Found in inventory.')
      );
    }