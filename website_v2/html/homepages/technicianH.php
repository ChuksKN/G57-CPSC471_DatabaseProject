<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/homepageStyles/adminStyle.css">
    <title>My Technician Homepage &#183; CarBase</title>
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
        <div class="adminHolder">Technician
            <img src="../../images/threeDots.png" class="threeButtons">
        </div>


        <ul class="nav" id="loadCategories">
            <li href="#">
                <a href="../innerPages/technician/handleRequests.php">
                    <div class="box">
                        <p class="textInBox">Handle requests</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

            <li href="#">
                <a href="../innerPages/technician/maintenanceRequests.php">
                    <div class="box">
                        <p class="textInBox">Manage maintenance requests</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

        </ul>

    </div>
</section>

</body>

</html>
