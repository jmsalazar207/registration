$(function(){
    $('.select2').select2()
    jQuery("#UpdatePositionDivision").on('change',function(){
        var divisionAction = jQuery(this).attr("id");
        var division_ids = jQuery(this).val();
        if(division_ids){
            jQuery.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{divisionAction:divisionAction, division_ids:division_ids},
            success:function(data){
                jQuery('#UpdatePositionUnit').html(data);
            }
        });
        }else{
            jQuery('#UpdatePositionUnit').html('<option value="">SELECT DIVISION FIRST</option>');
        }
      });
  });
function btnPositionHistory(getPositionHistoryDetails){ //retrieve information from lib_position and lib_position_name for modal history
$.ajax({
    url:"includes/functions.php",
    method:"POST",
    data:{getPositionHistoryDetails:getPositionHistoryDetails},
    success:function(data){
        const PositionData = JSON.parse(data);
        const HistoryItemCode = PositionData['item_code'];
        $("#tblPosOverview").dataTable().fnDestroy()
        $('#position_id').val(PositionData['position_id']);
        $('#addHistoryItemCode').val(PositionData['item_code']); 
        $('#addHistoryPositionName').val(PositionData['position_name']);
        $('#UpdatePositionItemCode').val(PositionData['item_code']);
        const DateCreated = PositionData['date_creation_position'];
        const DateStarted = $('#addHistoryDateStart');
        DateStarted.attr('min', DateCreated);
        var update_division_id = PositionData["division_code"];
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{update_division_id:update_division_id},
          success:function(data){
              $('#UpdatePositionDivision').html(data);
          }
      });
        var update_unit_id = PositionData["unit_code"];
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{update_unit_id:update_unit_id,Where_division_ID:update_division_id},
          success:function(data){
              $('#UpdatePositionUnit').html(data);
          }
      }); 
        $('#formAddHistory').modal('show');
        $('#tblPosOverview').DataTable({ //retreive data position history
            ajax: {
            url: 'tabPositionOverviewHistory_ajax.php?item_code='+HistoryItemCode,
            type: 'POST',
            'data': function(data){
            }
            },
            serverSide: true,
            stateSave: true,
            "order": [[ 1, "desc" ]],
            columns: [
                // { data: "Action"},
                { data: "item_code"},
                { data: "position_name"},
                { data: "name"},
                { data: "start_of_appointment"},
                { data: "end_of_appointment"},
                { data: "mode_seperation_description"}
            ],
            'columnDefs': [ 
                { "bSortable": false, "aTargets": [0] }
            ]

        });
    }
});
};
function btnCheckDeletePosition(){ // function trigger to delete position DONE
    const checkPositionID = $('#position_id').val();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkInUsedPosition:checkPositionID},
        success:function(data){
            const CheckPosition = JSON.parse(data);
            const inUsedPosition = CheckPosition['position_id'];
            if(inUsedPosition > 0){
                alert("The position is currently occupied and cannot be deleted.");
            }else{
                var formData = new FormData(frmUpdatePosition);
                $.ajax({
                url:"positionDelete.php",
                        method:"POST",
                        dataType: "json",
                        data:formData,
                        success:function(data){
                            $('#formAddHistory').modal('hide');
                            const msg = data.msg;
                            const stat = data.status;
                            if(stat == "success"){
                                $('#modalNotif-header').text('Great! Success.');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                            }
                            else{
                                $('#alertMessage').text(msg);
                                $('#modalAlert').modal('show'); 
                            }
                        },
                        processData: false,
                        contentType: false
                });
            }
        }
    });
};
$("#addPositionDivision").on('change',function(){ //function trigger if division selected unit will be auto populated
    var divisionAction = $(this).attr("id");
    var division_ids = $(this).val();
    if(division_ids){
        $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{divisionAction:divisionAction, division_ids:division_ids},
        success:function(data){
            $('#addPositionUnit').html(data);
        }
    });
    }else{
        $('#addPositionUnit').html('<option value="">SELECT DIVISION FIRST</option>');
    }
});
$("#positionContentAdd").on("submit",function(event){ //button submit for adding new position
    event.preventDefault();
    const ClassificationStatus = $("#addPositionClassification").val();
    if(ClassificationStatus== 1 || ClassificationStatus== 2){
        insertNewPosition();
    }else{
        btnGenerateItemNumber();
    }
});
 $("#frmAddHistory").on("submit",function(event){ //button submit for adding new history
    event.preventDefault();
    const HistoryDateStart = $("#addHistoryDateStart").val();
    const HistoryDateEnd = $("#addHistoryDateEnd").val();
    const HistoryItemCode = $("#addHistoryItemCode").val();
    $("#addHistoryDateStart").css('border-color', '');
    $("#addHistoryDateEnd").css('border-color', '');
    $("#CheckaddHistoryDateEnd").html("");
    
    if(HistoryDateStart > HistoryDateEnd){
        $("#addHistoryDateStart").css('border-color', 'red');
        $("#addHistoryDateEnd").css('border-color', 'red');
        $("#CheckaddHistoryDateEnd").html("The encoded date encountered an issue. Please verify it first.").css('color', 'red');
    }
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkExistStartDate:HistoryDateStart,checkExistEndDate:HistoryDateEnd,HistoryItemCode:HistoryItemCode},
        success:function(data){
            const CheckDate = JSON.parse(data);
            const DateExisted = CheckDate['employee_assignment_id'];
            if(DateExisted > 0){
                alert("Date Existed")
            }else{
                var formData = new FormData(frmAddHistory);
                $.ajax({
                    url:"positionHistoryAdd.php",
                            method:"POST",
                            dataType: "json",
                            data:formData,
                            success:function(data){
                                $("#formAddHistory").hide();
                                const msg = data.msg;
                                const stat = data.status;
                                if(stat == "success"){
                                    $('#modalNotif-header').text('Great! Success.');
                                    $('#modalNotif-message').text(msg);
                                    $('#modalNotif').modal('show');
                                }
                                else{
                                    $('#alertMessage').text(msg);
                                    $('#modalAlert').modal('show'); 
                                }
                            },
                            processData: false,
                            contentType: false
                    });  
            }
        }
        })
    
 });
 $("#positionNameAdd").on("submit",function(event){ //button submit on the adding of position name
    event.preventDefault();
    const PositionName = $("#addLPNPositionName").val();
    const PositionInitial = $("#addLPNPositionInitial").val();
    $("#CheckaddLPNPositionName").html("").css('color', '');
    $("#addLPNPositionName").css('border-color', '');
    $("#CheckaddLPNPositionInitial").html("");
    $("#addLPNPositionInitial").css('border-color', '');
    $.ajax({ //getInfo session
        url:"checkExist.php",
        method:"POST",
        data:{PositionName:PositionName,PositionInitial:PositionInitial},
        dataType: 'json',
        success:function(data){
            const PositionName = data.PositionName;
            const PositionInitial = data.PositionInitial;
            if(PositionName>0){
                $("#CheckaddLPNPositionName").html("The Position Name entered has already been utilized.").css('color', 'red');
                $("#addLPNPositionName").css('border-color', 'red');
                $("#addLPNPositionName").focus();
                $("#addNewPositionName").modal({"backdrop": "static"});
            }
            if(PositionInitial>0){
                $("#CheckaddLPNPositionInitial").html("The Position Initial entered has already been utilized.").css('color', 'red');
                $("#addLPNPositionInitial").css('border-color', 'red');
                $("#addLPNPositionInitial").focus();
                $("#addNewPositionName").modal({"backdrop": "static"});
            }
            if(PositionInitial <1 && PositionName <1){
                var formData = new FormData(positionNameAdd);
                $.ajax({
                url:"positionNameAdd.php",
                        method:"POST",
                        dataType: "json",
                        data:formData,
                        success:function(data){
                            const msg = data.msg;
                            const stat = data.status;
                            if(stat == "success"){
                                $('#modalNotif-header').text('Great! Success.');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                            }
                            else{
                                $('#alertMessage').text(msg);
                                $('#modalAlert').modal('show'); 
                            }
                        },
                        processData: false,
                        contentType: false
                });
            }
        }
    });
});
$("#frmUpdatePosition").on("submit",function(event){ //trigger update 
    event.preventDefault();
    var formData = new FormData(frmUpdatePosition);
    $.ajax({
      url:"adminUpdatePosition.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){ 
            $('#formAddHistory').modal('hide');
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      },
      processData: false,
      contentType: false
    }); 
})
function btnPositionInfo(getPositionInfo){ //function trigger to retrieved position information from lib_position
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getPositionInfo:getPositionInfo},
        success:function(data){
            const PositionNameData = JSON.parse(data);
            $("#posNameID").val(PositionNameData['position_name_id']);
            $("#updateLPNPositionName").val(PositionNameData['position_name']);
            $("#updateLPNPositionInitial").val(PositionNameData['position_initial']);
            $("#UpdatePositionName").modal('show');
        }
    });
};
function btnUpdatePositionName(getPositionNameDetails){ //function trigger to retrieved position name from lib_position_name
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getPositionNameDetails:getPositionNameDetails},
        success:function(data){
            const PositionNameData = JSON.parse(data);
            $("#posNameID").val(PositionNameData['position_name_id']);
            $("#updateLPNPositionName").val(PositionNameData['position_name']);
            $("#updateLPNPositionInitial").val(PositionNameData['position_initial']);
            $("#UpdatePositionName").modal('show');
        }
    });
};
function btnCheckDeletePositionName(){ // function trigger to delete position name
    const checkPositionNameID = $('#posNameID').val();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkInUsedPositionName:checkPositionNameID},
        success:function(data){
            const CheckPositionName = JSON.parse(data);
            const inUsedPosName = CheckPositionName['position_name_id'];
            if(inUsedPosName>0){
                alert("Position is currently in use and cannot be deleted.");
            }else{
                var formData = new FormData(positionNameUpdate);
                $.ajax({
                url:"positionNameDelete.php",
                        method:"POST",
                        dataType: "json",
                        data:formData,
                        success:function(data){
                            const msg = data.msg;
                            const stat = data.status;
                            if(stat == "success"){
                                $('#modalNotif-header').text('Great! Success.');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                            }
                            else{
                                $('#alertMessage').text(msg);
                                $('#modalAlert').modal('show'); 
                            }
                        },
                        processData: false,
                        contentType: false
                });
            }
        }
    });
};
$("#positionNameUpdate").on("submit",function(event){ //button submit on the updating of position name
    event.preventDefault();
    const UpdatePositionNameID = $("#posNameID").val();
    const UpdatePositionName = $("#updateLPNPositionName").val();
    const UpdatePositionInitial = $("#updateLPNPositionInitial").val();
    $.ajax({ //getInfo session
        url:"checkExist.php",
        method:"POST",
        data:{UpdatePositionName:UpdatePositionName,UpdatePositionInitial:UpdatePositionInitial,UpdatePositionNameID:UpdatePositionNameID},
        dataType: 'json',
        success:function(data){
            const UpdatePositionName = data.UpdatePositionName;
            const UpdatePositionInitial = data.UpdatePositionInitial;
            if(UpdatePositionName>0){
                $("#CheckupdateLPNPositionName").html("The Position Name entered has already been utilized.").css('color', 'red');
                $("#updateLPNPositionName").css('border-color', 'red');
                $("#updateLPNPositionName").focus();
                $("#UpdatePositionName").modal({"backdrop": "static"});
            }
            if(UpdatePositionInitial>0){
                $("#CheckupdateLPNPositionInitial").html("The Position Initial entered has already been utilized.").css('color', 'red');
                $("#updateLPNPositionInitial").css('border-color', 'red');
                $("#updateLPNPositionInitial").focus();
                $("#UpdatePositionName").modal({"backdrop": "static"});
            }
            if(UpdatePositionName <1 && UpdatePositionInitial <1){
                var formData = new FormData(positionNameUpdate);
                $.ajax({
                url:"positionNameUpdate.php",
                        method:"POST",
                        dataType: "json",
                        data:formData,
                        success:function(data){
                            const msg = data.msg;
                            const stat = data.status;
                            if(stat == "success"){
                                $('#modalNotif-header').text('Great! Success.');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                            }
                            else{
                                $('#alertMessage').text(msg);
                                $('#modalAlert').modal('show'); 
                            }
                        },
                        processData: false,
                        contentType: false
                });
            }
        }
    });
});
function insertNewPosition(){
    const ItemNumber = $("#addPositionItemCode").val();
    $.ajax({ //getInfo session
        url:"checkExist.php",
        method:"POST",
        data:{ItemNumber:ItemNumber},
        dataType: 'json',
        success:function(data){
            const ItemCode = data.ItemCode;
            if(ItemCode>0){
                $("#CheckPositionItemCode").html("The item code entered has already been utilized.").css('color', 'red');
                $("#addPositionItemCode").css('border-color', 'red');
                $("#addPositionItemCode").focus();
                validatePass = 0;
                $("#addNewPosition").modal({"backdrop": "static"});
            }else{
                var formData = new FormData(positionContentAdd);
                $.ajax({
                url:"positionAdd.php",
                        method:"POST",
                        dataType: "json",
                        data:formData,
                        success:function(data){
                            const msg = data.msg;
                            const stat = data.status;
                            if(stat == "success"){
                                $('#modalNotif-header').text('Great! Success.');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                            }
                            else{
                                $('#alertMessage').text(msg);
                                $('#modalAlert').modal('show'); 
                            }
                        },
                        processData: false,
                        contentType: false
                });
            }
        }
    });
};
function btnGenerateItemNumber(){ //generate item number based on position, office and employment status
    const positionNameID = $("#addPositionName").val();
    const ClassificationID = $("#addPositionClassification").val();
    const UnitID = $("#addPositionUnit").val();
    //item code = FO3-Unit Initial-Classi  fication initial-position initial-series xxx
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{GenerateItemNumber:1,positionNameID:positionNameID,ClassificationID:ClassificationID,UnitID:UnitID},
        dataType:"json",
        success:function(data){
            const outputPosInitial = data.position_initial;
            const outputClassificationInitial = data.classification_employment_initial;
            const outputUnitInitial = data.unit_name_code;
            const format = ('FO3'+'-'+outputUnitInitial+'-'+outputClassificationInitial+'-'+outputPosInitial);
            $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{checkItemCodeIncrement:format},
                dataType:"json",
                success:function(data){
                    const ItemCodeIncrement = data.item_code_format;
                    var Position_Item_Code = ItemCodeIncrement;
                    Position_Item_Code++;
                    const lastNumber_count = Position_Item_Code.toString().length;
                    var zeros = "";
                    for(let i=lastNumber_count; i<3; i++){
                         zeros = zeros +'0';
                     }
                    lastNumber = zeros+Position_Item_Code;
                    $('#addPositionItemCodeFormat').val(format);
                    $("#addPositionItemCode").val(format+'-'+lastNumber);
                    if($("#addPositionItemCode").val()!=''){
                        insertNewPosition(); 
                    }else{
                        alert("Error! Please try again.");
                    }
                }
            })
        }
    });
    return true;
};
function onChangeClassEmployment(){ //enable item code when classification of status = permanent
    var ClassEmployment = $("#addPositionClassification").val();
    if(ClassEmployment== 1 || ClassEmployment== 2){
        $("#addPositionItemCode").val('')
        $("#addPositionItemCode").attr("readonly",false)
    }else{
        $("#addPositionItemCode").val('')
        $("#addPositionItemCode").attr("readonly","readonly");
    }
};
  