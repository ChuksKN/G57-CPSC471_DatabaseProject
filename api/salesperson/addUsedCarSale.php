<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Used_car.php';
include_once '../../models/Salesperson.php';
include_once '../../models/Customer.php';
include_once '../../models/Facilitates_used_sale.php';
include_once '../../models/CarOwner.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set primary keys to check
$used_car = new Used_car($db);
$emp = new Salesperson($db);
$cust = new Customer($db);
$usedcar_entry = new Facilitates_used_sale($db);

$add_owner = new CarOwner($db);

$used_car->VIN = $data->VIN;
$emp->EmployeeID = $data->EmployeeID;
$cust->CustomerID = $data->CustomerID;

$result1 = $used_car->check_vin();
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
    $usedcar_entry->VIN = $data->VIN;
    $usedcar_entry->EmployeeID = $data->EmployeeID;
    $usedcar_entry->CustomerID = $data->CustomerID;

    if (in_array($usedcar_entry->VIN, $arr1) && in_array($usedcar_entry->EmployeeID, $arr2) && in_array($usedcar_entry->CustomerID, $arr3)) {

        $usedcar_entry->USaleID = $data->USaleID;
        $usedcar_entry->USaleDate = $data->USaleDate;
        $usedcar_entry->LPlateNo = $data->LPlateNo;
        $usedcar_entry->PaymentMethod = $data->PaymentMethod;

        $add_owner->CustomerID = $data->CustomerID;
        $add_owner->RegistrationInfo = $data->PaymentMethod;
        $add_owner->LPlateNumber = $data->LPlateNo;
        $add_owner->VIN = $data->VIN;

        // Create the used car sale entry
        if ($usedcar_entry->create()) {
            $add_owner->create();
            echo json_encode(
                array('message' => 'The used car sale entry has been added')
            );
        } else {
            echo json_encode(
                array('message' => 'Used car sale entry has NOT been added')
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
