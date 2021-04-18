<?php
// Not needed(?)

// // Headers
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: DELETE');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// include_once '../../config/Database.php';
// include_once '../../models/Customer.php';

// //Instantiate DB & connect
// $database = new Database();
// $db = $database->connect();

// // Instantiate customer object
// $customer = new Customer($db);

// // Get raw posted data
// $data = json_decode(file_get_contents("php://input"));

// // customer check query
// $customer->CustomerID = $data->CustomerID;

// $result = $customer->read();

// // Get row count
// $num = $result->rowCount();

// // Check for any employee under admin
// if ($num > 0) {

//     // array of entries
//     $customer_arr = array();

//     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         extract($row);

//         // Push to "data"
//         array_push($customer_arr, $CustomerID);
//     }

//     if (in_array($customer->CustomerID, $customer_arr)) {
//         // Delete customer person
//         if ($customer->delete()) {
//             echo json_encode(
//                 array('message' => 'Customer Has Been Deleted')
//             );
//         } else {
//             echo json_encode(
//                 array('message' => 'Failed To Delete Customer; ID: ' . $customer->CustomerID)
//             );
//         }
//     } else {
//         echo json_encode(
//             array('message' => 'Not Authorized to delete this employee.')
//         );
//     }
// } else {
//     // No customerpeople
//     echo json_encode(
//         array('message' => 'No Customer Found with given ID: ' . $customer->CustomerID)
//     );
// }
