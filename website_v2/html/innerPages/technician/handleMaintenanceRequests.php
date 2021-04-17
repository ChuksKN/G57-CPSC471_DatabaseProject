<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/innerPagesStyles/technicianInnerStyle.css">
    <title>My Technician Homepage &#183; CarBase</title>
</head>

<body>

<section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase</span>
            <img src="../../../images/logoIcon.png" class="topImage">
        </span>

    <ul class="topRight">
        <li class="topRight2">
            <img src="../../../images/bellIcon.png" class="bellIcon">
        </li>

        <li class="topRight2">
            <img src="../../../images/helpIcon.png" class="helpIcon">
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
            <span class="myCarText">Technician</span>
        </span>
</section>

<section>
    <div class="separateLine"></div>

</section>
<section>
    <div class="leftMenuContainer">
        <ul class="create">
            <li>
                <div class="selectionBox">
                    <img src="../../../images/wrench.png" class="plusImage"> HANDLE
                    <ul class="innerObjects"><br>
                            <li class="pageSelected">
                                Maintenance request
                                <div class="selector"></div>
                            </li>
                        <br>
                    </ul>
                </div>
            </li><br>

            <li>
                <div class="notSelected">
                    <img src="../../../images/eye.png" class="plusImage"> VIEW

                    <ul class="innerObjects"><br>
                        <li class="pageNotSelected">
                            <a href="../../../html/innerPages/technician/viewMaintenanceRequests.php" class="otherPagesInner">
                                Maintenance requests
                            </a>
                        </li><br>

                        <li class="pageNotSelected">
                            <a href="../../../html/innerPages/technician/viewPartInventory.php" class="otherPagesInner">
                            Part inventory
                            </a>
                        </li>

                        <br>
                    </ul>
                </div>
            </li><br>

            <li>
                <div class="notSelected">
                    <img src="../../../images/trash.png" class="plusImage"> DELETE

                    <ul class="innerObjects"><br>
                        <li class="pageNotSelected">
                            <a href="../../../html/innerPages/technician/deleteMaintenanceRequests.php" class="otherPagesInner">
                                Maintenance request
                            </a>
                        </li><br>

                    </ul>
                </div>
            </li>
        </ul>

        <img src="../../../images/leftMenuLine.png" class="lineSplitBottom">

        <a href="../../../html/homepages/technicianH.php" class="backGroup">
            <img src="../../../images/backArrow.png">
            <div class="backButton">back</div>
        </a>

        <!--        <button class="backButton">back</button>-->
    </div>

</section>

<div class="separateLine2"></div>

<section>
    <div class="rightMenuContainer">
        <p class="bolderEmployee">Car rentals</p>
        <p class="description">x total cars rented</p>
        <div class="underLine"></div>

        <div class="query">
            <div class="textMiddleQ">Query</div>
        </div>


        <div class="accountCreatorBox">

            <form name="addInformation">

                <div>
                    <label>
                        <p class="selectAdminName">Select car rental</p>
                        <select name="adminAccount" id="adminAccount" class="dropdown">
                            <optgroup label="car rental">
                                <option value="pablo">1433241234</option>
                                <option value="peanut">325324534</option>
                            </optgroup>
                        </select>

                    </label>
                </div>

                <input type="text" placeholder="Search car" class="searchInput">

                <div class="options">
                    <button class="addButton" type="submit">Search</button>
                    <button class="clearButton" type="submit">Clear</button>
                </div>

            </form>
        </div>
    </div>
</section>

</body>

</html>