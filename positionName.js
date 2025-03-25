$(document).on('click','#btnUpdatePositionName',function(){
    $(".loader-div").show();
    var getPositionNameDetails = $(this).attr('value');
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getPositionNameDetails:getPositionNameDetails},
        success:function(data){
            $(".loader-div").hide();
            const PositionNameData = JSON.parse(data);
            $("#posNameID").val(PositionNameData['position_name_id']);
            $("#updateLPNPositionName").val(PositionNameData['position_name']);
            $("#updateLPNPositionInitial").val(PositionNameData['position_initial']);
            $("#UpdatePositionName").modal('show');
        },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
        }
    });
});

$(document).on('submit','#frmPositionNameUpdate',function(event){
    event.preventDefault();
    var PassData = new FormData(frmPositionNameUpdate);
    modalConfirmShow('Would you like to confirm and save the position name details now?',AdminUpdatePositionName,PassData);
});

$(document).on('click','#btnDeletePositionName',function(){
    const valueID = $(this).attr('data-valueID');
    const valueURL = $(this).attr('data-valueURL');
    const TableID = 'tblManagePositionName';
    var PassData = {
      valueID:valueID,
      valueURL:valueURL,
      TableID:TableID
    };
    $(".loader-div").show();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkInUsedPositionName:valueID},
        success:function(data){
            $(".loader-div").hide(); 
            const CheckPositionName = JSON.parse(data);
            const inUsedPosName = CheckPositionName['position_name_id'];
            if(inUsedPosName>0){
                modalAlertShow("Position Name is currently in use and cannot be deleted.",CloseDynamicModal);
            }else{
                modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
            }
        },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
    });
});

$(document).on("submit",'#frmPositionNameAdd',function(event){ 
    event.preventDefault();
    var PassData = new FormData(frmPositionNameAdd);
    modalConfirmShow('Would you like to confirm and save the position name details now?',AdminAddPositionName,PassData);
});

function AdminUpdatePositionName(formData){
    const UpdatePositionNameID = $("#posNameID").val();
    const UpdatePositionName = $("#updateLPNPositionName").val();
    const UpdatePositionInitial = $("#updateLPNPositionInitial").val();
    $(".loader-div").show();
    $.ajax({ //getInfo session
        url:"checkExist.php",
        method:"POST",
        data:{UpdatePositionName:UpdatePositionName,UpdatePositionInitial:UpdatePositionInitial,UpdatePositionNameID:UpdatePositionNameID},
        dataType: 'json',
        success:function(data){
            $(".loader-div").hide(); 
            const UpdatePositionName = data.UpdatePositionName;
            const UpdatePositionInitial = data.UpdatePositionInitial;
            if(UpdatePositionName>0){
                $("#CheckupdateLPNPositionName").html("The Position Name entered has already been utilized.").css('color', 'red');
                $("#updateLPNPositionName").css('border-color', 'red');
                $("#updateLPNPositionName").focus();
                $("#UpdatePositionName").modal({"backdrop": "static"});
            }else if(UpdatePositionInitial>0){
                $("#CheckupdateLPNPositionInitial").html("The Position Initial entered has already been utilized.").css('color', 'red');
                $("#updateLPNPositionInitial").css('border-color', 'red');
                $("#updateLPNPositionInitial").focus();
                $("#UpdatePositionName").modal({"backdrop": "static"});
            }else {
                $.ajax({
                url:"positionNameUpdate.php",
                method:"POST",
                dataType: "json",
                data:formData,
                success:function(data){
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

function AdminAddPositionName(formData){
    const PositionName = $("#addLPNPositionName").val();
    const PositionInitial = $("#addLPNPositionInitial").val();
    $("#CheckaddLPNPositionName").html("").css('color', '');
    $("#addLPNPositionName").css('border-color', '');
    $("#CheckaddLPNPositionInitial").html("");
    $("#addLPNPositionInitial").css('border-color', '');
    $(".loader-div").show();
    $.ajax({ 
        url:"checkExist.php",
        method:"POST",
        data:{PositionName:PositionName,PositionInitial:PositionInitial},
        dataType: 'json',
        success:function(data){
            $(".loader-div").hide(); 
            const PositionName = data.PositionName;
            const PositionInitial = data.PositionInitial;
            if(PositionName>0){
                $("#CheckaddLPNPositionName").html("The Position Name entered has already been utilized.").css('color', 'red');
                $("#addLPNPositionName").css('border-color', 'red');
                $("#addLPNPositionName").focus();
                $("#addNewPositionName").modal({"backdrop": "static"});
            }else if(PositionInitial>0){
                $("#CheckaddLPNPositionInitial").html("The Position Initial entered has already been utilized.").css('color', 'red');
                $("#addLPNPositionInitial").css('border-color', 'red');
                $("#addLPNPositionInitial").focus();
                $("#addNewPositionName").modal({"backdrop": "static"});
            }else {
                $(".loader-div").show();
                $.ajax({
                url:"positionNameAdd.php",
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




