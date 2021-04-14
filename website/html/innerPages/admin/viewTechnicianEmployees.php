<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/innerPagesStyles/adminInnerStyle.css">
    <title>My Admin Homepage &#183; CarBase</title>
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
                <div class="profileIcon"></div>
            </li>

        </ul>

    </section>

    <section class="myAdmin">
        <span>
            <span class="myAdminText">Admin</span>
        </span>
    </section>

    <section>
        <div class="separateLine"></div>

    </section>
    <section>
        <div class="leftMenuContainer">
            <ul class="create">
                <li>
                    <div class="notSelected">
                        <img src="../../../images/plus.png" class="plusImage"> CREATE
                        <ul class="innerObjects"><br>
                            <a href="../../../html/innerPages/admin/createEmployeeAccount.php" class="otherPagesInner">
                                <li class="pageNotSelected">
                                    Employee account
                                </li>
                            </a>

                        </ul>
                    </div>
                </li><br>

                <li>
                    <div class="selectionBox">
                        <img src="../../../images/eye.png" class="plusImage"> VIEW

                        <ul class="innerObjects"><br>
                            <li class="pageNotSelected">
                                <a href="../../../html/innerPages/admin/viewAdminAccount.php" class="otherPagesInner">
                                    Admin account
                                </a>
                            </li><br>

                            <li class="pageNotSelected">
                                <a href="../../../html/innerPages/admin/viewSalesEmployees.php" class="otherPagesInner">
                                    Sales employees
                                </a>
                            </li><br>

                            <li class="pageSelected">
                                Technician employees
                                <div class="selector"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <img src="../../../images/leftMenuLine.png" class="lineSplitBottom">

            <a href="../../../html/homepages/adminH.php" class="backGroup">
                <img src="../../../images/backArrow.png">
                <div class="backButton">back</div>
            </a>

            <!--        <button class="backButton">back</button>-->
        </div>

    </section>

    <div class="separateLine2"></div>

    <section>
        <div class="rightMenuContainer">
            <p class="bolderEmployee">Technician employees</p>
            <p class="description">View technician employees</p>
            <div class="underLine"></div>

            <div class="query">
                <div class="textMiddleQ">Query</div>
            </div>


            <div class="accountCreatorBox">

                <form name="addInformation">

                    <div>
                        <label>
                            <p class="selectAdminName">Select technician</p>
                            <select name="adminAccount" id="adminAccount" class="dropdown">
                                <optgroup label="technician">
                                    <option value="pablo">1433241234</option>
                                    <option value="peanut">325324534</option>
                                </optgroup>
                            </select>

                        </label>
                    </div>

                    <input type="text" placeholder="Search technicians" class="searchInput">

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