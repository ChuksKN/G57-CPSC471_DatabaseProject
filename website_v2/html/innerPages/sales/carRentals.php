<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../css/adminInnerStyle.css">
    <title>My Sales Homepage &#183; CarBase</title>

    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="rentalcarrent_script.js"></script>
    <link rel="stylesheet" href="all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="sp_style.css">
</head>

<body>

<section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase
                <img src="../../../images/logoIcon.png" class="topImage">
                <a href="../../login.php">
                    <button type="button" class="Logout">Log out</button>
                </a>
            </span>
        </span>
</section>

<section class="myAdmin">
        <span>
            <span class="myAdminTextTwo">Salesperson</span>
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
                        <li class="pageNotSelected">
                            <a href="newCarSales.php" class="otherPagesInner">
                            New car sales
                            </a>
                        </li><br>

                        <li class="pageSelected">
                                Car rentals
                                <div class="selector"></div>
                        </li><br>

                        <li class="pageNotSelected">
                            <a href="usedCarSales.php" class="otherPagesInner">
                            Used car sales
                            </a>
                        </li>
                    </ul>
                </div>
            </li><br>
        </ul>

        <img src="../../../images/leftMenuLine.png" class="lineSplitBottom">

        <a href="../../../html/homepages/salespersonH.php" class="backGroup">
            <img src="../../../images/backArrow.png">
            <div class="backButton">back</div>
        </a>

    </div>

</section>

<div class="separateLine2"></div>

<div class="rightMenuContainer">
    <section class="formThing">
        <p class="bolderEmployee">Rental cars</p>
        <p class="description">Manage rented cars</p>
        <div class="underLine"></div>

        <div class="container">
            <button id="addCarRentalBtn" class="btn btn-primary btn-block">Add a New Rental Entry</button><br><br>
            <form id="newForm">
                <div class="form-group row">
                    <label for="EmployeeID" class="col-sm-2 col-form-label">Employee ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="EmployeeID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CustomerID" class="col-sm-2 col-form-label">Customer ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="CustomerID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="VIN" class="col-sm-2 col-form-label">VIN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="VIN" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="RentalID" class="col-sm-2 col-form-label">Rental ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="RentalID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="RentalDetails" class="col-sm-2 col-form-label">Rental Details</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="RentalDetails" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="LPlateNo" class="col-sm-2 col-form-label">License Plate Number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="LPlateNo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="PaymentMethod" class="col-sm-2 col-form-label">Method of Payment</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="PaymentMethod" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="StartDate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="StartDate" placeholder="yyyy-mm-dd">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ReturnDate" class="col-sm-2 col-form-label">Return Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ReturnDate" placeholder="yyyy-mm-dd">
                    </div>
                </div>
                <button id="addCarRental" type="submit" class="btn btn-primary">Add New Rental Entry</button><br><br>
            </form>
            <button id="addCustomerBtn" class="btn btn-primary btn-block">Add Customer Details [If Necessary]</button><br><br>
            <div id="CustomerFormDiv">
                <form id="CustomerForm">
                    <div class="form-group row">
                        <label for="CustomerID" class="col-sm-2 col-form-label">Customer ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="CustomerID" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CName" class="col-sm-2 col-form-label">Customer Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="CName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="C_DOB" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="C_DOB" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Credit_Score" class="col-sm-2 col-form-label">Credit Score</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Credit_Score">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Drivers_License" class="col-sm-2 col-form-label">Drivers License Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Drivers_License" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="PhoneNo" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="PhoneNo" required>
                        </div>
                    </div>
                    <button id="addCustomer" type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>

            <div id="updateFormDiv">
                <form id="updateForm">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="updateEmployeeID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="updateCustomerID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="updateVIN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="updateRentalID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateLPlateNo" class="col-sm-2 col-form-label">License Plate Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateLPlateNo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateRentalDetails" class="col-sm-2 col-form-label">Rental Details</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateRentalDetails" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updatePaymentMethod" class="col-sm-2 col-form-label">Method of Payment</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updatePaymentMethod" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateStartDate" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateStartDate" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateReturnDate" class="col-sm-2 col-form-label">Return Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateReturnDate" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <button id="updateRentalEntry" type="submit" class="btn btn-primary">Update Rental Entry</button>
                    <button id="closeFormBtn" class="btn btn-primary pull-right">Close Form</button>
                </form>
            </div>
            <table id="carRentalTable" class="table table-bordered table-hover">
                <thead>
                <tr><th>Employee ID</th>
                    <th>Customer ID</th>
                    <th>VIN</th>
                    <th>Rental ID</th>
                    <th>Rental Details</th>
                    <th>License Plate Number</th>
                    <th>Method of Payment</th>
                    <th>Start Date</th>
                    <th>Return Date</th>
                </tr></thead>
                <tbody id="carRentalBody"></tbody>
            </table>
        </div>

    </section>
</div>
</body>

</html>