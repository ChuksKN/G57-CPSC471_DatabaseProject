$(document).ready(function(){
    
    getTechnician();
    
    $("#addTechnicianBtn").on("click", function(e){
        $("#newForm").toggle();
    });

    function loadButtons() {
        $(".editTech").click(function(e){
            getOneTechnician($($(this)[0]).data("empid"));
            e.preventDefault();
        });
        $(".deleteTech").click(function(e){
            deleteTechnician($($(this)[0]).data("empid"));
            e.preventDefault();
        })
    }
    
    function getTechnician(){
        $('#techniciansBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/admin/viewTechnicianUnderAdmin.php?Super_EID=1', function(data){
        $(data).each(function(i, technician){
            if(technician.hasOwnProperty('message')){
                    alert(technician.message);
            }
            else{
                $('#techniciansBody').append($("<tr>")
                    .append($("<td>").append(technician.EmployeeID))
                    .append($("<td>").append(technician.Fname))
                    .append($("<td>").append(technician.Lname))
                    .append($("<td>").append(technician.DOB))
                    .append($("<td>").append(technician.Email))
                    .append($("<td>").append(technician.Address))
                    .append($("<td>").append(technician.PhoneNumber))
                    .append($("<td>").append(technician.Super_EID))
                    .append($("<td>").append(technician.Salary))   
                    .append($("<td>").append(technician.T_grade)) 
                    .append($("<td>").append(`
                                                <i class="far fa-edit editTech" data-empid="`+technician.EmployeeID+`"></i> 
                                                <i class="fas fa-trash deleteTech" data-empid="`+technician.EmployeeID+`"></i>
                                            `)));
            }
        });
        loadButtons();
        });
    }
    
    function getOneTechnician(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/viewSingleTechnician.php?EmployeeID=' + id,
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
                $($("#updateForm")[0].updateT_grade).val(data.T_grade);
                $("#updateForm").show();
            }
        });
    }
    
    $("#addTechnician").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/addTechnician.php',
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
                                   T_grade : $($("#newForm")[0].T_grade).val(),
                                   Super_EID : $("#id").data("employeeID")
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getTechnician();
            }
        });
        $("#newForm").trigger("reset");
        $("#newForm").toggle();
        e.preventDefault();
    });
    
    
    $("#updateTechnician").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/updateTechnician.php',
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
                                   T_grade : $($("#updateForm")[0].updateT_grade).val(),
                                   Super_EIDUpdate : $($("#updateForm")[0].updateS_EID).val()
                                }),
            contentType: "application/json",
            success: function(data) {
                alert(data.message);
                getTechnician();
            }
        });
        $("#updateForm").trigger("reset");
        $("#updateForm").toggle();
        e.preventDefault();
    });
    

    
    function deleteTechnician(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/admin/deleteTechnician.php',
            method: 'DELETE',
            dataType: 'json',
            data: JSON.stringify({ Super_EID : $("#id").data("employeeID"),
                                   EmployeeID : id }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getTechnician();
            }
        });

    }


    
});
  




