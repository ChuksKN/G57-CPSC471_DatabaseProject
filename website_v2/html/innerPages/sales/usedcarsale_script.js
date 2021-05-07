$(document).ready(function(){
    
    getCarSaleEntry();
    
    $("#addUsedCarSaleBtn").on("click", function(e){
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
        $(".editUsedCarSaleEntry").click(function(e){
            getOneUsedCarSaleEntry($($(this)[0]).data("saleid"));
            e.preventDefault();
        });
    }
    
    function getCarSaleEntry(){
        $('#usedCarSaleBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/viewUsedCarSaleEntries.php', function(data){
        $(data).each(function(i, used_carsale){
            if(used_carsale.hasOwnProperty('message')){
                    alert(used_carsale.message);
            }
            else{
                $('#usedCarSaleBody').append($("<tr>")
                    .append($("<td>").append(used_carsale.EmployeeID))
                    .append($("<td>").append(used_carsale.CustomerID))
                    .append($("<td>").append(used_carsale.VIN))
                    .append($("<td>").append(used_carsale.USaleID))
                    .append($("<td>").append(used_carsale.USaleDate))
                    .append($("<td>").append(used_carsale.LPlateNo))
                    .append($("<td>").append(used_carsale.PaymentMethod))
                    .append($("<td>").append(`
                                                <i class="far fa-edit editUsedCarSaleEntry" data-saleid="`+used_carsale.USaleID+`"></i>
                                            `)));
            }
        });
        loadButtons();
        });
    }
    
    $("#addUsedCarSale").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/addUsedCarSale.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#newForm")[0].EmployeeID).val(), 
                                   CustomerID : $($("#newForm")[0].CustomerID).val(),
                                   VIN : $($("#newForm")[0].VIN).val(),
                                   USaleID : $($("#newForm")[0].USaleID).val(),
                                   USaleDate : $($("#newForm")[0].USaleDate).val(),
                                   LPlateNo : $($("#newForm")[0].LPlateNo).val(),
                                   PaymentMethod : $($("#newForm")[0].PaymentMethod).val()
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

    function getOneUsedCarSaleEntry(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/selectUsedCarSale.php?USaleID=' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateForm")[0].updateEmployeeID).val(data.EmployeeID);
                $($("#updateForm")[0].updateCustomerID).val(data.CustomerID);
                $($("#updateForm")[0].updateVIN).val(data.VIN);
                $($("#updateForm")[0].updateUSaleID).val(data.USaleID);
                $($("#updateForm")[0].updateUSaleDate).val(data.USaleDate);
                $($("#updateForm")[0].updateLPlateNo).val(data.LPlateNo);
                $($("#updateForm")[0].updatePaymentMethod).val(data.PaymentMethod);
                $("#updateForm").show();
            }
        });
    }
    
    
    $("#updateSaleEntry").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/editUsedCarSalesEntry.php',
            method: 'PUT',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#updateForm")[0].updateEmployeeID).val(), 
                                   CustomerID : $($("#updateForm")[0].updateCustomerID).val(),
                                   VIN : $($("#updateForm")[0].updateVIN).val(),
                                   USaleID : $($("#updateForm")[0].updateUSaleID).val(),
                                   USaleDate : $($("#updateForm")[0].updateUSaleDate).val(),
                                   LPlateNo : $($("#updateForm")[0].updateLPlateNo).val(),
                                   PaymentMethod : $($("#updateForm")[0].updatePaymentMethod).val()
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