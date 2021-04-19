<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/homepageStyles/technicianStyle.css">
    <title>My Technician Homepage &#183; CarBase</title>
</head>

<body>

<section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase</span>
            <img src="../../images/logoIcon.png" class="topImage">
        </span>

    <ul class="topRight">
        <li class="topRight2">
            <img src="../../images/bellIcon.png" class="bellIcon">
        </li>

        <li class="topRight2">
            <img src="../../images/helpIcon.png" class="helpIcon">
        </li>

        <li class="topRight2">
            <a href="../../html/login.php">
                <div class="profileIcon"></div>
            </a>
        </li>
    </ul>

</section>

<section class="myTechnician">
        <span>
            <span class="myAdminText">My Homepage</span>
        </span>
</section>

<section>
    <div class="separateLine"></div>
</section>

<section>
    <div class="menuHolder">
        <div class="adminHolder">Technician
            <img src="../../images/threeDots.png" class="threeButtons">
        </div>


        <ul class="nav" id="loadCategories">
            <li href="#">
                <a href="../../html/innerPages/technician/handleMaintenanceRequests.php">
                    <div class="box">
                        <p class="textInBox">Handle maintenance requests</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

            <li href="#">
                <a href="../../html/innerPages/technician/viewMaintenanceRequests.php">
                    <div class="box">
                        <p class="textInBox">View maintenance requests</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

            <li href="#">
                <a href="../../html/innerPages/technician/deleteMaintenanceRequests.php">
                    <div class="box">
                        <p class="textInBox">Delete maintenance requests</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

            <li href="#">
                <a href="../../html/innerPages/technician/viewPartInventory.php">
                    <div class="box">
                        <p class="textInBox">View part inventory</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

        </ul>

    </div>
</section>

</body>

</html>