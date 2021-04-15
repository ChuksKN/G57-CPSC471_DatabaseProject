<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/homepageStyles/customerStyle.css">
    <title>My Customer Homepage &#183; CarBase</title>
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
        <div class="adminHolder">Customer
            <img src="../../images/threeDots.png" class="threeButtons">
        </div>


        <ul class="nav" id="loadCategories">
            <li href="#">
                <a href="../../html/innerPages/customer/viewOwnedCarDetails.php">
                    <div class="box">
                        <p class="textInBox">View owned car details</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

            <li href="#">
                <a href="../../html/innerPages/customer/viewRentalCarDetails.php">
                    <div class="box">
                        <p class="textInBox">View rental car details</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

            <li href="#">
                <a href="../../html/innerPages/customer/viewMaintenanceRequests.php">
                    <div class="box">
                        <p class="textInBox">View maintenance requests</p>
                        <img src="../../images/lineBox.png" class="lineBox">
                    </div>
                </a>
            </li>

        </ul>

    </div>
</section>

</body>

</html>