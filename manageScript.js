
  $(function(){
//Initialized
    $('.select2').select2();
//END Initialized
//Onchange Dropdown 
    $(document).on('change','#txtRegion',function(){
      var update_region_id = $(this).val();
          $(".loader-div").show();
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_province:'',Where_region_ID:update_region_id},
            success:function(data){
              $(".loader-div").hide(); 
                $('#txtProvince').html(data);
                $('#txtCity').html('<option value="">SELECT PROVINCE FIRST</option>');
                $('#txtBrgy').html('<option value="">SELECT CITY/MUNICIPALITY FIRST</option>');
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });
    });
    $(document).on('change','#txtProvince',function(){
      var update_province_id = $(this).val();
          $(".loader-div").show();
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_city:'',Where_province_ID:update_province_id},
            success:function(data){
              $(".loader-div").hide(); 
              $('#txtCity').html(data);
              $('#txtBrgy').html('<option value="">SELECT CITY/MUNICIPALITY FIRST</option>');
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });
    });
    $(document).on('change','#txtCity',function(){
      var update_city_id = $(this).val();
          $(".loader-div").show();
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_brgy:'',Where_city_ID:update_city_id},
            success:function(data){
              $(".loader-div").hide(); 
                $('#txtBrgy').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });
    });

//END Onchange Dropdown 
// Populate on load
    $.ajax({ //Populate division dropdown in unit management
      url:"includes/functions.php",
      method:"POST",
      data:{list_division_id:0},
      success:function(data){
          $('#txtUnitDiv').html(data);
      } 
    });
