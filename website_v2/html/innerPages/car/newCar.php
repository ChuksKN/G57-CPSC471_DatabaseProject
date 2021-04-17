<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../../css/adminInnerStyle.css">
    <title>My Car &#183; CarBase</title>

    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="newcar_script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<section class="myHomepage">
        <span>
            <span class="topLeft">CPSC 471 G-57 | CarBase
            <img src="../../../images/logoIcon.png" class="topImage">
                </span>
        </span>
</section>

<section class="myAdmin">
        <span>
            <span class="myAdminText">Car</span>
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
                            New cars
                            <div class="selector"></div>
                        </li><br>

                        <li class="pageNotSelected">
                            <a href="rentalCar.php" class="otherPagesInner">
                                Rental cars
                            </a>
                        </li><br>

                        <li class="pageNotSelected">
                            <a href="usedCar.php" class="otherPagesInner">
                            Used cars
                            </a>
                        </li>
                    </ul>
                </div>
            </li><br>
        </ul>

        <img src="../../../images/leftMenuLine.png" class="lineSplitBottom">

        <a href="../../../html/homepages/carH.php" class="backGroup">
            <img src="../../../images/backArrow.png">
            <div class="backButton">back</div>
        </a>

    </div>

</section>

<div class="separateLine2"></div>

<div class="rightMenuContainer">
    <section class="formThing">
        <p class="bolderEmployee">New cars</p>
        <p class="description">Manage new cars</p>
        <div class="underLine"></div>

        <div class="container">
            <button id="addNewCarBtn" class="btn btn-primary btn-block">Add New Car</button><br><br>
            <form id="newForm" style="margin : 0 auto;">
                <div class="form-group row">
                    <label for="VIN" class="col-sm-2 col-form-label">VIN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="VIN" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Manufacturer" class="col-sm-2 col-form-label">Manufacturer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Manufacturer" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Make" class="col-sm-2 col-form-label">Make</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Make" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Year" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Year" placeholder="yyyy" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Engine" class="col-sm-2 col-form-label">Engine</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Engine">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Output" class="col-sm-2 col-form-label">Output</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Output">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="No_of_doors" class="col-sm-2 col-form-label">Number of doors</label>
                    <div class="col-sm-10">
                        <input type="number" min="2" max="6" class="form-control" id="No_of_doors" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Fuel_tank_cap" class="col-sm-2 col-form-label">Fuel Tank Capacity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Fuel_tank_cap" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Transmission" class="col-sm-2 col-form-label">Transmission</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Transmission">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Terrain" class="col-sm-2 col-form-label">Terrain</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Terrain">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Seating_capacity" class="col-sm-2 col-form-label">Seating Capacity</label>
                    <div class="col-sm-10">
                        <input type="number" min="2" max="8" class="form-control" id="Seating_capacity" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Torque" class="col-sm-2 col-form-label">Torque</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Torque">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Region" class="col-sm-2 col-form-label">Region</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Region">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="DRL" class="col-sm-2 col-form-label">DRL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="DRL">
                    </div>
                </div>
                <button id="addNewCar" type="submit" class="btn btn-primary">Add Car</button><br><br>
            </form>

            <div id="updateFormDiv">
                <form id="updateForm">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="updateVIN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateManufacturer" class="col-sm-2 col-form-label">Manufacturer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateManufacturer" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateMake" class="col-sm-2 col-form-label">Make</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateMake" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateYear" class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateYear" placeholder="yyyy" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateEngine" class="col-sm-2 col-form-label">Engine</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateEngine" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateOutput" class="col-sm-2 col-form-label">Output</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateOutput">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateNo_of_doors" class="col-sm-2 col-form-label">Number of doors</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" max="6" class="form-control" id="updateNo_of_doors" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateFuel_tank_cap" class="col-sm-2 col-form-label">Fuel Tank Capacity</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateFuel_tank_cap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateTransmission" class="col-sm-2 col-form-label">Transmission</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateTransmission" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateSeating_capacity" class="col-sm-2 col-form-label">Seating Capacity</label>
                        <div class="col-sm-10">
                            <input type="number" min="2" max="8" class="form-control" id="updateSeating_capacity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateTorque" class="col-sm-2 col-form-label">Torque</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateTorque" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateRegion" class="col-sm-2 col-form-label">Region</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateRegion" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updateDRL" class="col-sm-2 col-form-label">DRL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="updateDRL" required>
                        </div>
                    </div>
                    <button id="updateNewCar" type="submit" class="btn btn-primary">Update Car</button>
                </form>
            </div>
            <table id="newCarTable" class="table table-bordered table-hover">
                <thead>
                <tr><th>VIN</th>
                    <th>Manufacturer</th>
                    <th>Make</th>
                    <th>Year</th>
                    <th>Engine</th>
                    <th>Output</th>
                    <th>Number of doors</th>
                    <th>Fuel Tank Capacity</th>
                    <th>Transmission</th>
                    <th>Terrain</th>
                    <th>Seating Capacity</th>
                    <th>Torque</th>
                    <th>Region</th>
                    <th>DRL</th>
                    <th>Controls</th>
                </tr></thead>
                <tbody id="newCarBody"></tbody>
            </table>
        </div>

    </section>
</div>
</body>

</html>