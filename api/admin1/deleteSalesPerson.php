<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';
    include_once '../../models/Salesperson.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate sales object
    $emp = new Employee($db);
    $sales = new Salesperson($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set EmployeeID to update
    $emp->EmployeeID = $data->EmployeeID;
    $sales->EmployeeID = $data->EmployeeID;

    // Delete sales person
    if($sales->delete() && $emp->delete()){
        echo json_encode(
            array('message' => 'Sales Person Has Been Deleted')
        );
    } else{
        echo json_encode(
            array('message' => 'Failed To Delete Sales Person')
        );
    }