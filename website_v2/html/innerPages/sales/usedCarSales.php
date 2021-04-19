<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../css/adminInnerStyle.css">
    <title>My Sales Homepage &#183; CarBase</title>

    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="usedcarsale_script.js"></script>
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

                        <li class="pageNotSelected">
                            <a href="carRentals.php" class="otherPagesInner">
                                Car rentals
                            </a>
                        </li><br>

                        <li class="pageSelected">
                            Used car sales
                            <div class="selector"></div>
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
        <p class="bolderEmployee">Used cars</p>
        <p class="description">Manage used car sales</p>
        <div class="underLine"></div>

        <div class="container">
            <button id="addUsedCarSaleBtn" class="btn btn-primary btn-block">Add a Used Car Sale Entry</button><br><br>
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
                    <label for="USaleID" class="col-sm-2 col-form-label">[Used] Sale ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="USaleID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="USaleDate" class="col-sm-2 col-form-label">Sale Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="USaleDate" placeholder="yyyy-mm-dd">
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
                <button id="addUsedCarSale" type="submit" class="btn btn-primary">Add Used Car Sale Entry</button><br><br>
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
                            <input type="hidden" class="form-control" id="updateUSaleID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateUSaleDate" class="col-sm-2 col-form-label">Sale Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateUSaleDate" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateLPlateNo" class="col-sm-2 col-form-label">License Plate Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateLPlateNo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updatePaymentMethod" class="col-sm-2 col-form-label">Method of Payment</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updatePaymentMethod" >
                        </div>
                    </div>
                    <button id="updateSaleEntry" type="submit" class="btn btn-primary">Update Sale Entry</button>
                    <button id="closeFormBtn" class="btn btn-primary pull-right">Close Form</button>
                </form>
            </div>
            <table id="usedCarSaleTable" class="table table-bordered table-hover">
                <thead>
                <tr><th>Employee ID</th>
                    <th>Customer ID</th>
                    <th>VIN</th>
                    <th>[Used] Sale ID</th>
                    <th>[Used] Sale Date</th>
                    <th>License Plate Number</th>
                    <th>Method of Payment</th>
                </tr></thead>
                <tbody id="usedCarSaleBody"></tbody>
            </table>
        </div>

    </section>
</div>
</body>

</html>