//END Populate on load

  });

  function hideDivItemCode(){
    $("#divCurrentItemCode").hide();
    $("#divDateFilled").hide();
    $("#divDateVacated").hide();
    $("#divReasonVacancy").hide();
    $("#divNewItemCodeDateFilled").hide();
    $("#divNewItemCode").hide();
  }

  function populateAdminUpdateModal(UpdateInfo){
    if(UpdateInfo){
      const acc_status = UpdateInfo["account_status"];
        if(acc_status ==0){
        //Populate Update Personal Information
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
          $(".loader-div").show();
          $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{list_region:update_region_id},
              success:function(data){
                $(".loader-div").hide(); 
                  $('#txtRegion').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
          });

          var update_province_id = UpdateInfo["province"];
          $(".loader-div").show();
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_province:update_province_id,Where_region_ID:update_region_id},
            success:function(data){
              $(".loader-div").hide(); 
                $('#txtProvince').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });

          var update_city_id = UpdateInfo["city"];
          $(".loader-div").show();
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_city:update_city_id,Where_province_ID:update_province_id},
            success:function(data){
              $(".loader-div").hide(); 
              $('#txtCity').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });
          
          var update_barangay_id = UpdateInfo["barangay"];
          $(".loader-div").show();
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{list_brgy:update_barangay_id,Where_city_ID:update_city_id},
            success:function(data){
              $(".loader-div").hide(); 
                $('#txtBrgy').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });
        }
        
        //populate Overview
        $("#infoEmpno").text(UpdateInfo["empno"]);
        $("#infoFullName").text(UpdateInfo['fname']+' '+UpdateInfo['mname']+' '+UpdateInfo['sname']+' '+UpdateInfo['ename']);
        $("#infoPosition").text(UpdateInfo['position_name']);
        $("#infoDivision").text(UpdateInfo['division_name']);
        $("#infoUnit").text(UpdateInfo['unit_name']);
        $("#infoAreaAssignment").text(UpdateInfo['area_assignment_name']);
        $("#infoAddress").text(UpdateInfo['numAdd']+' '+UpdateInfo['street']+' '+UpdateInfo['brgy_name']+' '+UpdateInfo['city_name']+' '+UpdateInfo['prov_name']+' '+UpdateInfo['region_name']);
        $("#infoMobileNo").text(UpdateInfo['mobile']);
        $("#infoEmail").text(UpdateInfo['eaddress']);

        //Populate Update Item Code
        $("#UpdateEmpNo").val(UpdateInfo['empno']); //set employee number to emp number 
        $("#UpdateFullName").val(UpdateInfo['fname']+' '+UpdateInfo['mname']+' '+UpdateInfo['sname']+' '+UpdateInfo['ename']); //set fullname to name input
        $("#UpdatePosID").val(UpdateInfo['position_id']); //set PositionID from userprofile to hidden textbox
        

        //Condition in Update Item Code 
            const CurrentPosition = UpdateInfo['position_id'];
            const EmpStatus = UpdateInfo['emp_status'];
            if(CurrentPosition !='' && EmpStatus ==0){ //Atin neng current position
              $("#UpdateItemCode").val(UpdateInfo['item_code']);
              $("#UpdateDateFilled").val(UpdateInfo['date_filled']);
              $("#divCurrentItemCode").show();
              $("#divDateFilled").show();
              $("#divDateVacated").show();
              $("#divReasonVacancy").show();
            } else { //No current position is set
              $("#divNewItemCode").show(); //show New Item code
              $("#divNewItemCodeDateFilled").show();  //show Date Filled
            }
            
      }
  }

  function ApproveRegistration(btnApproveEmpno){
    $(".loader-div").show();
    var TableID ='userManage';
    $.ajax({
      url:"adminApproveUser.php",
      method:"POST",
      data:{btnApproveEmpno:btnApproveEmpno},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#formApprove').modal('hide');
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
          modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
  }

  function DisapproveRegistration(btnDisapproveEmpno) {
    $(".loader-div").show();
    var TableID ='userManage';
    $.ajax({
      url:"adminDisapproveUser.php",
      method:"POST",
      data:{btnDisapproveEmpno:btnDisapproveEmpno},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#formApprove').modal('hide');
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
          modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
  }

  function adminLockAcount(btnAdminLockEmpno){
    $(".loader-div").show();
    var TableID ='userManage';
    $.ajax({
      url:"adminLockUser.php",
      method:"POST",
      data:{btnAdminLockEmpno:btnAdminLockEmpno},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
          modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
  }

  function adminUnlockAccount(btnAdminUnLockEmpno){
    $(".loader-div").show();
    var TableID ='userManage';
    $.ajax({
      url:"adminUnLockUser.php",
      method:"POST",
      data:{btnAdminUnLockEmpno:btnAdminUnLockEmpno},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
         modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();s
      }
    });
  }

  function adminTagInactive(btnAdminTagInactiveEmpno){
    $(".loader-div").show();
    var TableID ='userManage';
    $.ajax({
      url:"adminTagInactiveUser.php",
      method:"POST",
      data:{btnAdminTagInactiveEmpno:btnAdminTagInactiveEmpno},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
         modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();s
      }
    });
  }
  function adminTagReEngage(btnAdminReengage){
    $(".loader-div").show();
    var TableID ='userManage';
    $.ajax({
      url:"adminTagReEngage.php",
      method:"POST",
      data:{btnAdminReengage:btnAdminReengage},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
         modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();s
      }
    });
  }
  function resetPassword(btnResetPassword){
    $(".loader-div").show();
    var TableID = 'userManage';
    $.ajax({
      url:"resetPassword.php",
      method:"POST",
      data:{btnResetPassword:btnResetPassword},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,TableID);
        } else {
          modalErrorShow(msg);
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();s
      }
    });
  }

  function AdminUpdatePersonalInfo(formData){
    const adminEmpNo = $('#txtEmpno').val();
    const adminOldEmpno = $('#txtOldEmpno').val();
    const adminFName = $('#txtFName').val();
    const adminMname = $('#txtMName').val();
    const adminLName = $('#txtLName').val();
    const Birthday = $('#txtBirthdate').val();
    const EmailAddress = $('#txtEmailAddress').val();
    const MobileNumber = $('#txtMobileNumber').val();
    const checkUpdateEmpno = '03-'+ adminEmpNo;
    const checkUpdateOldEmpno = '03-'+ adminOldEmpno;
    var age = computeBday(Birthday);
    
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


  if(Birthday && ((age <18) || (age >65))){
      $("#checktxtBirthdate").html("Kindly provide a valid date of birth. Age should fall within the range of 18 to 65 years.").css('color', 'red');
      $("#txtBirthdate").css('border-color','red')
      $("#txtBirthdate").focus();

  }else if(MobileNumber && ((MobileNumber.length != 11) || ((MobileNumber.slice(0, 2)) !== "09"))){
      $("#checktxtMobileNumber").html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
      $("#txtMobileNumber").css('border-color', 'red');
      $("#txtMobileNumber").focus();

  }else if(adminLName.length <2){
    $("#checkTxtLName").html("Please enter a Last Name with at least 2 characters.").css('color', 'red');
    $("#txtLName").css('border-color', 'red');
    $("#txtLName").focus();

  }else if(adminMname.length >0 && adminMname.length <2){
    $("#checkTxtMName").html("Please enter a Middle Name with at least 2 characters.").css('color', 'red');
    $("#txtMName").css('border-color', 'red');
    $("#txtMName").focus();
  
  }else if(adminFName.length <2){
    $("#checkTxtFName").html("Please enter a First Name with at least 2 characters.").css('color', 'red');
    $("#txtFName").css('border-color', 'red');
    $("#txtFName").focus();

  }else if ((adminEmpNo.length>5) || (adminEmpNo.length<4)){
    $("#checkTxtEmpno").html("Invalid Employee number. Please enter a number with a minimum of 4 digits and a maximum of 5 digits.").css('color', 'red');
    $("#txtEmpno").css('border-color', 'red');
    $("#txtEmpno").focus();

  }else if(adminEmpNo > 12636){
    $("#checkTxtEmpno").html("Invalid input. Employee number must not exceed the allowed limit.").css('color', 'red');
    $("#txtEmpno").css('border-color', 'red');
    $("#txtEmpno").focus();
  }else{
    $(".loader-div").show();
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {updateEmpNo:adminEmpNo, adminOldEmpno:adminOldEmpno},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
          const uniqueEmpNo = data.updateEmpNO;
          if(uniqueEmpNo > 0){
              $("#checkTxtEmpno").html("Oops! It seems this employee number has already been used. Please double-check your information and try again, or contact support for assistance.").css('color', 'red');
              $("#txtEmpno").css('border-color', 'red');
              $("#txtEmpno").focus();
          }else{
            $(".loader-div").show();
            $.ajax({ //check email and mobile if existed 
              url:"checkUnique.php",
              method:"POST",
              data: {type:2,empno:checkUpdateEmpno,email:EmailAddress,mobile_no:MobileNumber,adminOldEmpno:checkUpdateOldEmpno},
              dataType: 'json',
              success:function(data){
                $(".loader-div").hide();
                const uniqueMobile = data.mobile;
                const uniqueEmail = data.email;
                  if(uniqueEmail > 0){
                    $("#txtEmailAddress").css('border-color', 'red');
                    $("#txtEmailAddress").focus();
                    $("#checktxtEmailAddress").html("");
                    $("#checktxtEmailAddress").html("The email address provided has already been used.").css('color', 'red');
                  }else if(uniqueMobile > 0){
                    $("#txtMobileNumber").css('border-color', 'red');
                    $("#txtMobileNumber").focus();
                    $("#checktxtMobileNumber").html("");
                    $("#checktxtMobileNumber").html("The mobile number provided has already been used.").css('color', 'red');
                  } else {
                    $(".loader-div").show();
                     var TableID = 'userManage';
                    $.ajax({
                      url:"adminUpdateNewUser.php",
                      method:"POST",
                      dataType: "json",
                      data:formData,
                      success:function(data){
                        $(".loader-div").hide();
                        const msg = data.msg;
                        const stat = data.status;
                        if(stat === "success"){ 
                          $('#formAdminUserUpdate').modal('hide');
                          modalSuccessShow(msg,triggerTableReload,TableID);
                        } else {
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
              },
            });
          }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      },
      });
  }
 
  }

  function AdminUpdateItemCode(formData){ //admin update item code input validation
    $("#CheckUpdateReasonVacancy").html("").css('color', 'red');
    $("#UpdateReasonVacancy").css('border-color','');

    $("#CheckUpdateDateUnfilled").html("").css('color', 'red');
    $("#UpdateDateUnfilled").css('border-color','');

    $("#CheckUpdateNewItemCode").html("").css('color', 'red');
    $("#UpdateNewItemCode").css('border-color','');

    $("#CheckUpdateNewDatefilled").html("");
    $("#UpdateNewDatefilled").css('border-color','');

    const condition = $("#UpdatePosID").val();

    const ReasonVacancy = $("#UpdateReasonVacancy").val();
    const DateUnfilled = $("#UpdateDateUnfilled").val();
    const CurrentDateFilled = $("#UpdateDateFilled").val();
    const NewItemCode = $("#UpdateNewItemCode").val();
    const NewItemCodeDateFilled = $("#UpdateNewDatefilled").val();

   if (condition){ //With current Item Code
      if(DateUnfilled === ''){
        $("#CheckUpdateDateUnfilled").html("To proceed, this field must be completed.").css('color', 'red');
        $("#UpdateDateUnfilled").css('border-color','red');
        $("#UpdateDateUnfilled").focus();
      }else if(DateUnfilled < CurrentDateFilled){
        $("#CheckUpdateDateUnfilled").html("Oops! The Date Unfilled cannot be later than the Previous Position's Date Filled.").css('color', 'red');
        $("#UpdateDateUnfilled").css('border-color','red');
        $("#UpdateDateUnfilled").focus();
      }else if(ReasonVacancy ==''){
        $("#CheckUpdateReasonVacancy").html("To proceed, this field must be completed.").css('color', 'red');
        $("#UpdateReasonVacancy").css('border-color','red');
        $("#UpdateReasonVacancy").focus();
      }else if(ReasonVacancy ==11 && NewItemCode ==''){
        $("#CheckUpdateNewItemCode").html("To proceed, this field must be completed.").css('color', 'red');
        $("#UpdateNewItemCode").css('border-color','red');
        $("#UpdateNewItemCode").focus();
      }else if(ReasonVacancy ==11 && NewItemCodeDateFilled ==''){
        $("#CheckUpdateNewDatefilled").html("To proceed, this field must be completed.").css('color', 'red');
        $("#UpdateNewDatefilled").css('border-color','red');
        $("#UpdateNewDatefilled").focus();
      } else {
        AdminUpdateItemCodeAction(formData);
      }
   } else { //Without Item Code set new
      if(NewItemCode ==''){
        $("#CheckUpdateNewItemCode").html("To proceed, this field must be completed.").css('color', 'red');
        $("#UpdateNewItemCode").css('border-color','red');
        $("#UpdateNewItemCode").focus();
      }else if(NewItemCodeDateFilled ==''){
        $("#CheckUpdateNewDatefilled").html("To proceed, this field must be completed.").css('color', 'red');
        $("#UpdateNewDatefilled").css('border-color','red');
        $("#UpdateNewDatefilled").focus();
      }else{
        AdminUpdateItemCodeAction(formData);
      }
   }
  }

  function AdminUpdateItemCodeAction(formData){ //action for update itemcode
      $(".loader-div").show();
      var TableID = 'userManage';
      $.ajax({
        url:"adminUpdateItemCode.php",
        method:"POST",
        dataType: "json",
        data:formData,
        success:function(data){
          $(".loader-div").hide();
          const msg = data.msg;
          const stat = data.status;
          if(stat === "success"){ 
            $('#formAdminUserUpdate').modal('hide');
            modalSuccessShow(msg,triggerTableReload,TableID);
          } else {
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

  function ValidatePositionDateCreated(){
    const NewItemCodePosID = $("#UpdateNewItemCode").val(); //New Item Code with value of position id
    if(NewItemCodePosID !=''){
      $(".loader-div").show();
      $.ajax({
        url:"includes/functions.php",
          method:"POST",
          data:{CheckDateCreate:NewItemCodePosID},
          dataType:"json",
          success:function(data){
            $(".loader-div").hide(); 
            const PositionCreatedDate = data.date_creation_position;
            const NewPositionDateCreated = $("#UpdateNewDatefilled");
            NewPositionDateCreated.attr('min', PositionCreatedDate);
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
      });
    }
  }

  function reasonVacancy(){ //trigger onchange reason of vacancy
    const reason = $("#UpdateReasonVacancy").val();
    if ((reason != 11) && (reason != 20)) {
      $("#divNewItemCode").hide();
      $("#divNewItemCodeDateFilled").hide();
    } else {
      $("#divNewItemCode").show();
      $("#divNewItemCodeDateFilled").show();
    }
  }

  function AdminDivisionAdd(formData){
    const DivisionName = $('#txtDivName').val();
    const DivisionNameCode = $('#txtDivNameCode').val();
    const Cluster = $('#txtCluster').val();

    $("#txtDivName").css('border-color', '');
    $("#checktxtDivName").html("");

    $("#txtDivNameCode").css('border-color', '');
    $("#checktxtDivNameCode").html("");

    if(DivisionName.length <2){
      $("#checktxtDivName").html("Please enter a Division Name with at least 2 characters.").css('color', 'red');
      $("#txtDivName").css('border-color', 'red');
      $("#txtDivName").focus();
    }else if(DivisionNameCode.length <2){
      $("#checktxtDivNameCode").html("Please enter a Division Name Code with at least 2 characters.").css('color', 'red');
      $("#txtDivNameCode").css('border-color', 'red');
      $("#txtDivNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:1,adminDivision:DivisionName,DivisionNameCode:DivisionNameCode},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueDivName = data.divName;
            if(uniqueDivName){
              modalErrorShow("Apologies for the inconvenience. It appears that the division details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.");
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminAddNewDivision.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,refreshPage)
                    } else {
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
        },
        });
    }

  }

  function insertNewUser(){
  const addSelectMode = $('#txtSelectMode').val();
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
    if(addFName.length <2){
      $("#checkTxtAddFName").html("Please enter a First Name with at least 2 characters.").css('color', 'red');
      $("#txtAddFName").css('border-color', 'red');
      $("#checkTxtAddFName").focus();
    }else if((addMname !='') && (addMname.length <2)){
      $("#checkTxtAddMName").html("Please enter a Middle Name with at least 2 characters.").css('color', 'red');
      $("#txtAddMName").css('border-color', 'red');
      $("#txtAddMName").focus();
    }else if(addLName.length <2){
      $("#checkTxtAddLName").html("Please enter a Last Name with at least 2 characters.").css('color', 'red');
      $("#txtAddLName").css('border-color', 'red');
      $("#txtAddLName").focus();
    }else if(addSelectMode==2){ //Manual entry of employee number
      if ((addEmpNo.length>5) || (addEmpNo.length<4)){
        $("#checkTxtAddEmpno").html("Invalid Employee number. Please enter a number with a minimum of 4 digits and a maximum of 5 digits.").css('color', 'red');
        $("#txtAddEmpno").css('border-color', 'red');
        $("#txtAddEmpno").focus();
      }else if(addEmpNo > 12636){
        $("#checkTxtAddEmpno").html("Invalid input. Employee number must not exceed the allowed limit.").css('color', 'red');
        $("#txtAddEmpno").css('border-color', 'red');
        $("#txtAddEmpno").focus();
      }else{
        $(".loader-div").show();
        $.ajax({ //check empno
          url:"checkExist.php",
          method:"POST",
          data: {addEmpNo:addEmpNo},
          dataType: 'json',
          success:function(data){
            $(".loader-div").hide(); 
              const uniqueEmpNo = data.empNO;
              if(uniqueEmpNo){
                  $("#checkTxtAddEmpno").html("Oops! It seems this employee number has already been used. Please double-check your information and try again, or contact support for assistance.").css('color', 'red');
                  $("#txtAddEmpno").css('border-color', 'red');
                  $("#txtAddEmpno").focus();
              }else{
                insertNewUserAction();
              }
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          },
          });
      }
    }else{
      generateID();
    }
  }

  function insertNewUserAction(){ //function for insertnew user
    var formData = new FormData(frmAdminAddNewUser);
    $(".loader-div").show();
    $.ajax({
    url:"adminAddNewUser.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide(); 
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){ 
        modalSuccessShow(msg,refreshPage,'');
      } else {
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

  function generateID(){ //function for auto generated entry of employee number
    $(".loader-div").show();
    $.ajax({
      url: "includes/functions.php",
      method: "POST",
      data: { GenerateEmpID: 1 },
      dataType: 'json',
      success: function(data) {
        $(".loader-div").hide();
    
        if (data && data.last_emp_no) {
          let lastNumber = data.last_emp_no;
          const setEmpID = ++lastNumber;
    
          // Ensure the generated employee ID is not empty
          if (setEmpID !== '') {
            $("#txtAddEmpno").val(setEmpID);
            if($("#txtAddEmpno").val() !== ''){
              // Assuming formData contains the necessary details for the new user
              insertNewUserAction();
            }else {
              modalErrorShow("Failed to set the employee ID.");
            }
          } else {
            modalErrorShow("Failed to generate a valid employee ID.");
          }
        } else {
          modalErrorShow("Failed to retrieve the last employee number.");
        }
      },
      error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
    
  }

  function changeMode(){ //behaivior after change of mode
  $('#txtAddEmpno').val('');
  var ModeValue = $('#txtSelectMode').val();
  if(ModeValue ==1){
    $('#txtAddEmpno').attr('readonly',true);
  }else{
    $('#txtAddEmpno').attr('readonly',false);
  }
  }

  function AdminDivisionUpdate(formData){
    const DivisionName = $('#txtUpdateDivName').val();
    const DivisionNameCode = $('#txtUpdateDivNameCode').val();
    const DivisionID = $('#txtUpdateDivID').val();

    $("#txtUpdateDivName").css('border-color', '');
    $("#checktxtUpdateDivName").html("");

    $("#txtUpdateDivNameCode").css('border-color', '');
    $("#checktxUpdatetDivNameCode").html("");

    if(DivisionName.length <2){
      $("#checktxtUpdateDivName").html("Please enter a Division Name with at least 2 characters.").css('color', 'red');
      $("#txtUpdateDivName").css('border-color', 'red');
      $("#txtUpdateDivName").focus();
    }else if(DivisionNameCode.length <2){
      $("#checktxUpdatetDivNameCode").html("Please enter a Division Name Code with at least 2 characters.").css('color', 'red');
      $("#txtUpdateDivNameCode").css('border-color', 'red');
      $("#txtUpdateDivNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:2,adminDivision:DivisionName,DivisionNameCode:DivisionNameCode,DivisionID:DivisionID},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueDivName = data.divName;
            if(uniqueDivName){
                modalAlertShow("Apologies for the inconvenience. It appears that the division details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.");
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminUpdateDivision.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,refreshPage)
                    } else {
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
        },
        });
    }

  }

  function AdminUnitAdd(formData){
    const UnitName = $('#txtUnitName').val();
    const UnitNameCode = $('#txtUnitNameCode').val();

    $("#txtUnitName").css('border-color', '');
    $("#checktxtUnitName").html("");

    $("#txtUnitNameCode").css('border-color', '');
    $("#checktxtUnitNameCode").html("");

    if(UnitName.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name with at least 2 characters.").css('color', 'red');
      $("#txtUnitName").css('border-color', 'red');
      $("#txtUnitName").focus();
    }else if(UnitNameCode.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name Code with at least 2 characters.").css('color', 'red');
      $("#txtUnitNameCode").css('border-color', 'red');
      $("#txtUnitNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:1,adminUnitName:UnitName,adminUnitNameCode:UnitNameCode},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueUnitDetails = data.UnitDetails;
            if(uniqueUnitDetails){
                modalAlertShow('Apologies for the inconvenience. It appears that the unit details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.')
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminAddNewUnit.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,refreshPage)
                    } else {
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
        },
        });
    }

  }
  
  $(document).on('change','#UpdateNewItemCode', function(){ //onchange ning New Item Code
    ValidatePositionDateCreated();
  });

  $(document).on('change','#UpdateReasonVacancy', function(){ //onchange ning ReasonVacancy
    reasonVacancy();
  }); 

  $(document).on('change','#txtSelectMode', function(){
    changeMode();
  });

  $(document).on('click', '#btnApproveRegistration', function() {   //approve registration action
    PassData = $(this).attr('value');
    modalConfirmShow('Would you like to approve this registration now?',ApproveRegistration,PassData);
  });

  $(document).on('click', '#btnDisapproveRegistration', function() {  //disapprove registration action
    PassData = $(this).attr('value');
    modalConfirmShow('Would you like to proceed with disapproving this registration?',DisapproveRegistration,PassData);
  });

  $(document).on('click', '#btnAdminReview', function() { //review button action
    const approveEmpno = $(this).val();
    $(".loader-div").show();
    $.ajax({
        url: "includes/functions.php", // PHP file
        method: "POST", // HTTP method
        data: { sessionEmpno: approveEmpno }, // Data sent to server
        success: function(data) {
          $(".loader-div").hide();
            try {
                // Parse JSON response
                const UpdateInfo = JSON.parse(data);

                // Extract values
                const sname = UpdateInfo["sname"];
                const fname = UpdateInfo["fname"];
                const mname = UpdateInfo["mname"];
                const ename = UpdateInfo["ename"];
                const empno = UpdateInfo["empno"];
                const uploadedID = UpdateInfo["uploaded_id"];

                // Populate fields
                $("#txtValidateEmpno").val(empno);
                $("#btnApproveRegistration").val(empno);
                $("#btnDisapproveRegistration").val(empno);
                $("#txtValidateFullName").val(fname + ' ' + mname + ' ' + sname + ' ' + ename);
                $("#validateUploadedID").attr('src', 'uploadedID/' + uploadedID);

                // Show the modal
                $('#formApprove').modal('show');
            } catch (e) {
                console.error("Error parsing JSON response:", e);
                console.log("Server Response:", data);
            }
        },
        error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
    });
  });

  $(document).on('click', '#btnAdminLock', function() {   //lock account action
    PassData = $(this).attr('value');
    modalConfirmShow('Would you like to proceed with locking this account?',adminLockAcount,PassData);
  });

  $(document).on('click', '#btnAdminUnlock', function() {   //unlock account action
    PassData = $(this).attr('value');
    modalConfirmShow('Would you like to proceed with unlocking this account?',adminUnlockAccount,PassData);
  });

  $(document).on('click', '#btnResetPassword', function() {   //reset password to default action
    PassData = $(this).attr('value');
    modalConfirmShow('Would you like to proceed with resetting this password?',resetPassword,PassData);
  });

  $(document).on('click', '#btnInactive', function() {   //reset password to default action
    PassData = $(this).attr('value');
    modalConfirmShow('Do you want to proceed with deactivating this account?',adminTagInactive,PassData);
  });
  
  $(document).on('click', '#btnAdminReengage', function() {   //reset password to default action
    PassData = $(this).attr('value');
    modalConfirmShow('Do you want to proceed with reengaging this account?',adminTagReEngage,PassData);
  });
  $(document).on('click', '#btnAdminDelete', function() {    //delete user acount action
    const valueID = $(this).attr('data-valueID');
    const valueURL = $(this).attr('data-valueURL');
    const TableID = 'userManage';
    var PassData = {
      valueID:valueID,
      valueURL:valueURL,
      TableID:TableID
    };
    modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
  });
  
  $(document).on('click', '#btnAdminUpdate', function() {   //open admin Update modal with populated information
    var updateEmpno = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{sessionEmpno:updateEmpno},
      success:function(data){
        $(".loader-div").hide(); 
        UpdateInfo = JSON.parse(data);
        hideDivItemCode();
        populateAdminUpdateModal(UpdateInfo);
        $('#formAdminUserUpdate').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });

    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{list_mode_seperation:0},
      success:function(data){
          $(".loader-div").hide(); 
          $('#UpdateReasonVacancy').html(data);
      },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
    });

    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{list_unfilled_item_code:0},
      success:function(data){
          $(".loader-div").hide(); 
          $('#UpdateNewItemCode').html(data);
      },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
    });

  });

  $(document).on('submit', '#contentAdminUpdatePersonalInfo', function(event) {    //admin update personal info
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(contentAdminUpdatePersonalInfo);
    modalConfirmShow('Would you like to confirm and save the changes now?',AdminUpdatePersonalInfo,PassData);
  });

  $(document).on('submit', '#contentAdminUpdateItemCode', function(event) {    //admin update item Code
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(contentAdminUpdateItemCode);
    modalConfirmShow('Would you like to confirm and save the changes now?',AdminUpdateItemCode,PassData); 
  });

  $(document).on('submit', '#frmAdminAddNewUser', function(event){
    event.preventDefault(); // Prevent the default form submission
    var PassData = '';
    modalConfirmShow('Would you like to confirm and save the new user details now?',insertNewUser,PassData); 
  });

  $(document).on("submit",'#frmAdminDivisionAdd', function(event){ //trigger add division
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(frmAdminDivisionAdd);
    modalConfirmShow('Would you like to confirm and save the new user details now?',AdminDivisionAdd,PassData);
  });

  $(document).on('click', '#btnAdminDivisionUpdate', function() {   //open admin Update modal with populated information
    var btnAdminDivisionUpdate = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{btnAdminDivisionUpdate:btnAdminDivisionUpdate},
      success:function(data){
        $(".loader-div").hide(); 
        AdminDivisionUpdateInfo = JSON.parse(data);
        $("#txtUpdateDivName").val(AdminDivisionUpdateInfo['division_name']);
        $("#txtUpdateDivNameCode").val(AdminDivisionUpdateInfo['division_name_code']);
        $("#txtUpdateDivID").val(AdminDivisionUpdateInfo['division_code']);
        $("#UpdateDivision").modal('show');
        const clusterID = AdminDivisionUpdateInfo['cluster_code'];
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{clusterID:clusterID},
          success:function(data){
            $(".loader-div").hide(); 
            $('#txtUpdateCluster').html(data);
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
      });
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    })
  });
 
  $(document).on('submit', '#formAdminDivisionUpdate', function(event) {    //admin update personal info
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(formAdminDivisionUpdate);
    modalConfirmShow('Would you like to confirm and save the changes now?',AdminDivisionUpdate,PassData);
  });

  $(document).on('click', '#btnAdminDivisionDelete', function() {    //delete user acount action
    const valueID = $(this).attr('data-valueID');
    const valueURL = $(this).attr('data-valueURL');
    const TableID = 'tblDivision';
    var PassData = {
      valueID:valueID,
      valueURL:valueURL,
      TableID:TableID
    };
    $(".loader-div").show();
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {inUsedDivision:valueID},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
          const inUsedDivision = data.inUsedDivision;
          if(inUsedDivision){
            modalAlertShow('Oops! Unable to remove division information as it is currently in use.');
          } else {
            modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
          }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      },
      });
  });

  $(document).on("submit",'#frmAdminUnitAdd', function(event){ //trigger add division
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(frmAdminUnitAdd);
    modalConfirmShow('Would you like to confirm and save the new user details now?',AdminUnitAdd,PassData);
  });

  $(document).on('click', '#btnAdminUnitDelete', function() {    //delete user acount action
    const valueID = $(this).attr('data-valueID');
    const valueURL = $(this).attr('data-valueURL');
    const TableID = 'tblUnit';
    var PassData = {
      valueID:valueID,
      valueURL:valueURL,
      TableID:TableID
    };
    $(".loader-div").show();
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {inUsedUnit:valueID},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
          const inUsedUnit = data.inUsedUnit;
          if(inUsedUnit){
            modalAlertShow('Oops! Unable to remove division information as it is currently in use.');
          } else {
            modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
          }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      },
      });
  });

  $(document).on('click', '#btnAdminUnitUpdate', function() {   //open admin Update modal with populated information
    var btnAdminUnitUpdate = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{btnAdminUnitUpdate:btnAdminUnitUpdate},
      success:function(data){
        $(".loader-div").hide(); 
        AdminUnitUpdateInfo = JSON.parse(data);
        $("#txtUpdateUnitID").val(AdminUnitUpdateInfo['unit_code']);
        $("#txtUpdateUnitName").val(AdminUnitUpdateInfo['unit_name']);
        $("#txtUpdateUnitNameCode").val(AdminUnitUpdateInfo['unit_name_code']);

        const unitDivCode = AdminUnitUpdateInfo['division_code'];
        const unitStationCode = AdminUnitUpdateInfo['station_code'];
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{list_division_id:unitDivCode},
          success:function(data){
              $('#txtUpdateUnitDiv').html(data);
          } 
        });
        $("#UpdateUnit").modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    })
  });
  
  $(document).on('submit', '#formAdminUnitUpdate', function(event) {    //admin update personal info
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(formAdminUnitUpdate);
    modalConfirmShow('Would you like to confirm and save the changes now?',AdminUnitUpdate,PassData);
  });

  function AdminUnitUpdate(formData){
    const UnitName = $('#txtUpdateUnitName').val();
    const UnitNameCode = $('#txtUpdateUnitNameCode').val();
    const UnitID = $('#txtUpdateUnitID').val();

    $("#txtUpdateUnitName").css('border-color', '');
    $("#checktxtUpdateUnitName").html("");

    $("#txtUpdateUnitNameCode").css('border-color', '');
    $("#checktxtUpdateUnitNameCode").html("");

    if(UnitName.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name with at least 2 characters.").css('color', 'red');
      $("#txtUnitName").css('border-color', 'red');
      $("#txtUnitName").focus();
    }else if(UnitNameCode.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name Code with at least 2 characters.").css('color', 'red');
      $("#txtUnitNameCode").css('border-color', 'red');
      $("#txtUnitNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:2,adminUnitName:UnitName,adminUnitNameCode:UnitNameCode,UnitID:UnitID},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueUnitDetails = data.UnitDetails;
            if(uniqueUnitDetails){
                modalAlertShow('Apologies for the inconvenience. It appears that the unit details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.')
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminUpdateUnit.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,refreshPage);
                    } else {
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
        },
        });
    }
  }
 


  

