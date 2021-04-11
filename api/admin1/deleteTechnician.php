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

    // technician Properties
    $EmployeeID = 01234567892 // EmployeeID is set to int(11) NOT NULL in the SQL dump, we need to add some value for it here when deleting a salesperson

    $stmt = $admin->delete_technician($EmployeeID); 

    ?>
