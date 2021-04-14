<?php
//Start the Session
session_start();

// Include relevant database models
include_once '../../config/Database.php';
include_once '../../models/Admin.php';
include_once '../../models/Salesperson.php';
include_once '../../models/Technician.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$sales = new Admin($db);
$sales = new Salesperson($db);
$sales = new Technician($db);

$errmsg = "";

//If the form is submitted or not.
//If the form is submitted
if (isset($_POST["login"])) {
    if (empty($_POST['employeeid']) || empty($_POST['password'])) {
        $errmsg = "All fields are required";
    } else {
        //Checking the values are existing in the database or not
        $query = "SELECT * FROM login WHERE UserID = :employeeid and Passwrd =:password";

        $result = $db->prepare($query);
        $result->execute(
            array(
                'employeeid' => $_POST["employeeid"],
                'password' => $_POST["password"]
            )
        );
        $count = $result->rowCount();
        //If the posted values exist, then session will be created for the user.
        if ($count > 0) {
            $_SESSION['employeeid'] = $_POST["employeeid"];
            header("location:homepages/adminH.php");
        } else {
            //If the login credentials doesn't match, he will be shown with an error message.
            $errmsg = "Invalid Login Credentials.";
        }
    }
}

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if ($pageWasRefreshed) {
    $errmsg = "";
} else {
    //do nothing;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/loginStyle.css">
    <title>Log In &#183; CarBase</title>
    </title>
</head>


<body class="bodyS">
    <span>
        <span class="topHeader">CPSC 471 G-57 | CarBase</span>
        <img src="../images/logo.png" alt="Logo" class="topLogo">
    </span><br>

    <div class="form">
        <form name="loginPage" method="POST">
            <?php
            if (isset($errmsg) && $errmsg != "") {
                echo '<div class="alert"> <span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>' . $errmsg . '</div>';
            }
            ?>
            <label for="employeeid">EmployeeID</label><span class="astrix">*</span><br>
            <input type="text" id="employeeid" name="employeeid"><br><br>

            <label for="password" class="password">Password</label><span class="astrix">*</span><br>
            <input type="password" id="password" name="password"><br><br>

            <input type="checkbox" id="rememberMe" name="rememberMe">
            <label for="rememberMe">Remember this computer for 2 weeks</label><br><br>

            <div class="options">
                <button class="loginButton" name="login" type="submit">Log in</button>
                <button class="cancelButton" name="cancel" type="submit">Cancel</button>
            </div>

        </form>
    </div><br>

    <img src="../images/line.png" class="lineSplit" class="line">

</body>

</html>