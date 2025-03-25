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

    $(document).on('submit','#frmAdminAreaAssignmentAdd',function(event){
        event.preventDefault();
        var PassData = new FormData(frmAdminAreaAssignmentAdd);
        modalConfirmShow('Would you like to confirm and save the Area of Assignment details now?',AdminAreaAssignmentAdd,PassData);
    });

    function AdminAreaAssignmentAdd(){
        $(".loader-div").show();
        const AreaAssignName = $("#txtAreaAssignmentName").val();
        const AreaAssignUnit= $("#txtAreaAssignmentUnit").val();
        const AreaAssignOfficeLoc = $("#txtAreaAssignmentOfficeLocation").val();
        $.ajax({ 
            url:"checkExist.php",
            method:"POST",
            data:{checkAddAreaAssignment:1,AreaAssignName:AreaAssignName,AreaAssignUnit:AreaAssignUnit,AreaAssignOfficeLoc:AreaAssignOfficeLoc},
            dataType: 'json',
            success:function(data){
                $(".loader-div").hide(); 
                const AddAreaAssignment = data.AddAreaAssignment;
                if(AddAreaAssignment){
                    modalErrorShow("This entry already exists. Please verify and enter a unique value.");
                }else {
                    $(".loader-div").show();
                    $.ajax({
                    url:"areaAssignmentAdd.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
                        $(".loader-div").hide(); 
                        const msg = data.msg;
                        const stat = data.status;
                        if(stat == "success"){
                            modalSuccessShow(msg,refreshPage);
                        }else{
                            modalErrorShow(msg);
                        }
                    },error: function(xhr, status, error) {
                        modalErrorShow("The system encountered an error. Please contact support.");
                        $(".loader-div").hide();
                        },
                    processData: false,
                    contentType: false
                    });
                }
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
        });  
    };

});