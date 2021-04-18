$(document).ready(function(){
    
    getCarSaleEntry();
    
    $("#addCarRentalBtn").on("click", function(e){
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
        $(".editCarRentalEntry").click(function(e){
            getOneCarRentalEntry($($(this)[0]).data("rentalid"));
            e.preventDefault();
        });
    }
    
    function getCarSaleEntry(){
        $('#carRentalBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/viewRentalCarRentEntries.php', function(data){
        $(data).each(function(i, rentalcar){
            if(rentalcar.hasOwnProperty('message')){
                    alert(rentalcar.message);
            }
            else{
                $('#carRentalBody').append($("<tr>")
                    .append($("<td>").append(rentalcar.EmployeeID))
                    .append($("<td>").append(rentalcar.CustomerID))
                    .append($("<td>").append(rentalcar.VIN))
                    .append($("<td>").append(rentalcar.RentalID))
                    .append($("<td>").append(rentalcar.RentalDetails))
                    .append($("<td>").append(rentalcar.LPlateNo))
                    .append($("<td>").append(rentalcar.PaymentMethod))
                    .append($("<td>").append(rentalcar.StartDate))
                    .append($("<td>").append(rentalcar.ReturnDate))
                    .append($("<td>").append(`
                                                <i class="far fa-edit editCarRentalEntry" data-rentalid="`+rentalcar.RentalID+`"></i>
                                            `)));
            }
        });
        loadButtons();
        });
    }
    
    $("#addCarRental").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/addRentalCarRent.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#newForm")[0].EmployeeID).val(), 
                                   CustomerID : $($("#newForm")[0].CustomerID).val(),
                                   VIN : $($("#newForm")[0].VIN).val(),
                                   RentalID : $($("#newForm")[0].RentalID).val(),
                                   RentalDetails : $($("#newForm")[0].RentalDetails).val(),
                                   LPlateNo : $($("#newForm")[0].LPlateNo).val(),
                                   PaymentMethod : $($("#newForm")[0].PaymentMethod).val(),
                                   StartDate : $($("#newForm")[0].StartDate).val(),
                                   ReturnDate : $($("#newForm")[0].ReturnDate).val()
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

    function getOneCarRentalEntry(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/selectCarRental.php?RentalID=' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateForm")[0].updateEmployeeID).val(data.EmployeeID);
                $($("#updateForm")[0].updateCustomerID).val(data.CustomerID);
                $($("#updateForm")[0].updateVIN).val(data.VIN);
                $($("#updateForm")[0].updateRentalID).val(data.RentalID);
                $($("#updateForm")[0].updateRentalDetails).val(data.RentalDetails);
                $($("#updateForm")[0].updateLPlateNo).val(data.LPlateNo);
                $($("#updateForm")[0].updatePaymentMethod).val(data.PaymentMethod);
                $($("#updateForm")[0].updateStartDate).val(data.StartDate);
                $($("#updateForm")[0].updateReturnDate).val(data.ReturnDate);
                $("#updateForm").show();
            }
        });
    }
    
    
    $("#updateRentalEntry").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/salesperson/editRental.php',
            method: 'PUT',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#updateForm")[0].updateEmployeeID).val(), 
                                   CustomerID : $($("#updateForm")[0].updateCustomerID).val(),
                                   VIN : $($("#updateForm")[0].updateVIN).val(),
                                   RentalID : $($("#updateForm")[0].updateRentalID).val(),
                                   RentalDetails : $($("#updateForm")[0].updateRentalDetails).val(),
                                   LPlateNo : $($("#updateForm")[0].updateLPlateNo).val(),
                                   PaymentMethod : $($("#updateForm")[0].updatePaymentMethod).val(),
                                   StartDate : $($("#updateForm")[0].updateStartDate).val(),
                                   ReturnDate : $($("#updateForm")[0].updateReturnDate).val()
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