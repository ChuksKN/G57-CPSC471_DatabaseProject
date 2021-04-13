<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Rental_car.php';
include_once '../../models/Salesperson.php';
include_once '../../models/Customer.php';
include_once '../../models/Facilitates_rental.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set primary keys to check
$rental_car = new Rental_car($db);
$emp = new Salesperson($db);
$cust = new Customer($db);
$rentalcar_entry = new Facilitates_rental($db);

$rental_car->VIN = $data->VIN;
$emp->EmployeeID = $data->EmployeeID;
$cust->CustomerID = $data->CustomerID;

$result1 = $rental_car->check_vin();
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
    $rentalcar_entry->VIN = $data->VIN;
    $rentalcar_entry->EmployeeID = $data->EmployeeID;
    $rentalcar_entry->CustomerID = $data->CustomerID;

    if (in_array($rentalcar_entry->VIN, $arr1) && in_array($rentalcar_entry->EmployeeID, $arr2) && in_array($rentalcar_entry->CustomerID, $arr3)) {

        $rentalcar_entry->RentalID = $data->RentalID;
        $rentalcar_entry->RentalDetails = $data->RentalDetails;
        $rentalcar_entry->LPlateNo = $data->LPlateNo;
        $rentalcar_entry->PaymentMethod = $data->PaymentMethod;
        $rentalcar_entry->StartDate = $data->StartDate;
        $rentalcar_entry->ReturnDate = $data->ReturnDate;

        // Create the rental car sale entry
        if ($rentalcar_entry->create()) {
            echo json_encode(
                array('message' => 'The rental car sale entry has been added')
            );
        } else {
            echo json_encode(
                array('message' => 'Rental car sale entry has NOT been added')
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
