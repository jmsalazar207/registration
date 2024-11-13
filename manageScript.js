
function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  $(function(){
    $('.select2').select2();
    jQuery("#txtRegion").on('change',function(){
      var regionAction = jQuery(this).attr("id");
      var region_id = jQuery(this).val();
      if(region_id){
          jQuery.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{regionAction:regionAction, region_id:region_id},
          success:function(data){

              jQuery('#txtProvince').html(data);
              jQuery('#txtCity').html('<option value="">SELECT PROVINCE FIRST</option>');
              jQuery('#txtBrgy').html('<option value="">SELECT MUNICIPALITY FIRST</option>');  
          }
      });
      }else{
          jQuery('#txtProvince').html('<option value="">SELECT REGION FIRST</option>');
          jQuery('#txtCity').html('<option value="">SELECT PROVINCE FIRST</option>');
          jQuery('#txtBrgy').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
      }
  });
  jQuery("#txtProvince").on('change',function(){
    var provinceAction = jQuery(this).attr("id");
    var province_id = jQuery(this).val();
    if(province_id){
        jQuery.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{provinceAction:provinceAction, province_id:province_id},
        success:function(data){
            jQuery('#txtCity').html(data);
            jQuery('#txtBrgy').html('<option value="">SELECT MUNICIPALITY FIRST</option>');  
        }
    });
    }else{
        jQuery('#txtCity').html('<option value="">SELECT PROVINCE FIRST</option>');
        jQuery('#txtBrgy').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
    }
});
jQuery("#txtCity").on('change',function(){
  var cityAction = jQuery(this).attr("id");
  var city_id = jQuery(this).val();
  if(city_id){
      jQuery.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{cityAction:cityAction, city_id:city_id},
      success:function(data){
          jQuery('#txtBrgy').html(data);
           
      }
  });
  }else{
      jQuery('#txtBrgy').html('<option value="">SELECT PROVINCE FIRST</option>');
     
  }
});
jQuery("#txtDivision").on('change',function(){
  var divisionAction = jQuery(this).attr("id");
  var division_ids = jQuery(this).val();
  if(division_ids){
      jQuery.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{divisionAction:divisionAction, division_ids:division_ids},
      success:function(data){
          jQuery('#txtUnit').html(data);
      }
  });
  }else{
      jQuery('#txtUnit').html('<option value="">SELECT DIVISION FIRST</option>');
  }
});
  });
  function adminUpdate(updateEmpno){ //retrieve data to modal admin edit user
    $("#divNewItemCode").hide();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{sessionEmpno:updateEmpno},
      success:function(data){
        UpdateInfo = JSON.parse(data);
        if(UpdateInfo){
        const acc_status = UpdateInfo["account_status"];
          if(acc_status ==0){
          //Update Personal Information
            $("#txtEmpno").val(UpdateInfo["empno"].replaceAll('03-',''));
            $("#txtOldEmpno").val(UpdateInfo["empno"].replaceAll('03-',''));
            $("#txtLName").val(UpdateInfo["sname"]);
            $("#txtFName").val(UpdateInfo["fname"]);
            $("#txtMName").val(UpdateInfo["mname"]);
            $("#txtExtName").val(UpdateInfo["ename"]).trigger('change');
            
            $("#divSex").hide();
            $("#divBirthdate").hide();
            $("#divEmailAddress").hide();
            $("#divMobileNumber").hide();
            $("#divRegion").hide();
            $("#divProvince").hide();
            $("#divCity").hide();
            $("#divBrgy").hide();

            $("#txtSex").attr("disabled","disabled");
            $("#txtBirthdate").attr("disabled","disabled");
            $("#txtEmailAddress").attr("disabled","disabled");
            $("#txtMobileNumber").attr("disabled","disabled");
            $("#txtRegion").attr("disabled","disabled");
            $("#txtProvince").attr("disabled","disabled");
            $("#txtCity").attr("disabled","disabled");
            $("#txtBrgy").attr("disabled","disabled");
          }else{
            $("#divSex").show();
            $("#divBirthdate").show();
            $("#divEmailAddress").show();
            $("#divMobileNumber").show();
            $("#divRegion").show();
            $("#divProvince").show();
            $("#divCity").show();
            $("#divBrgy").show();

            $("#txtSex").attr("disabled",false);
            $("#txtBirthdate").attr("disabled",false);
            $("#txtEmailAddress").attr("disabled",false);
            $("#txtMobileNumber").attr("disabled",false);
            $("#txtRegion").attr("disabled",false);
            $("#txtProvince").attr("disabled",false);
            $("#txtCity").attr("disabled",false);
            $("#txtBrgy").attr("disabled",false);

            $("#txtEmpno").val(UpdateInfo["empno"].replaceAll('03-',''));
            $("#txtOldEmpno").val(UpdateInfo["empno"].replaceAll('03-',''));
            $("#txtLName").val(UpdateInfo["sname"]);
            $("#txtFName").val(UpdateInfo["fname"]);
            $("#txtMName").val(UpdateInfo["mname"]);
            $("#txtExtName").val(UpdateInfo["ename"]).trigger('change');
            $("#txtSex").val(UpdateInfo["sex"]).trigger('change');
            $("#txtMobileNumber").val(UpdateInfo["mobile"]); 
            $("#txtEmailAddress").val(UpdateInfo["eaddress"]);
            $("#txtBirthdate").val(UpdateInfo["birthdate"]);
            var update_region_id = UpdateInfo["region"];
            $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{update_region_id:update_region_id},
                success:function(data){
                    $('#txtRegion').html(data);
                }
            });
            var update_province_id = UpdateInfo["province"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_province_id:update_province_id,Where_region_ID:update_region_id},
              success:function(data){
                  $('#txtProvince').html(data);
              }
          });
            var update_city_id = UpdateInfo["city"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_city_id:update_city_id,Where_province_ID:update_province_id},
              success:function(data){
                  $('#txtCity').html(data);
              }
          });
            var update_barangay_id = UpdateInfo["barangay"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_barangay_id:update_barangay_id,Where_city_ID:update_city_id},
              success:function(data){
                  $('#txtBrgy').html(data);
              }
          });
          }
          //Overview
          $("#infoEmpno").text(UpdateInfo["empno"]);
          $("#infoFullName").text(UpdateInfo['fname']+' '+UpdateInfo['mname']+' '+UpdateInfo['sname']+' '+UpdateInfo['ename']);
          $("#infoPosition").text(UpdateInfo['position_name']);
          $("#infoDivision").text(UpdateInfo['division_name']);
          $("#infoUnit").text(UpdateInfo['unit_name']);
          $("#infoAddress").text(UpdateInfo['numAdd']+' '+UpdateInfo['street']+' '+UpdateInfo['brgy_name']+' '+UpdateInfo['city_name']+' '+UpdateInfo['prov_name']+' '+UpdateInfo['region_name']);
          $("#infoMobileNo").text(UpdateInfo['mobile']);
          $("#infoEmail").text(UpdateInfo['eaddress']);
          //Update Item Code
          $("#UpdateEmpNo").val(UpdateInfo['empno']);
          $("#UpdateFullName").val(UpdateInfo['fname']+' '+UpdateInfo['mname']+' '+UpdateInfo['sname']+' '+UpdateInfo['ename']);
          $("#UpdatePosID").val(UpdateInfo['position_id']);
          $("#UpdateItemCode").val(UpdateInfo['item_code']);
          $("#UpdateDateFilled").val(UpdateInfo['date_filled']);
          const DateFilled = UpdateInfo['date_filled'];
          const DateUnfilled = $("#UpdateDateUnfilled");
          DateUnfilled.attr('min', DateFilled);
          //Condition 
              const CurrentPosition = UpdateInfo['position_id'];
              if(CurrentPosition ==''){
                $("#UpdateDateUnfilled").removeAttr('required');
                $("#UpdateReasonVacancy").removeAttr('required');
                $("#divReasonVacancy").hide();
                $("#divDateFilled").hide();
                $("#divItemCode").hide();
                $("#divDateVacated").hide();
                $("#divNewItemCode").show();
                var HistoryEmployee = UpdateInfo["empno"];
                $("#UpdateEmpHistoryLastFilled").val('');
                  $.ajax({
                    url:"includes/functions.php",
                    method:"POST",
                    data:{HistoryEmployee:HistoryEmployee},
                    dataType:"json",
                    success:function(data){
                      HistoryEndAppointment = data.end_of_appointment;
                      if(HistoryEndAppointment){
                        alert(HistoryEndAppointment);
                        $("#UpdateEmpHistoryLastFilled").val(HistoryEndAppointment);
                      }
                      
                    }
                });
              }else{
                $("#UpdateDateUnfilled").attr('required','required');
                $("#UpdateReasonVacancy").attr('required','required');
                $("#divReasonVacancy").show();
                $("#divDateFilled").show();
                $("#divItemCode").show();
                $("#divDateVacated").show();
              }
        }
        $('#formUser').modal('show');
      }
    })
  };
  function adminApprove(approveEmpno){ //retrieve data to modal admin approve user
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{sessionEmpno:approveEmpno},
      success:function(data){
        UpdateInfo = JSON.parse(data);
        const sname = UpdateInfo["sname"];
        const fname = UpdateInfo["fname"];
        const mname = UpdateInfo["mname"];
        const ename = UpdateInfo["ename"];
        const empno = UpdateInfo["empno"];
        const uploadedID = UpdateInfo["uploaded_id"];
        // alert(uploadedID);
         $("#txtValidateEmpno").val(empno);
         $("#btnApprove").val(empno);
         $("#btnDisapprove").val(empno);
         $("#txtValidateFullName").val(fname+' '+mname+' '+sname+' '+ename);
         $("#validateUploadedID").attr('src','uploadedMOV/'+uploadedID);
        $('#formApprove').modal('show');
      }
    })
  };
  $("#btnApprove").on("click",function(){
    var btnApproveEmpno = $(this).attr('value');
    $.ajax({
      url:"adminApproveUser.php",
      method:"POST",
      data:{btnApproveEmpno:btnApproveEmpno},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      }
    });
  });
  $("#btnDisapprove").on("click",function(){
    var btnDisapproveEmpno = $(this).attr('value');
    $.ajax({
      url:"adminDisapproveUser.php",
      method:"POST",
      data:{btnDisapproveEmpno:btnDisapproveEmpno},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      }
    });
  });
  function adminLock(btnAdminLockEmpno){
    $.ajax({
      url:"adminLockUser.php",
      method:"POST",
      data:{btnAdminLockEmpno:btnAdminLockEmpno},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      }
    });
  };
  function adminUnLock(btnAdminUnLockEmpno){
    $.ajax({
      url:"adminUnLockUser.php",
      method:"POST",
      data:{btnAdminUnLockEmpno:btnAdminUnLockEmpno},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      }
    });
  };
