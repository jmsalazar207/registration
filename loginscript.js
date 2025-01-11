
  $(document).on('submit','#contentLogin',function(event){
    $('#regRoute').css("display", "none");
    event.preventDefault();
  
    const username = $('#username').val();
    const password = $('#password').val();
    const captchaResponse = grecaptcha.getResponse();
  
    $("#CheckCaptchaLoginmessage").html("");
  
    // Validate captcha
    // if (!captchaResponse || !isCaptchaValid) { 
    //   $("#CheckCaptchaLoginmessage").html("Please verify you're not a robot").css('color', 'red');
    //   $("#CheckCaptchaLoginmessage").focus();
    //   return; // Exit function if captcha is not valid
    // }
  
    // Show loader and send AJAX request
    $(".loader-div").show();
  
    $.ajax({
      url: "checkpassword.php",
      method: "POST",
      data: { username: username, password: password },
      dataType: 'json',
      success: function(data) {
        $(".loader-div").hide(); // Hide loader
        const credentialsMatch = data.credentialsMatch;
        const employeeNo = data.empno;
  
        // Handle various cases based on `credentialsMatch`
        if (credentialsMatch == 2) {
          resetPasswordAttempt(employeeNo);
        }else if (credentialsMatch ==7){
          modalConfirmShow("In compliance with cybersecurity policies and to enhance the security of our systems, you are required to update your password before logging in. Would you like to proceed with changing your password now? Please confirm to continue. We appreciate your cooperation in helping safeguard our digital environment.",mandatoryUpdatePassword,'');
        }else if (credentialsMatch == 3) {
          modalErrorShow("Your registration has been disapproved by the administrator. Please contact the HRPPMS-RSP.");
          resetCaptcha();
        } else if (credentialsMatch == 4) {
          modalErrorShow("Your account has been locked. Please contact the HRPPMS-RSP.");
          resetCaptcha();
          sessionStorage.clear();
        } else if (credentialsMatch == 5) {
          handleWrongPassword(employeeNo);
        } else if (credentialsMatch == 0) {
          $('#regRoute').css("display", "inline-flex");
          modalAlertShow("Oops! Invalid Credentials. Please contact HRPPMS-RSP for assistance.",CloseDynamicModal);
          resetCaptcha();
        } else if (credentialsMatch == 1) {
          modalAlertShow("Your account is pending approval. Please contact the HRPPMS-RSP.",CloseDynamicModal);
          resetCaptcha();
          sessionStorage.clear();
        } else {
          modalAlertShow("Oops! Invalid Credentials. Please contact HRPPMS-RSP.",CloseDynamicModal);
          resetCaptcha();
          sessionStorage.clear();
        }
      },
      error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
        resetCaptcha();
      }
    });
  });
  
  // Handle wrong password attempts
  function handleWrongPassword(employeeNo) {
    $.ajax({
      url: "checkExist.php",
      method: "POST",
      data: { attemptEmpNO: employeeNo },
      dataType: 'json',
      success: function(data) {
        let count = parseInt(data.password_attempt);
        count++;
  
        if (count >= 3) {
          lockAccount(employeeNo);
        } else {
          updateAttemptCount(employeeNo, count);
        }
      },
      error: function() {
        modalErrorShow("The system encountered an error while processing your request.");
        $(".loader-div").hide();
        resetCaptcha();
      }
    });
  }

  // Lock account after 3 failed attempts
  function lockAccount(employeeNo) {
    $.ajax({
      url: "updateAttempt.php",
      method: "POST",
      data: { LockEmpNo: employeeNo },
      dataType: 'json',
      success: function(data) {
        modalErrorShow(data.msg);
        resetCaptcha();
        if (data.status === "success") {
          sessionStorage.clear();
        }
      }
    });
  }

  // Update attempt count
  function updateAttemptCount(employeeNo, count) {
    $.ajax({
      url: "updateAttempt.php",
      method: "POST",
      data: { attemptEmpNO: employeeNo, attemptCount: count },
      dataType: 'json',
      success: function(data) {
        modalErrorShow(data.msg);
        resetCaptcha();
        if (data.status === "success") {
          sessionStorage.clear();
        }
      }
    });
  }

  // Update lock attempt to 0
  function resetPasswordAttempt(employeeNo){
      $(".loader-div").show();
      $.ajax({
        url:"adminUnLockUser.php",
        method:"POST",
        data:{btnAdminUnLockEmpno:employeeNo},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide();
          const stat = data.status;  
          if(stat === "success"){ 
            modalSuccessShow('You have logged in successfully. Please close this modal to continue to the main page.',redirectPage,'');
          } else {
           modalErrorShow('Something went wrong during the process. Please try again.');
          }
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
      });
  }
  
  function redirectPage(){
    window.location.href = "homePage.php";
  }
  function mandatoryUpdatePassword(){
    window.location.href = "updatePassword.php";
  }

  $(document).on('submit', '#frmMandatoryUpdatePassword', function(event){
    event.preventDefault();
    var PassData  = new FormData(frmMandatoryUpdatePassword);
    modalConfirmShow('Would you like to confirm and save the changes now?',MandatoryUpdatePassword,PassData);
  });
  function MandatoryUpdatePassword(formData){
    $("#CheckMandatoryUpdateConfirmPassword").html("").css('color', '');
    $("#MandatoryUpdateConfirmPassword").css('border-color','');
      MandatoryUpdateEmpIDValue = $("#mandatoryUpdateUsername").val();
      const mandatoryUpdateEmpID = '03-'+MandatoryUpdateEmpIDValue;
      const MandatoryUpdateConfirmPassword = $('#MandatoryUpdateConfirmPassword').val();
      const MandatoryUpdateNewPassword = $('#MandatoryUpdateNewPassword').val();
      const MandatoryUpdateOldPassword = $('#mandatoryUpdateOldPassword').val();
      const captchaResponse = grecaptcha.getResponse();
      if((MandatoryUpdateEmpIDValue.length>5) || (MandatoryUpdateEmpIDValue.length<4)){
      modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
      }
      // else if(!captchaResponse || !isCaptchaValid){
      // $('#CheckCaptchaResetmessage').html("Please Verify you're not a robot").css('color', 'red');
      // $("#CheckCaptchaResetmessage").css('border-color','red');
      // }
      else{
      $(".loader-div").show()
      $.ajax({ //check EmpID  if existed and email match
        url:"checkExist.php",
        method:"POST",
        data: {SearchEmpID:mandatoryUpdateEmpID,checkEmailMatch:1},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); // hide loader
          const countEmpID = data.EmpID;
          if (countEmpID > 0){ //inactive account
            modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
          }else{
            $(".loader-div").show();
            $.ajax({
              url:"checkOldPassword.php",
              method:"POST",
              data: {MandatoryUpdateUsername:mandatoryUpdateEmpID,MandatoryUpdateOldPassword:MandatoryUpdateOldPassword},
              dataType: 'json', 
              success:function(data){
                $(".loader-div").hide(); // hide loader
                const Pass = data.credentialsResult;
                if(Pass =='1'){ // correct password
                  if(MandatoryUpdateNewPassword != MandatoryUpdateConfirmPassword){
                    $("#CheckMandatoryUpdateConfirmPassword").html("Error: The confirmed password does not match the new password. Please re-enter both fields.").css('color', 'red');
                    $("#MandatoryUpdateConfirmPassword").css('border-color','red');
                  } else if(MandatoryUpdateNewPassword == MandatoryUpdateOldPassword){
                    modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
                }else{
                    $(".loader-div").show()
                      $.ajax({
                      url:"MandatoryProfileResetPassword.php",
                      method:"POST",
                      dataType: "json",
                      data:formData,
                      success:function(data){
                        $(".loader-div").hide();
                        const msg = data.msg;
                        const stat = data.status;
                        if(stat == '1'){
                          modalSuccessShow(msg,resetMandatoryUpdatePage);
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
  
                }else{
                  modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
                }
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
            });
          }
        }
      });
      }
  }
  function resetMandatoryUpdatePage(){
    $('#frmMandatoryUpdatePassword')[0].reset();
    window.location.href = "index.php"; 
  }

  $(document).on('keyup','#MandatoryUpdateNewPassword',function(){
    StrongPassword('MandatoryUpdateNewPassword');
  });
  
  $(document).on('focus','#MandatoryUpdateNewPassword',function(){
    showMessage('message');
  });
  
  $(document).on('blur','#MandatoryUpdateNewPassword',function(){
    hideMessage('message');
  });