<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Admin.php'; // We actually need to include Admin.php and not SalesPerson.php since it will be the admin accessing this (these functions are define in Admin.php)

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
    // Instantiate salesperson object
    $admin = new Admin($db); // Since we defined functions like delete() in Admin.php and must include Admin.php we also have to create the admin object which will perforom the delete function

    // Sales Person Properties
    $EmployeeID = 01234567891 // EmployeeID is set to int(11) NOT NULL in the SQL dump, we need to add some value for it here when deleting a salesperson

    $stmt = $admin->delete_salesperson($EmployeeID); // we only have delete() at the moment in Admin.php but since we have two different delete API endpoints in our google docs I think we should
                                                    // create them separately such that we have delete_salesperson() that delete that salesperson EmployeeID and delete_tech() that deletes technician EmployeeID
                                                    // because once you delete the EmployeeID which is the primary key, it deletes the entire tuple 

    ?>