function resetPassword(btnResetPassword){
  $.ajax({
    url:"resetPassword.php",
    method:"POST",
    data:{btnResetPassword:btnResetPassword},
    dataType: 'json',
    success:function(data){
      const msg = data.msg;
      const stat = data.status;  
      if(stat === "success"){ 
        $('#modalNotif-header').text('Great! Success.');
        $('#modalNotif-message').text(msg);
        $('#modalNotif').modal('show');
      }
      else{
        $('#alertMessage').text(msg);
        $('#modalAlert').modal('show'); 
      }
    }
  });
};
$("#fromTabUpdateItemCode").on("submit",function(event){ //Trigger update item code
  $("#UpdateNewItemCode").removeAttr("required");
  $("#UpdateNewDatefilled").removeAttr("required");

  $("#UpdateNewDatefilled").css('border-color', '');
  $("#UpdateDateUnfilled").css('border-color', '');
  $("#CheckUpdateNewDatefilled").html("");
  event.preventDefault();
  const NewItemCode = $("#UpdateNewItemCode").val(); //New Item Code
  const PositionDateFilled = $("#UpdateNewDatefilled").val(); //Date Filled
  const CurrentItemCode = $("#UpdateItemCode").val(); //Current Item code
  const CurrentPositionUnfilled = $("#UpdateDateUnfilled").val(); //Current Date Unfilled
  const EmpHistoryLastFilled = $("#UpdateEmpHistoryLastFilled").val(); //employee date last filled position
  if((NewItemCode !='' && PositionDateFilled =='') || (NewItemCode =='' && PositionDateFilled !='') || (CurrentItemCode =='' && (NewItemCode =='' || PositionDateFilled ==''))) {
    alert("Please complete all required fields.");
    $("#UpdateNewItemCode").attr("required","required");
    $("#UpdateNewDatefilled").attr("required","required");
  }else if((CurrentItemCode != '' && NewItemCode !='') && (CurrentPositionUnfilled > PositionDateFilled)){
    $("#UpdateNewDatefilled").css('border-color', 'red');
    $("#UpdateDateUnfilled").css('border-color', 'red');
    $("#CheckUpdateNewDatefilled").html("An issue occurred with the encoded date. Please verify the date from when it was left unfilled to when it was filled.");
  }else if((CurrentItemCode == '' && NewItemCode !='') && (EmpHistoryLastFilled > PositionDateFilled)){
    $("#UpdateNewDatefilled").css('border-color', 'red');
    $("#CheckUpdateNewDatefilled").html("It appears there's an issue with the encoded date of filling. The latest position was filled by an employee on "+EmpHistoryLastFilled+". Kindly verify the employee's appointment history.");
  }
  else{
    AdminUpdateItemCode();
  }
});
function ValidatePositionDateCreated(){
  const NewItemCodePosID = $("#UpdateNewItemCode").val(); //New Item Code with value of position id
  $.ajax({
    url:"includes/functions.php",
      method:"POST",
      data:{CheckDateCreate:NewItemCodePosID},
      dataType:"json",
      success:function(data){
        const PositionCreatedDate = data.date_creation_position;
        const NewPositionDateCreated = $("#UpdateNewDatefilled");
        NewPositionDateCreated.attr('min', PositionCreatedDate);

    }
  });
}
function reasonVacancy(){ //trigger onchange reason of vacancy
  const reason = $("#UpdateReasonVacancy").val();
  if(reason !=11){
    $("#divNewItemCode").hide();
  }else{
    $("#divNewItemCode").show();
  }
}
function AdminUpdateItemCode(){ //trigger update item code
    var formData = new FormData(fromTabUpdateItemCode);
    $.ajax({
      url:"adminUpdateItemCode.php",
      method:"POST",
      dataType: "json",
      data:formData,
      async: false,
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
$('#contentUpdate').on("submit",function(event){ //Trigger update for userinfo
    event.preventDefault();
    const adminEmpNo = $('#txtEmpno').val();
    const adminOldEmpno = $('#txtOldEmpno').val();
    const adminFName = $('#txtFName').val();
    const adminMname = $('#txtMName').val();
    const adminLName = $('#txtLName').val();
    const Birthday = $('#txtBirthdate').val();
    const EmailAddress = $('#txtEmailAddress').val();
    const MobileNumber = $('#txtMobileNumber').val();
    const checkUpdateEmpno = '03-'+ adminEmpNo;
    var bday = new Date(Birthday);
    var month_diff = Date.now() - bday.getTime();
    var age_dt = new Date(month_diff); 
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);
    
  $("#txtEmpno").css('border-color', '');
  $("#checkTxtEmpno").html("");

  $("#txtLName").css('border-color', '');``
  $("#checkTxtLName").html("");

  $("#txtMName").css('border-color', '');
  $("#checkTxtMName").html("");
        
  $("#txtFName").css('border-color', '');
  $("#checkTxtFName").html("");

  $("#txtExtName").css('border-color', '');
  $("#checkTxtExtName").html("");

  $("#txtBirthdate").css('border-color', '');
  $("#checktxtBirthdate").html("");

  $("#txtEmailAddress").css('border-color', '');
  $("#checktxtEmailAddress").html("");

  $("#txtMobileNumber").css('border-color', '');
  $("#checktxtMobileNumber").html("");

  var validatePassUpdate = 1;
  if(Birthday){
    if((age <18) || (age >65)){
      $("#checktxtBirthdate").html("Kindly provide a valid date of birth. Age should fall within the range of 18 to 65 years.").css('color', 'red');
      $("#txtBirthdate").css('border-color','red')
      $("#txtBirthdate").focus();
      validatePassUpdate = 0;
    }
  }
  if(MobileNumber){
    if((MobileNumber.length != 11) || ((MobileNumber.slice(0, 2)) !== "09")){
      $("#checktxtMobileNumber").html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
      $("#txtMobileNumber").css('border-color', 'red');
      $("#txtMobileNumber").focus();
      validatePassUpdate = 0;
    }
  }
  if(adminLName.length <2){
    $("#checkTxtLName").html("Please enter a Last Name with at least 2 characters.").css('color', 'red');
    $("#txtLName").css('border-color', 'red');
    $("#txtLName").focus();
    validatePassUpdate = 0;
  }if(adminMname.length ==''){
    
  }else if(adminMname.length <2){
    $("#checkTxtMName").html("Please enter a Middle Name with at least 2 characters.").css('color', 'red');
    $("#txtMName").css('border-color', 'red');
    $("#txtMName").focus();
    validatePassUpdate = 0;
  }if(adminFName.length <2){
    $("#checkTxtFName").html("Please enter a First Name with at least 2 characters.").css('color', 'red');
    $("#txtFName").css('border-color', 'red');
    $("#txtFName").focus();
    validatePassUpdate = 0;
  }if ((adminEmpNo.length>5) || (adminEmpNo.length<4)){
    $("#checkTxtEmpno").html("Invalid Employee number. Please enter a number with a minimum of 4 digits and a maximum of 5 digits.").css('color', 'red');
    $("#txtEmpno").css('border-color', 'red');
    $("#txtEmpno").focus();
    validatePassUpdate = 0;
  }
  $.ajax({ //check empno
    url:"checkExist.php",
    method:"POST",
    data: {updateEmpNo:adminEmpNo, adminOldEmpno:adminOldEmpno},
    dataType: 'json',
    success:function(data){
        const uniqueEmpNo = data.updateEmpNO;
        if(uniqueEmpNo > 0){
            $("#checkTxtEmpno").html("Oops! It seems this employee number has already been used. Please double-check your information and try again, or contact support for assistance.").css('color', 'red');
            $("#txtEmpno").css('border-color', 'red');
            $("#txtEmpno").focus();
            validatePassUpdate = 0;
        }
        else{
          $.ajax({ //check email and mobile if existed 
            url:"checkUnique.php",
            method:"POST",
            data: {empno:checkUpdateEmpno,email:EmailAddress,mobile_no:MobileNumber},
            dataType: 'json',
            success:function(data){
              const uniqueMobile = data.mobile;
              const uniqueEmail = data.email;
                if(uniqueEmail > 0){
                  $("#txtEmailAddress").css('border-color', 'red');
                  $("#txtEmailAddress").focus();
                  $("#checktxtEmailAddress").html("");
                  $("#checktxtEmailAddress").html("The email address provided has already been used.").css('color', 'red');
                  validatePassUpdate = 0;
                }else if(uniqueMobile > 0){
                  $("#txtMobileNumber").css('border-color', 'red');
                  $("#txtMobileNumber").focus();
                  $("#checktxtMobileNumber").html("");
                  $("#checktxtMobileNumber").html("The mobile number provided has already been used.").css('color', 'red');
                  validatePassUpdate = 0;
                }else if(validatePassUpdate == 1){
                  // process update 
                  var formData = new FormData(contentUpdate);
                  $.ajax({
                    url:"adminUpdateNewUser.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
                      const msg = data.msg;
                      const stat = data.status;
                      if(stat === "success"){ 
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
            },
          });
        }
    },
    });
    // UPDATWEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
});
$("#contentAdd").on("submit",function(event){ //Trigger add new userinfo
  event.preventDefault();
  const addEmpNo = $('#txtAddEmpno').val();
  const addFName = $('#txtAddFName').val();
  const addMname = $('#txtAddMName').val();
  const addLName = $('#txtAddLName').val();
  const addExtName = $('#txtAddExtName').val();

  $("#txtAddEmpno").css('border-color', '');
  $("#checkTxtAddEmpno").html("");

  $("#txtAddLName").css('border-color', '');
  $("#checkTxtAddLName").html("");

  $("#txtAddMName").css('border-color', '');
  $("#checkTxtAddMName").html("");

  $("#txtAddFName").css('border-color', '');
  $("#checkTxtAddFName").html("");

  var validatePassSubmit = 1;

    if(addLName.length <2){
      $("#checkTxtAddLName").html("Please enter a Last Name with at least 2 characters.").css('color', 'red');
      $("#txtAddLName").css('border-color', 'red');
      $("#txtAddLName").focus();
      validatePassSubmit = 0;
    }if(addMname.length ==''){
      
    }else if(addMname.length <2){
      $("#checkTxtAddMName").html("Please enter a Middle Name with at least 2 characters.").css('color', 'red');
      $("#txtAddMName").css('border-color', 'red');
      $("#txtAddMName").focus();
      validatePassSubmit = 0;
    }if(addFName.length <2){
      $("#checkTxtAddFName").html("Please enter a First Name with at least 2 characters.").css('color', 'red');
      $("#txtAddFName").css('border-color', 'red');
      $("#checkTxtAddFName").focus();
      validatePassSubmit = 0;
    }if ((addEmpNo.length>5) || (addEmpNo.length<4)){
      $("#checkTxtAddEmpno").html("Invalid Employee number. Please enter a number with a minimum of 4 digits and a maximum of 5 digits.").css('color', 'red');
      $("#txtAddEmpno").css('border-color', 'red');
      $("#txtAddEmpno").focus();
      validatePassSubmit = 0;
    }
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {addEmpNo:addEmpNo},
      dataType: 'json',
      success:function(data){
          const uniqueEmpNo = data.empNO;
          if(uniqueEmpNo){
              $("#checkTxtAddEmpno").html("Oops! It seems this employee number has already been used. Please double-check your information and try again, or contact support for assistance.").css('color', 'red');
              $("#txtAddEmpno").css('border-color', 'red');
              $("#txtAddEmpno").focus();
              validatePassSubmit = 0;
          }else if(validatePassSubmit == 1){
                  // process register
                  var formData = new FormData(contentAdd);
                  $.ajax({
                    url:"adminAddNewUser.php",
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
      },
      });
});
$('#contentDivision').on("submit", function(event){ //trigger add division
  event.preventDefault();
    const DivisionName = $('#txtDivName').val();
    const DivisionNameCode = $('#txtDivNameCode').val();
    const Cluster = $('#txtCluster').val();

    $("#txtDivName").css('border-color', '');
    $("#checktxtDivName").html("");

    $("#txtDivNameCode").css('border-color', '');
    $("#checktxtDivNameCode").html("");
    
    var validatePass = 1;
    if(DivisionName.length <2){
      $("#checktxtDivName").html("Please enter a Division Name with at least 2 characters.").css('color', 'red');
      $("#txtDivName").css('border-color', 'red');
      $("#txtDivName").focus();
      validatePass = 0;
    }if(DivisionNameCode.length <2){
      $("#checktxtDivNameCode").html("Please enter a Division Name Code with at least 2 characters.").css('color', 'red');
      $("#txtDivNameCode").css('border-color', 'red');
      $("#txtDivNameCode").focus();
      validatePass = 0;
    }
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {adminDivision:DivisionName},
      dataType: 'json',
      success:function(data){
          const uniqueDivName = data.divName;
          if(uniqueDivName){
              $("#checktxtDivName").html("Apologies for the inconvenience. It appears that the division name you provided already exists. Please verify the information and try again, or reach out to support for further assistance.").css('color', 'red');
              $("#txtDivName").css('border-color', 'red');
              $("#txtDivName").focus();
              validatePass = 0;
          }else if(validatePass == 1){
            alert('ala neman kalupa');
                  // process update
                  var formData = new FormData(contentDivision);
                  $.ajax({
                    url:"adminAddNewDivision.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
                      const msg = data.msg;
                      const stat = data.status;
                      if(stat === "success"){ 
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
      },
      });
});
function btnDelete(Value){
  var btnValue = Value;
  const array = btnValue.split(",");
  const ID = array[0];
  const PHP = array[1];
  $('#DeleteID').val('');
  $('#DeletePHP').val('');
  $('#DeleteID').val(ID);
  $('#DeletePHP').val(PHP);
  $('#modalConfirmDelete').modal('show');
}
$("#frmConfirmDelete").on("submit",function(event){
  $deleteURL = $('#DeletePHP').val();
  event.preventDefault();
  var formData = new FormData(frmConfirmDelete);
  $.ajax({
    url:$deleteURL,
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $('#modalConfirmDelete').modal('hide');
      const msg = data.msg;
      const stat = data.status;
      if(stat == "success"){
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
            $('#modalNotif').modal('show');
            }
      else{
        $('#modalNotif-header').text('Error!');
        $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
      }
    },
    processData: false,
    contentType: false

  });
});
function btnGererateEmployeeNumber(){
  
}