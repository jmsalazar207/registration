$(function(){
    $('.select2').select2()
//Fill dropdown on page load
$(".loader-div").show();
$.ajax({
  url:"includes/functions.php",
  method:"POST",
  data:{update_division_id:0},
  success:function(data){
      $(".loader-div").hide(); 
      $('#addPositionDivision').html(data);
  },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
});

$(".loader-div").show();
$.ajax({
  url:"includes/functions.php",
  method:"POST",
  data:{list_position_name:0},
  success:function(data){
      $(".loader-div").hide(); 
      $('#addPositionName').html(data);
  },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
});

$(".loader-div").show();
$.ajax({
  url:"includes/functions.php",
  method:"POST",
  data:{list_class_employment:0},
  success:function(data){
      $(".loader-div").hide(); 
      $('#addPositionClassification').html(data);
  },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
});

$(".loader-div").show();
$.ajax({
  url:"includes/functions.php",
  method:"POST",
  data:{list_salary_grade:0},
  success:function(data){
      $(".loader-div").hide(); 
      $('#addPositionSalaryGrade').html(data);
  },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
});

$(".loader-div").show();
$.ajax({
  url:"includes/functions.php",
  method:"POST",
  data:{list_fund_source:0},
  success:function(data){
      $(".loader-div").hide(); 
      $('#addPositionFundSource').html(data);
  },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
});



//End Fill Dropdown
// Onchange Drop down Functions
    $(document).on('change','#UpdatePositionDivision',function(){
        var divisionAction = $(this).val();
        $(".loader-div").show();
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_unit_id:'',Where_division_ID:divisionAction},
            success:function(data){
                $(".loader-div").hide();
                $('#UpdatePositionAreaAssign').html('<option value="">SELECT UNIT FIRST</option>');
                $('#UpdatePositionUnit').html(data);
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
        }); 
    });

    $(document).on('change','#UpdatePositionUnit',function(){
        var unitAction = $(this).val();
        $(".loader-div").show();
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_assignment_id:'',Where_unit_ID:unitAction},
            success:function(data){
                $(".loader-div").hide();
                $('#UpdatePositionAreaAssign').html(data);
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
        }); 
    });

    $(document).on('change','#addPositionDivision',function(){ 
        $(".loader-div").show();
        var divisionAction = $(this).val();
        if(divisionAction){
            $(".loader-div").show();
            $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{update_unit_id:'',Where_division_ID:divisionAction},
                success:function(data){
                    $(".loader-div").hide();
                    $('#addPositionAreaAssignment').html('<option value="">SELECT UNIT FIRST</option>');
                    $('#addPositionUnit').html(data);
                },error: function(xhr, status, error) {
                    modalErrorShow("The system encountered an error. Please contact support.");
                    $(".loader-div").hide();
                  }
            }); 
        }else{
            $('#addPositionUnit').html('<option value="">SELECT DIVISION FIRST</option>');
        }
    });

    $(document).on('change','#addPositionUnit',function(){
        var unitAction = $(this).val();
        $(".loader-div").show();
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_assignment_id:'',Where_unit_ID:unitAction},
            success:function(data){
                $(".loader-div").hide();
                $('#addPositionAreaAssignment').html(data);
            },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
        }); 
    });
//End Onchange Drop down Functions
});


//Trigger Function
  $(document).on('click','#btnPositionHistory',function(){
    var getPositionHistoryDetails = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
    url:"includes/functions.php",
    method:"POST",
    data:{getPositionHistoryDetails:getPositionHistoryDetails},
    success:function(data){
		$(".loader-div").hide();
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
        var update_assignment_code = PositionData["area_assignment_code"];
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_assignment_id:update_assignment_code,Where_unit_ID:update_unit_id},
            success:function(data){
                $('#UpdatePositionAreaAssign').html(data);
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
    },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
});

$(document).on('click','#btnDeletePosition',function(){
    PassData = $('#position_id').val();
    modalConfirmShow('Are you sure you want to proceed with abolishing this position',AbolishPosition,PassData);
});

$(document).on('submit','#frmUpdatePosition',function(event){
    event.preventDefault();
    var PassData =  new FormData(frmUpdatePosition);
    modalConfirmShow('Would you like to confirm and save the position details now?',AdminUpdatePosition,PassData); 
});

$(document).on('change','#addPositionClassification',function(){
    onChangeClassEmployment();
});

$(document).on("submit","#positionContentAdd",function(event){ //button submit for adding new position
    event.preventDefault(); // Prevent the default form submission
    var PassData = ''
    modalConfirmShow('Would you like to confirm and save the new user details now?',checkEmployementStatus,PassData);
});


//End Trigger Function

//Functions
function AbolishPosition(checkPositionID){
    $(".loader-div").show();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkInUsedPosition:checkPositionID},
        success:function(data){
            $(".loader-div").hide(); 
            const CheckPosition = JSON.parse(data);
            const inUsedPosition = CheckPosition['position_id'];
            if(inUsedPosition > 0){
                modalAlertShow("The position is currently occupied and cannot be deleted.",CloseDynamicModal);
            }else{
                $.ajax({
                url:"positionDelete.php",
                method:"POST",
                dataType: "json",
                data:{deletePositionID:checkPositionID},
                success:function(data){
                    $('#formAddHistory').modal('hide');
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
                  }
                });
            }
        },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
    });
}

