$(document).ready(function(){
    
    getCar();
    
    $("#addUsedCarBtn").on("click", function(e){
        $("#newForm").toggle();
    });

    function loadButtons() {
        $(".editCar").click(function(e){
            getOneSalesperson($($(this)[0]).data("vin"));
            e.preventDefault();
        });
    }
    
    function getCar(){
        $('#newCarBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/car/viewUsedCars.php', function(data){
        $(data).each(function(i, car){
            if(car.hasOwnProperty('message')){
                    alert(car.message);
            }
            else{
                $('#newCarBody').append($("<tr>")
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
    
    function getOneSalesperson(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/viewSingleSalesperson.php?EmployeeID=' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateForm")[0].updateEmployeeID).val(data.EmployeeID);
                $($("#updateForm")[0].updateFname).val(data.Fname);
                $($("#updateForm")[0].updateLname).val(data.Lname);
                $($("#updateForm")[0].updateDOB).val(data.DOB);
                $($("#updateForm")[0].updateEmail).val(data.Email);
                $($("#updateForm")[0].updateAddress).val(data.Address);
                $($("#updateForm")[0].updatePhoneNumber).val(data.PhoneNumber);
                $($("#updateForm")[0].updateSalary).val(data.Salary);
                $($("#updateForm")[0].updateS_EID).val(data.Super_EID);
                $("#updateForm").show();
            }
        });
    }
    
    $("#addUsedCar").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/addNewCarEntry.php',
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
    
    
    $("#updateSalesperson").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/updateSalesperson.php',
            method: 'PUT',
            dataType: 'json',
            data: JSON.stringify({ Super_EID: 1,
                                   EmployeeID : $($("#updateForm")[0].updateEmployeeID).val(), 
                                   Fname : $($("#updateForm")[0].updateFname).val(),
                                   Lname : $($("#updateForm")[0].updateLname).val(),
                                   DOB : $($("#updateForm")[0].updateDOB).val(),
                                   Email : $($("#updateForm")[0].updateEmail).val(),
                                   Address : $($("#updateForm")[0].updateAddress).val(),
                                   PhoneNumber : $($("#updateForm")[0].updatePhoneNumber).val(),
                                   Salary : $($("#updateForm")[0].updateSalary).val(),
                                   Super_EIDUpdate : $($("#updateForm")[0].updateS_EID).val()
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