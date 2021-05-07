<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/New_car.php';
include_once '../../models/Salesperson.php';
include_once '../../models/Customer.php';
include_once '../../models/Facilitates_new_sale.php';
include_once '../../models/CarOwner.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set primary keys to check
$new_car = new New_car($db);
$emp = new Salesperson($db);
$cust = new Customer($db);
$newcar_entry = new Facilitates_new_sale($db);

$add_owner = new CarOwner($db);

$new_car->VIN = $data->VIN;
$emp->EmployeeID = $data->EmployeeID;
$cust->CustomerID = $data->CustomerID;

$result1 = $new_car->check_vin();
$result2 = $emp->check_id();
$result3 = $cust->check_id();

// Get row counts
$num1 = $result1->rowCount();
$num2 = $result2->rowCount();
$num3 = $result3->rowCount();

if ($num1 > 0 && $num2 > 0 && $num3 > 0) {
    // array of entries
    $arr1 = array();
    $arr2 = array();
    $arr3 = array();

    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($arr1, $VIN);
    }
    while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($arr2, $EmployeeID);
    }
    while ($row = $result3->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Push to "data"
        array_push($arr3, $CustomerID);
    }

    // Set ID info to create
    $newcar_entry->VIN = $data->VIN;
    $newcar_entry->EmployeeID = $data->EmployeeID;
    $newcar_entry->CustomerID = $data->CustomerID;

    if (in_array($newcar_entry->VIN, $arr1) && in_array($newcar_entry->EmployeeID, $arr2) && in_array($newcar_entry->CustomerID, $arr3)) {

        $newcar_entry->SaleID = $data->SaleID;
        $newcar_entry->SaleDate = $data->SaleDate;
        $newcar_entry->LPlateNo = $data->LPlateNo;
        $newcar_entry->RegistrationDetails = $data->RegistrationDetails;
        $newcar_entry->Method_of_Payment = $data->Method_of_Payment;

        $add_owner->CustomerID = $data->CustomerID;
        $add_owner->RegistrationInfo = $data->RegistrationDetails;
        $add_owner->LPlateNumber = $data->LPlateNo;
        $add_owner->VIN = $data->VIN;

        // Create the new car sale entry
        if ($newcar_entry->create()) {
            $add_owner->create();
            echo json_encode(
                array('message' => 'The new car sale entry has been added')
            );
        } else {
            echo json_encode(
                array('message' => 'New car sale entry has NOT been added')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'ERROR: EmployeeID, CustomerID and VIN must exist in their respective tables')
        );
    }
} else {
    echo json_encode(
        array('message' => 'Either EmployeeID, CustomerID and/or VIN do not exist in their respective tables')
    );
}
