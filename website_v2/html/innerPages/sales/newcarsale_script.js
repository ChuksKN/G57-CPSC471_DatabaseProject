$(document).ready(function(){
    
    getCarSaleEntry();
    
    $("#addNewCarSaleBtn").on("click", function(e){
        $("#newForm").toggle();
        $("#addCustomerBtn").toggle();
    });

    $("#addCustomerBtn").on("click", function(e){
        $("#CustomerForm").toggle();
    });

    $("#closeFormBtn").on("click", function(e){
        $("#updateForm").trigger("reset");
        $("#updateForm").toggle();
    });

    function loadButtons() {
        $(".editNewCarSaleEntry").click(function(e){
            getOneNewCarSaleEntry($($(this)[0]).data("saleid"));
            e.preventDefault();
        });
    }
    
    function getCarSaleEntry(){
        $('#newCarSaleBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/viewNewCarSaleEntries.php', function(data){
        $(data).each(function(i, new_carsale){
            if(new_carsale.hasOwnProperty('message')){
                    alert(new_carsale.message);
            }
            else{
                $('#newCarSaleBody').append($("<tr>")
                    .append($("<td>").append(new_carsale.EmployeeID))
                    .append($("<td>").append(new_carsale.CustomerID))
                    .append($("<td>").append(new_carsale.VIN))
                    .append($("<td>").append(new_carsale.SaleID))
                    .append($("<td>").append(new_carsale.SaleDate))
                    .append($("<td>").append(new_carsale.LPlateNo))
                    .append($("<td>").append(new_carsale.RegistrationDetails))
                    .append($("<td>").append(new_carsale.Method_of_Payment))
                    .append($("<td>").append(`
                                                <i class="far fa-edit editNewCarSaleEntry" data-saleid="`+new_carsale.SaleID+`"></i>
                                            `)));
            }
        });
        loadButtons();
        });
    }
    
    $("#addNewCarSale").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/addNewCarSale.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#newForm")[0].EmployeeID).val(), 
                                   CustomerID : $($("#newForm")[0].CustomerID).val(),
                                   VIN : $($("#newForm")[0].VIN).val(),
                                   SaleID : $($("#newForm")[0].SaleID).val(),
                                   SaleDate : $($("#newForm")[0].SaleDate).val(),
                                   LPlateNo : $($("#newForm")[0].LPlateNo).val(),
                                   RegistrationDetails : $($("#newForm")[0].RegistrationDetails).val(),
                                   Method_of_Payment : $($("#newForm")[0].Method_of_Payment).val()
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getCarSaleEntry();
            }
        });
        $("#newForm").trigger("reset");
        $("#newForm").toggle();
        e.preventDefault();
    });

    $("#addCustomer").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/addCustomer.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ CustomerID : $($("#CustomerForm")[0].CustomerID).val(), 
                                   CName : $($("#CustomerForm")[0].CName).val(),
                                   C_DOB : $($("#CustomerForm")[0].C_DOB).val(),
                                   Credit_Score : $($("#CustomerForm")[0].Credit_Score).val(),
                                   Drivers_License : $($("#CustomerForm")[0].Drivers_License).val(),
                                   PhoneNo : $($("#CustomerForm")[0].PhoneNo).val()
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
            }
        });
        $("#CustomerForm").trigger("reset");
        $("#CustomerForm").toggle();
        e.preventDefault();
    });

    function getOneNewCarSaleEntry(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/selectNewCarSale.php?SaleID=' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateForm")[0].updateEmployeeID).val(data.EmployeeID);
                $($("#updateForm")[0].updateCustomerID).val(data.CustomerID);
                $($("#updateForm")[0].updateVIN).val(data.VIN);
                $($("#updateForm")[0].updateSaleID).val(data.SaleID);
                $($("#updateForm")[0].updateSaleDate).val(data.SaleDate);
                $($("#updateForm")[0].updateLPlateNo).val(data.LPlateNo);
                $($("#updateForm")[0].updateRegistrationDetails).val(data.RegistrationDetails);
                $($("#updateForm")[0].updateMethod_of_Payment).val(data.Method_of_Payment);
                $("#updateForm").show();
            }
        });
    }
    
    
    $("#updateSaleEntry").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/editNewCarSalesEntry.php',
            method: 'PUT',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#updateForm")[0].updateEmployeeID).val(), 
                                   CustomerID : $($("#updateForm")[0].updateCustomerID).val(),
                                   VIN : $($("#updateForm")[0].updateVIN).val(),
                                   SaleID : $($("#updateForm")[0].updateSaleID).val(),
                                   SaleDate : $($("#updateForm")[0].updateSaleDate).val(),
                                   LPlateNo : $($("#updateForm")[0].updateLPlateNo).val(),
                                   RegistrationDetails : $($("#updateForm")[0].updateRegistrationDetails).val(),
                                   Method_of_Payment : $($("#updateForm")[0].updateMethod_of_Payment).val()
                                }),
            contentType: "application/json",
            success: function(data) {
                alert(data.message);
                getCarSaleEntry();
            }
        });
        $("#updateForm").trigger("reset");
        $("#updateForm").toggle();
        e.preventDefault();
    });
    
    
});