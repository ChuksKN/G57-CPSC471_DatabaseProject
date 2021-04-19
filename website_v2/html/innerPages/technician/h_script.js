$(document).ready(function(){
    
    getMaintenanceRequests();
    
    $("#addHandleRequestBtn").on("click", function(e){
        $("#newForm").toggle();
    });

    function loadButtons() {
        $(".editReq").click(function(e){
            getOneMaintenanceRequest($($(this)[0]).data("woid"));
            e.preventDefault();
        });
        $(".deleteReq").click(function(e){
            deleteSalesperson($($(this)[0]).data("woid"));
            e.preventDefault();
        })
    }
    
    function getMaintenanceRequests(){
        $('#maintenance_reqBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/technician/viewMaintenanceRequestUnder.php?EmployeeID=70', function(data){
        $(data).each(function(i, request){
            if(request.hasOwnProperty('message')){
                    alert(request.message);
            }
            else{
                $('#maintenance_reqBody').append($("<tr>")
                    .append($("<td>").append(request.WorkOrderID))
                    .append($("<td>").append(request.WorkCost))
                    .append($("<td>").append(request.Request_Date))
                    .append($("<td>").append(`
                                                <i class="far fa-edit editReq" data-woid="`+request.WorkOrderID+`"></i> 
                                                <i class="fas fa-trash deleteReq" data-woid="`+request.WorkOrderID+`"></i>
                                            `)));
            }
        });
        loadButtons();
        });
    }
    
    function getOneMaintenanceRequest(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/technician/viewSingleMaintenanceRequest.php?WorkOrderID=' + id,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $($("#updateForm")[0].updateWorkOrderID).val(data.WorkOrderID);
                $($("#updateForm")[0].updateWorkCost).val(data.WorkCost);
                $($("#updateForm")[0].updateRequest_Date).val(data.Request_Date);
                $("#updateForm").show();
            }
        });
    }
    
    $("#addHandleRequest").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/technician/addHandleRequest.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : $("#id").data("employeeID"), 
                                   WorkOrderID : $($("#newForm")[0].WorkOrderID).val()
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getMaintenanceRequests();
            }
        });
        $("#newForm").trigger("reset");
        $("#newForm").toggle();
        e.preventDefault();
    });
    
    
    $("#updateMaintenanceRequest").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/technician/updateMaintenanceRequest.php',
            method: 'PUT',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID: $("#id").data("employeeID"),
                                   WorkOrderID : $($("#updateForm")[0].updateWorkOrderID).val(), 
                                   WorkCost : $($("#updateForm")[0].updateWorkCost).val(),
                                   Request_Date : $($("#updateForm")[0].updateRequest_Date).val()
                                }),
            contentType: "application/json",
            success: function(data) {
                alert(data.message);
                getMaintenanceRequests();
            }
        });
        $("#updateForm").trigger("reset");
        $("#updateForm").toggle();
        e.preventDefault();
    });
    

    
    function deleteSalesperson(id){
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/technician/deleteMaintenanceRequest.php',
            method: 'DELETE',
            dataType: 'json',
            data: JSON.stringify({ EmployeeID : "70",
                                   WorkOrderID : id }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getMaintenanceRequests();
            }
        });

    }


    
});