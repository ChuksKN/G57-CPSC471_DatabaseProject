<?php

session_start();

if (isset($_SESSION['employeeid']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'tech') {
        header('Location: technicianH.php');
    }
} else {
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/homepageStyles/adminStyle.css">
    <title>My Car Homepage &#183; CarBase</title>
</head>

<body>

    <section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase
                <img src="../../images/logoIcon.png" class="topImage">
                <a href="../logout.php">
                    <button type="button" class="Logout">Log out</button>
                </a>
            </span>
        </span>
    </section>

    <section class="myAdmin">
        <span>
            <span class="myAdminText">My Homepage</span>
        </span>
    </section>

    <section>
        <div class="separateLine"></div>
    </section>

    <section>
        <div class="menuHolder">
            <div class="adminHolder">Car
            </div>


            <ul class="nav" id="loadCategories">
                <li href="#">
                    <a href="../innerPages/car/newCar.php">
                        <div class="box">
                            <p class="textInBox">New cars</p>
                            <img src="../../images/lineBox.png" class="lineBox">
                        </div>
                    </a>
                </li>

                <li href="#">
                    <a href="../innerPages/car/rentalCar.php">
                        <div class="box">
                            <p class="textInBox">Rental cars</p>
                            <img src="../../images/lineBox.png" class="lineBox">
                        </div>
                    </a>
                </li>

                <li href="#">
                    <a href="../innerPages/car/usedCar.php">
                        <div class="box">
                            <p class="textInBox">Used cars</p>
                            <img src="../../images/lineBox.png" class="lineBox">
                        </div>
                    </a>
                </li>

            </ul>

        </div>
    </section>

</body>

</html>