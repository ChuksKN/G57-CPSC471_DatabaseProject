<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/homepageStyles/adminStyle.css">
    <title>My Admin Homepage &#183; CarBase</title>
</head>

<body>

    <section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase
                <img src="../../images/logoIcon.png" class="topImage">
                <a href="../login.php">
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
            <div class="adminHolder">Admin
                <img src="../../images/threeDots.png" class="threeButtons">
            </div>


            <ul class="nav" id="loadCategories">
                <li href="#">
                    <a href="../innerPages/admin/salesEmployee.php">
                        <div class="box">
                            <p class="textInBox">Manage sales employees</p>
                            <img src="../../images/lineBox.png" class="lineBox">
                        </div>
                    </a>
                </li>

                <li href="#">
                    <a href="../innerPages/admin/technicianEmployee.php">
                        <div class="box">
                            <p class="textInBox">Manage technician employees</p>
                            <img src="../../images/lineBox.png" class="lineBox">
                        </div>
                    </a>
                </li>

            </ul>

        </div>
    </section>

</body>

</html>