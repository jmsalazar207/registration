$(function(){
    
    $('.select2').select2()
    
    $(".loader-div").show();
    $.ajax({
    url:"includes/functions.php",
    method:"POST",
    data:{list_division_id:0},
    success:function(data){
        $(".loader-div").hide(); 
        $('#txtAreaAssignmentDiv').html(data);
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
        }
    });

    $(document).on('change','#txtAreaAssignmentDiv',function(){
        var divisionAction = $(this).val();
        $(".loader-div").show();
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_unit_id:'',Where_division_ID:divisionAction},
            success:function(data){
                $(".loader-div").hide();
                $('#txtAreaAssignmentUnit').html(data);
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
        }); 
    });
    
    $(".loader-div").show();
    $.ajax({
    url:"includes/functions.php",
    method:"POST",
    data:{list_office_location_id:0},
    success:function(data){
        $(".loader-div").hide(); 
        $('#txtAreaAssignmentOfficeLocation').html(data);
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
        }
    });

});