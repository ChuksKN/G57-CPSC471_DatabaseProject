$(document).ready(function(){
    
    getMaintenanceRequest();
    
    $("#addMaintenanceRequestBtn").on("click", function(e){
        $("#newForm").toggle();
    });
    
    function getMaintenanceRequest(){
        $('#maintenance_reqBody').html('');
        $.getJSON('http://localhost/G57-CPSC471_DatabaseProject/api/technician/viewMaintenanceRequest.php', function(data){
        $(data).each(function(i, request){
            if(request.hasOwnProperty('message')){
                    alert(request.message);
            }
            else{
                $('#maintenance_reqBody').append($("<tr>")
                    .append($("<td>").append(request.WorkOrderID))
                    .append($("<td>").append(request.WorkCost))
                    .append($("<td>").append(request.Request_Date)));
            }
        });
        });
    }

    $("#addMaintenanceRequest").on("click", function(e) {
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/technician/addMaintenanceRequest.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ WorkOrderID : $($("#newForm")[0].WorkOrderID).val(), 
                                   WorkCost : $($("#newForm")[0].WorkCost).val(),
                                   Request_Date : $($("#newForm")[0].Request_Date).val()
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
                getMaintenanceRequest();
            }
        });
        $.ajax({
            url: 'http://localhost/G57-CPSC471_DatabaseProject/api/technician/addMakeRequest.php',
            method: 'POST',
            dataType: 'json',
            data: JSON.stringify({ WorkOrderID : $($("#newForm")[0].WorkOrderID).val(), 
                                   CustomerID : $($("#newForm")[0].CustomerID).val()
                                }),
            contentType: "application/json",
            success: function(data){
                alert(data.message);
            }
        });
        $("#newForm").trigger("reset");
        $("#newForm").toggle();
        e.preventDefault();
    });    
});