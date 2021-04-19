<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../css/adminInnerStyle.css">
    <title>My Technician Homepage &#183; CarBase</title>

    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="mr_script.js"></script>
    <link rel="stylesheet" href="all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
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
            <span class="myAdminTextOne">Technician</span>
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
                            <a href="handleRequests.php" class="otherPagesInner">
                            Handle requests
                            </a>
                        </li><br>
                        <li class="pageSelected">
                            Manage maintenance requests
                            <div class="selector"></div>
                        </li>
                    </ul>
                </div>
            </li><br>
        </ul>

        <img src="../../../images/leftMenuLine.png" class="lineSplitBottom">

        <a href="../../../html/homepages/technicianH.php" class="backGroup">
            <img src="../../../images/backArrow.png">
            <div class="backButton">back</div>
        </a>

    </div>

</section>

<div class="separateLine2"></div>

<div class="rightMenuContainer">
    <section class="formThing">
        <p class="bolderEmployee">Maintenance requests</p>
        <p class="description">Handle requests</p>
        <div class="underLine"></div>

        <div class="container">
            <button id="addMaintenanceRequestBtn" class="btn btn-primary btn-block">New Maintenance Request</button><br><br>
            <form id="newForm">
                <div class="form-group row">
                    <label for="CustomerID" class="col-sm-2 col-form-label">Customer ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="CustomerID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="WorkOrderID" class="col-sm-2 col-form-label">Work Order ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="WorkOrderID" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="WorkCost" class="col-sm-2 col-form-label">Work Cost</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="WorkCost" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Request_Date" class="col-sm-2 col-form-label">Request Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Request_Date" placeholder="yyyy-mm-dd" required>
                    </div>
                </div>
                <button id="addMaintenanceRequest" type="submit" class="btn btn-primary">Add Maintenace Request</button>
            </form>
            <table id="maintenance_reqTable" class="table table-bordered table-hover">
                <thead>
                <tr><th>Work Order ID</th>
                    <th>Cost</th>
                    <th>Request Date</th>
                </tr></thead>
                <tbody id="maintenance_reqBody"></tbody>
            </table>
        </div>

    </section>
</div>
</body>

</html>
