$(document).ready(function(){
    
    getSalesperson();
    
    $("#addSalespersonBtn").on("click", function(e){
        $("#newForm").toggle();
    });

    function loadButtons() {
        $(".editSales").click(function(e){
            getOneSalesperson($($(this)[0]).data("empid"));
            e.preventDefault();
        });
        $(".deleteSales").click(function(e){
            deleteSalesperson($($(this)[0]).data("empid"));
            e.preventDefault();
        })
    }
    
    function getSalesperson(){
        $('#salespersonsBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/admin/viewSalespersonUnderAdmin.php?Super_EID=1', function(data){
        $(data).each(function(i, salesperson){
            if(salesperson.hasOwnProperty('message')){
                    alert(salesperson.message);
            }
            else{
                $('#salespersonsBody').append($("<tr>")
                    .append($("<td>").append(salesperson.EmployeeID))
                    .append($("<td>").append(salesperson.Fname))
                    .append($("<td>").append(salesperson.Lname))
                    .append($("<td>").append(salesperson.DOB))
                    .append($("<td>").append(salesperson.Email))
                    .append($("<td>").append(salesperson.Address))
                    .append($("<td>").append(salesperson.PhoneNumber))
                    .append($("<td>").append(salesperson.Salary))    
                    .append($("<td>").append(salesperson.Super_EID))
                    .append($("<td>").append(`
                                                <i class="far fa-edit editSales" data-empid="`+salesperson.EmployeeID+`"></i> 
                                                <i class="fas fa-trash deleteSales" data-empid="`+salesperson.EmployeeID+`"></i>
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
    
    $("#addSalesperson").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/addSalesperson.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $($("#newForm")[0].EmployeeID).val(), 
                                   Fname : $($("#newForm")[0].Fname).val(),
                                   Lname : $($("#newForm")[0].Lname).val(),
                                   DOB : $($("#newForm")[0].DOB).val(),
                                   Email : $($("#newForm")[0].Email).val(),
                                   Address : $($("#newForm")[0].Address).val(),
                                   PhoneNumber : $($("#newForm")[0].PhoneNumber).val(),
                                   Salary : $($("#newForm")[0].Salary).val(),
                                   Super_EID : "1"
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getSalesperson();
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
                getSalesperson();
            }
        });
        $("#updateForm").trigger("reset");
        $("#updateForm").toggle();
        e.preventDefault();
    });
    

    
    function deleteSalesperson(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/deleteSalesperson.php',
            method: 'DELETE',
            dataType: 'json',
            data: JSON.stringify({ Super_EID : "1",
                                   EmployeeID : id }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getSalesperson();
            }
        });

    }


    
});
  




