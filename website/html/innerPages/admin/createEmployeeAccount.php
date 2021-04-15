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
                <a href="../../html/login.php">
                <div class="profileIcon"></div>
                </a>
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
                    <div class="selectionBox">
                        <img src="../../../images/plus.png" class="plusImage"> CREATE
                        <ul class="innerObjects"><br>
                            <li class="pageSelected">
                                Employee account
                                <div class="selector"></div>
                            </li>
                        </ul>
                    </div>
                </li><br>

                <li>
                    <div class="notSelected">
                        <img src="../../../images/eye.png" class="plusImage"> VIEW

                        <ul class="innerObjects"><br>
                            <a href="../../../html/innerPages/admin/viewAdminAccount.php" class="otherPagesInner">
                                <li class="pageNotSelected">
                                    Admin account
                                </li>
                            </a><br>

                            <li class="pageNotSelected">
                                <a href="../../../html/innerPages/admin/viewSalesEmployees.php" class="otherPagesInner">
                                    Sales employees
                                </a>
                            </li><br>

                            <li class="pageNotSelected">
                                <a href="../../../html/innerPages/admin/viewTechnicianEmployees.php" class="otherPagesInner">
                                    Technician employees
                                </a>
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

        </div>

    </section>

    <div class="separateLine2"></div>

    <section>
        <div class="rightMenuContainer">
            <p class="bolderEmployee">Employee Account</p>
            <p class="description">Create a new account</p>
            <div class="underLine"></div>

            <div class="query">
                <img src="../../../images/plusBlue.png" class="bluePlus">
                <div class="textMiddle">Add information</div>
            </div>

            <div class="accountCreatorBox">

                <form name="addInformation">

                    <ul class="addInformation">
                        <li>
                            <label>Employee ID</label><br>
                            <input type="number" name="EmployeeID"><br><br>
                        </li>

                        <li>
                            <label>First Name</label><br>
                            <input type="text" name="Fname"><br><br>
                        </li>

                        <li>
                            <label>Last Name</label><br>
                            <input type="text" name="Lname"><br><br>
                        </li>

                        <li>
                            <label>Date of Birth</label><br>
                            <input type="date" name="DOB"><br><br>
                        </li>

                        <li>
                            <label>Email</label><br>
                            <input type="email" name="Email"><br><br>
                        </li>

                        <li>
                            <label>Address</label><br>
                            <input type="text" name="Address"><br><br>
                        </li>

                        <li>
                            <label>Phone Number</label><br>
                            <input type="number" name="PhoneNumber"><br><br>
                        </li>

                        <li>
                            <label>Salary</label><br>
                            <input type="number" name="Salary"><br><br>
                        </li>

                        <li>
                            <label>Supervisor's Employee ID</label><br>
                            <input type="number" name="Super_EID"><br><br>
                        </li>
                    </ul>

                    <div class="options">
                        <button class="addButton" type="submit">Add</button>
                        <button class="clearButton" type="submit">Clear</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

</body>

</html>