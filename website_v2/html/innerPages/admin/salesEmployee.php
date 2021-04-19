<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../css/adminInnerStyle.css">
    <title>My Admin Homepage &#183; CarBase</title>

    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="sales_script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase
                <img src="../../../images/logoIcon.png" class="topImage">
                <a href="../../logout.php">
                    <button type="button" class="Logout">Log out</button>
                </a>
            </span>
        </span>
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
                        <img src="../../../images/wrench.png" class="plusImage"> Manage
                        <ul class="innerObjects"><br>
                            <li class="pageSelected">
                                Sales employees
                                <div class="selector"></div>
                            </li><br>

                            <li class="pageNotSelected">
                                <a href="technicianEmployee.php" class="otherPagesInner">
                                Technician employees
                                </a>
                            </li>
                        </ul>
                    </div>
                </li><br>
            </ul>

            <img src="../../../images/leftMenuLine.png" class="lineSplitBottom">

            <a href="../../../html/homepages/adminH.php" class="backGroup">
                <img src="../../../images/backArrow.png">
                <div class="backButton">back</div>
            </a>

        </div>

    </section>

    <div class="separateLine2"></div>

    <div class="rightMenuContainer">
    <section class="formThing">
            <p class="bolderEmployee">Sales employees</p>
            <p class="description">Manage sales</p>
            <div class="underLine"></div>

            <div class="container">
                <button id="addSalespersonBtn" class="btn btn-primary btn-block">New Salesperson</button><br><br>
                <form id="newForm">
                    <div class="form-group row">
                        <label for="EmployeeID" class="col-sm-2 col-form-label">Employee ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="EmployeeID" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Fname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Fname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Lname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="DOB" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="DOB" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="PhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="PhoneNumber" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Salary" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Salary" required>
                        </div>
                    </div>
                    <button id="addSalesperson" type="submit" class="btn btn-primary">Add Salesperson</button>
                </form>

                <div id="updateFormDiv">
                    <form id="updateForm">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="updateEmployeeID">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateFname" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateFname" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateLname" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateLname" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateDOB" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateDOB" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateEmail" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateAddress" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateAddress">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updatePhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updatePhoneNumber" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateSalary" class="col-sm-2 col-form-label">Salary</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateSalary" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="updateS_EID" class="col-sm-2 col-form-label">Supervisor Employee ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateS_EID" required>
                            </div>
                        </div>
                        <button id="updateSalesperson" type="submit" class="btn btn-primary">Update Salesperson</button>
                    </form>
                </div>
                <table id="salespersonsTable" class="table table-bordered table-hover">
                    <thead>
                    <tr><th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Salary</th>
                        <th>Supervisor Employee ID</th>
                        <th>Controls</th>
                    </tr></thead>
                    <tbody id="salespersonsBody"></tbody>
                </table>
            </div>

    </section>
    </div>
</body>

</html>
