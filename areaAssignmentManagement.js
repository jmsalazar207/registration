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

    function AdminAreaAssignmentAdd(formData){
        $(".loader-div").show();
        $("#checktxtAreaAssignmentName").html("");
        $("#txtAreaAssignmentName").css('border-color', '');
        const AreaAssignName = $("#txtAreaAssignmentName").val();
        const AreaAssignUnit= $("#txtAreaAssignmentUnit").val();
        const AreaAssignOfficeLoc = $("#txtAreaAssignmentOfficeLocation").val();
        $.ajax({ 
            url:"checkExist.php",
            method:"POST",
            data:{checkAreaAssignment:1,AreaAssignName:AreaAssignName},
            dataType: 'json',
            success:function(data){
                $(".loader-div").hide(); 
                const AddAreaAssignment = data.AddAreaAssignment;
                if(AddAreaAssignment){
                    $("#checktxtAreaAssignmentName").html("This entry already exists. Please verify and enter a unique value.").css('color', 'red');
                    $("#txtAreaAssignmentName").css('border-color', 'red');
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

    $(document).on('change','#txtUpdateAreaAssignmentDiv',function(){
        var divisionAction = $(this).val();
        $(".loader-div").show();
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_unit_id:'',Where_division_ID:divisionAction},
            success:function(data){
                $(".loader-div").hide();
                $('#txtUpdateAreaAssignmentUnit').html(data);
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
        }); 
    });

    $(document).on('click','#btnAdminAreaAssignUpdate',function(){
        var getAreaAssignmentDetails = $(this).val();
        $(".loader-div").show();
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{getAreaAssignmentDetails:getAreaAssignmentDetails},
            success:function(data){
                $(".loader-div").hide();
                const AreaAssignmentDetails = JSON.parse(data);
                $("#txtUpdateAreaAssignmentCode").val(AreaAssignmentDetails.area_assignment_code);
                $("#txtUpdateAreaAssignmentName").val(AreaAssignmentDetails.area_assignment_name);
                var update_division_id = AreaAssignmentDetails.division_code;
                $.ajax({
                    url:"includes/functions.php",
                    method:"POST",
                    data:{list_division_id:update_division_id},
                    success:function(data){
                        $('#txtUpdateAreaAssignmentDiv').html(data);
                    },error: function(xhr, status, error) {
                        modalErrorShow("The system encountered an error. Please contact support.");
                        $(".loader-div").hide();
                        }
                });
                var update_unit_id = AreaAssignmentDetails.unit_code;
                $.ajax({
                    url:"includes/functions.php",
                    method:"POST",
                    data:{list_unit_id:update_unit_id,Where_division_ID:update_division_id},
                    success:function(data){
                        $('#txtUpdateAreaAssignmentUnit').html(data);
                    },error: function(xhr, status, error) {
                        modalErrorShow("The system encountered an error. Please contact support.");
                        $(".loader-div").hide();
                        }
                }); 
                var update_office_location_id = AreaAssignmentDetails.office_location_code;
                $.ajax({
                    url:"includes/functions.php",
                    method:"POST",
                    data:{list_office_location_id:update_office_location_id},
                    success:function(data){
                        $(".loader-div").hide(); 
                        $('#txtUpdateAreaAssignmentOfficeLocation').html(data);
                    },error: function(xhr, status, error) {
                        modalErrorShow("The system encountered an error. Please contact support.");
                        $(".loader-div").hide();
                        }
                    });
                    
                $("#UpdateAreaAssignment").modal('show');
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
            }
        });
    });

    $(document).on('submit','#frmAdminAreaAssignmentUpdate',function(event){
        event.preventDefault();
        var PassData = new FormData(frmAdminAreaAssignmentUpdate);
        modalConfirmShow('Would you like to confirm and save the Area of Assignment details now?',AdminAreaAssignmentUpdate,PassData);
    });
    
    function AdminAreaAssignmentUpdate(formData){
        $(".loader-div").show();
        $("#checktxtUpdateAreaAssignmentName").html("");
        $("#txtUpdateAreaAssignmentName").css('border-color', '');
        const AreaAssignName = $("#txtUpdateAreaAssignmentName").val();
        const AreaAssignCode = $("#txtUpdateAreaAssignmentCode").val();
        $.ajax({ 
            url:"checkExist.php",
            method:"POST",
            data:{checkAreaAssignment:2,AreaAssignName:AreaAssignName,AreaAssignCode:AreaAssignCode},
            dataType: 'json',
            success:function(data){
                $(".loader-div").hide(); 
                const UpdateAreaAssignment = data.UpdateAreaAssignment;
                if(UpdateAreaAssignment){
                    $("#checktxtUpdateAreaAssignmentName").html("This entry already exists. Please verify and enter a unique value.").css('color', 'red');
                    $("#txtUpdateAreaAssignmentName").css('border-color', 'red');
                }else {
                    $(".loader-div").show();
                    $.ajax({
                    url:"areaAssignmentUpdate.php",
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
    }

    $(document).on('click', '#btnAdminAreaAssignDelete', function() {   
        const valueID = $(this).attr('data-valueID');
        const valueURL = $(this).attr('data-valueURL');
        const TableID = 'tblAreaAssignment';
        var PassData = {
          valueID:valueID,
          valueURL:valueURL,
          TableID:TableID
        };
        $(".loader-div").show();
        $.ajax({ //check empno
          url:"checkExist.php",
          method:"POST",
          data: {inUsedAreaAssign:valueID},
          dataType: 'json',
          success:function(data){
            $(".loader-div").hide(); 
              const inUsedAreaAssign = data.inUsedAreaAssign;
              if(inUsedAreaAssign){
                modalAlertShow('Oops! Unable to remove area assignment information as it is currently in use.');
              } else {
                modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
              }
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          },
          });
      });
});