function AdminUpdatePosition(formData){
    $(".loader-div").show(); 
    $.ajax({
      url:"adminUpdatePosition.php",
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

function onChangeClassEmployment(){ //enable item code when classification of status = permanent
    var ClassEmployment = $("#addPositionClassification").val();
    if(ClassEmployment== 1 || ClassEmployment== 2){
        $("#addPositionItemCode").val('')
        $("#addPositionItemCode").attr("readonly",false)
    }else{
        $("#addPositionItemCode").val('')
        $("#addPositionItemCode").attr("readonly","readonly");
    }
}

function checkEmployementStatus(formData){
    const ClassificationStatus = $("#addPositionClassification").val();
    if(ClassificationStatus){
        if(ClassificationStatus== 1 || ClassificationStatus== 2){ //permanent
            insertNewPosition();
        }else{
            btnGenerateItemNumber();
        }
    }else{
        modalErrorShow('Something went wrong, please try again');
    }

}

function insertNewPosition(){
    var formData =new FormData(positionContentAdd);
    $(".loader-div").show();
    const ItemNumber = $("#addPositionItemCode").val();
    $(".loader-div").show();
    $.ajax({ //getInfo session
        url:"checkExist.php",
        method:"POST",
        data:{ItemNumber:ItemNumber},
        dataType: 'json',
        success:function(data){
            $(".loader-div").hide(); 
            const ItemCode = data.ItemCode;
            if(ItemCode>0){
                $("#CheckPositionItemCode").html("The item code entered has already been utilized.").css('color', 'red');
                $("#addPositionItemCode").css('border-color', 'red');
                $("#addPositionItemCode").focus();
                validatePass = 0;
                $("#addNewPosition").modal({"backdrop": "static"});
            }else{
                $.ajax({
                url:"positionAdd.php",
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

function btnGenerateItemNumber(formData){ //generate item number based on position, office and employment status
    const positionNameID = $("#addPositionName").val();
    const ClassificationID = $("#addPositionClassification").val();
    const FundSourceID = $("#addPositionFundSource").val();
    alert(FundSourceID);
    //item code = FO3-Unit Initial-Classi  fication initial-position initial-series xxx
		$(".loader-div").show();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{GenerateItemNumber:1,positionNameID:positionNameID,ClassificationID:ClassificationID,FundSourceID:FundSourceID},
        dataType:"json",
        success:function(data){
            $(".loader-div").hide(); 
            const outputPosInitial = data.position_initial;
            const outputClassificationInitial = data.classification_employment_initial;
            const outputFundSourceInitial = data.fund_source_initial;
            const format = ('FO3'+'-'+outputFundSourceInitial+'-'+outputClassificationInitial+'-'+outputPosInitial);
            $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{checkItemCodeIncrement:format},
                dataType:"json",
                success:function(data){
                    $(".loader-div").hide(); 
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
                        insertNewPosition(formData); 
                    }else{
                        modalErrorShow("Error! Please try again.");
                    }
                },error: function(xhr, status, error) {
                    modalErrorShow("The system encountered an error. Please contact support.");
                    $(".loader-div").hide();
                  }
            })
        },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
    });
    return true;
}
//End Functions









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
    
		$(".loader-div").show();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkExistStartDate:HistoryDateStart,checkExistEndDate:HistoryDateEnd,HistoryItemCode:HistoryItemCode},
        success:function(data){
            $(".loader-div").hide(); 
            const CheckDate = JSON.parse(data);
            const DateExisted = CheckDate['employee_assignment_id'];
            if(DateExisted > 0){
                modalAlertShow("Date Existed",CloseDynamicModal);
            }else{
                $(".loader-div").show();
                var formData = new FormData(frmAddHistory);
                $.ajax({
                    url:"positionHistoryAdd.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
                        $(".loader-div").hide(); 
                        $("#formAddHistory").hide();
                        const msg = data.msg;
                        const stat = data.status;
                        if(stat == "success"){
                            modalSuccessShow(msg,refreshPage);
                        }
                        else{
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
    $(".loader-div").show();
    $.ajax({ //getInfo session
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
            }
            if(PositionInitial>0){
                $("#CheckaddLPNPositionInitial").html("The Position Initial entered has already been utilized.").css('color', 'red');
                $("#addLPNPositionInitial").css('border-color', 'red');
                $("#addLPNPositionInitial").focus();
                $("#addNewPositionName").modal({"backdrop": "static"});
            }
            if(PositionInitial <1 && PositionName <1){
                $(".loader-div").show();
                var formData = new FormData(positionNameAdd);
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
                        }
                        else{
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
});

function btnPositionInfo(getPositionInfo){ //function trigger to retrieved position information from lib_position
    $(".loader-div").show();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getPositionInfo:getPositionInfo},
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
};
function btnUpdatePositionName(getPositionNameDetails){ //function trigger to retrieved position name from lib_position_name
    $(".loader-div").show();
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
};
function btnCheckDeletePositionName(){ // function trigger to delete position name
    $(".loader-div").show();
    const checkPositionNameID = $('#posNameID').val();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{checkInUsedPositionName:checkPositionNameID},
        success:function(data){
            $(".loader-div").hide(); 
            const CheckPositionName = JSON.parse(data);
            const inUsedPosName = CheckPositionName['position_name_id'];
            if(inUsedPosName>0){
                modalAlertShow("Position Name is currently in use and cannot be deleted.",CloseDynamicModal);
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
                                modalSuccessShow(msg,refreshPage);
                            }
                            else{
                                modalErrorShow(msg);
                            }
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
$("#positionNameUpdate").on("submit",function(event){ //button submit on the updating of position name
    event.preventDefault();
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
                                modalSuccessShow(msg,refreshPage);
                            }
                            else{
                                modalErrorShow(msg);
                            }
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
});


  