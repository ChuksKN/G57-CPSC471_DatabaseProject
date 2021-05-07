$(document).ready(function(){
    
    getCar();
    
    $("#addUsedCarBtn").on("click", function(e){
        $("#newForm").toggle();
    });

    function loadButtons() {
        $(".editCar").click(function(e){
            getOneUsedCar($($(this)[0]).data("vin"));
            e.preventDefault();
        });
    }
    
    function getCar(){
        $('#usedCarBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/car/viewUsedCars.php', function(data){
        $(data).each(function(i, car){
            if(car.hasOwnProperty('message')){
                    alert(car.message);
            }
            else{
                $('#usedCarBody').append($("<tr>")
                    .append($("<td>").append(car.VIN))
                    .append($("<td>").append(car.Manufacturer))
                    .append($("<td>").append(car.Make))
                    .append($("<td>").append(car.Year))
                    .append($("<td>").append(car.Engine))
                    .append($("<td>").append(car.Output))
                    .append($("<td>").append(car.No_of_doors))
                    .append($("<td>").append(car.Fuel_tank_cap))
                    .append($("<td>").append(car.Transmission))
                    .append($("<td>").append(car.Terrain))
                    .append($("<td>").append(car.Seating_capacity))
                    .append($("<td>").append(car.Torque))    
                    .append($("<td>").append(car.Region))
                    .append($("<td>").append(car.DRL))
                    .append($("<td>").append(car.DistanceTravelled))
                    .append($("<td>").append(`
                                                <i class="far fa-edit editCar" data-vin="`+car.VIN+`"></i>
                                            `)));
            }
        });
        loadButtons();
        });
    }
    
    function getOneUsedCar(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/car/selectUsedCar.php?VIN=' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateForm")[0].updateVIN).val(data.VIN);
                $($("#updateForm")[0].updateManufacturer).val(data.Manufacturer);
                $($("#updateForm")[0].updateMake).val(data.Make);
                $($("#updateForm")[0].updateYear).val(data.Year);
                $($("#updateForm")[0].updateEngine).val(data.Engine);
                $($("#updateForm")[0].updateOutput).val(data.Output);
                $($("#updateForm")[0].updateNo_of_doors).val(data.No_of_doors);
                $($("#updateForm")[0].updateFuel_tank_cap).val(data.Fuel_tank_cap);
                $($("#updateForm")[0].updateTransmission).val(data.Transmission);
                $($("#updateForm")[0].updateTerrain).val(data.Terrain);
                $($("#updateForm")[0].updateSeating_capacity).val(data.Seating_capacity);
                $($("#updateForm")[0].updateTorque).val(data.Torque);
                $($("#updateForm")[0].updateRegion).val(data.Region);
                $($("#updateForm")[0].updateDRL).val(data.DRL);
                $($("#updateForm")[0].updateDistanceTravelled).val(data.DistanceTravelled);
                $("#updateForm").show();
            }
        });
    }
    
    $("#addUsedCar").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/addUsedCarEntry.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({  VIN : $($("#newForm")[0].VIN).val(), 
                                    Manufacturer : $($("#newForm")[0].Manufacturer).val(),
                                    Make : $($("#newForm")[0].Make).val(),
                                    Year : $($("#newForm")[0].Year).val(),
                                    Engine : $($("#newForm")[0].Engine).val(),
                                    Output : $($("#newForm")[0].Output).val(),
                                    No_of_doors : $($("#newForm")[0].No_of_doors).val(),
                                    Fuel_tank_cap : $($("#newForm")[0].Fuel_tank_cap).val(),
                                    Transmission : $($("#newForm")[0].Transmission).val(),
                                    Terrain : $($("#newForm")[0].Terrain).val(),
                                    Seating_capacity : $($("#newForm")[0].Seating_capacity).val(),
                                    Torque : $($("#newForm")[0].Torque).val(),
                                    Region : $($("#newForm")[0].Region).val(),
                                    DRL : $($("#newForm")[0].DRL).val(),
                                    DistanceTravelled : $($("#newForm")[0].DistanceTravelled).val()
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getCar();
            }
        });
        $("#newForm").trigger("reset");
        $("#newForm").toggle();
        e.preventDefault();
    });
    
    
    $("#updateUsedCar").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/car/updateUsedCar.php',
            method: 'PUT',
            dataType: 'json',
            data: JSON.stringify({ VIN : $($("#updateForm")[0].updateVIN).val(), 
                                   Manufacturer : $($("#updateForm")[0].updateManufacturer).val(),
                                   Make : $($("#updateForm")[0].updateMake).val(),
                                   Year : $($("#updateForm")[0].updateYear).val(),
                                   Engine : $($("#updateForm")[0].updateEngine).val(),
                                   Output : $($("#updateForm")[0].updateOutput).val(),
                                   No_of_doors : $($("#updateForm")[0].updateNo_of_doors).val(),
                                   Fuel_tank_cap : $($("#updateForm")[0].updateFuel_tank_cap).val(),
                                   Transmission : $($("#updateForm")[0].updateTransmission).val(),
                                   Terrain : $($("#updateForm")[0].updateTerrain).val(),
                                   Seating_capacity : $($("#updateForm")[0].updateSeating_capacity).val(),
                                   Torque : $($("#updateForm")[0].updateTorque).val(),
                                   Region : $($("#updateForm")[0].updateRegion).val(),
                                   DRL : $($("#updateForm")[0].updateDRL).val(),
                                   DistanceTravelled : $($("#updateForm")[0].updateDistanceTravelled).val()
                                }),
            contentType: "application/json",
            success: function(data) {
                alert(data.message);
                getCar();
            }
        });
        $("#updateForm").trigger("reset");
        $("#updateForm").toggle();
        e.preventDefault();
    });
    
    
});