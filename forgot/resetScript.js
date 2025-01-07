function Forgot(){
  EmpIDValue = $("#empno").val();
    const EmpID = '03-'+EmpIDValue;
    const Email = $("#email").val();
    $("#checkForgotUsername").html("").css('color', 'red');
    $("#checkForgotUsername").css('border-color','');
    $("#checkForgotEmail").html("").css('color', 'red');
    $("#checkForgotEmail").css('border-color','');
    $("#CheckCaptchaForgotmessage").html("");
    const captchaResponse = grecaptcha.getResponse();
    // if(!captchaResponse || !isCaptchaValid){
    //   $("#CheckCaptchaForgotmessage").html("Please Verify you're not a robot").css('color', 'red');
    //   $("#CheckCaptchaForgotmessage").focus();
    // }else 
    if((EmpIDValue.length>5) || (EmpIDValue.length<4)){
      modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
    }else{
      $(".loader-div").show(); // show loader
      $.ajax({ //check EmpID  if existed and email match
        url:"../checkExist.php",
        method:"POST",
        data: {SearchEmpID:EmpID,checkEmailMatch:Email},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); // hide loader
          const countEmpID = data.EmpID;
          const countEmailAdd = data.EmailAdd;
          if (countEmpID >1){
            modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
          }else if(countEmailAdd >1){
            modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
          } else {
            $(".loader-div").show(); // show loader
            $.ajax({
              url:"forgot_password_action.php",
              method:"POST",
              data:{empno:EmpID,email:Email},
              dataType: "json",
              success:function(data){
                $(".loader-div").hide(); // hide loader
                const msg = data.msg;
                const stat = data.status;
                if(stat == '1'){
                  modalSuccessShow(msg,resetForgotPage);
                } else {
                  modalErrorShow(msg);
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

function resetForgotPage(){
  $('#frmForgot')[0].reset();
  window.location.href = "reset.php"; 
}

function resetResetPage(){
  $('#frmReset')[0].reset();
  window.location.href = "../index.php"; 
}


$(document).on('submit', '#frmForgot', function(event){
  event.preventDefault();
  var PassData  = new FormData(frmForgot);
  modalConfirmShow('Would you like to proceed with resetting your password?',Forgot,PassData);
});

$(document).on('submit', '#frmReset', function(event){
  event.preventDefault();
  var PassData  = new FormData(frmReset);
  modalConfirmShow('Would you like to confirm and save the changes now?',Reset,PassData);
});

function Reset(formData){
  $("#checkResetUsername").html("").css('color', 'red');
  $("#resetUsername").css('border-color','');
  $("#CheckResetConfirmPassword").html("").css('color', 'red');
  $("#resetConfirmPassword").css('border-color','');
    ResetEmpIDValue = $("#resetUsername").val();
    const ResetEmpID = '03-'+ResetEmpIDValue;
    const ResetConfirmPassword = $('#resetConfirmPassword').val();
    const ResetNewPassword = $('#resetNewPassword').val();
    const ResetTempPassword = $('#resetPassword').val();
    const captchaResponse = grecaptcha.getResponse();
    if((ResetEmpIDValue.length>5) || (ResetEmpIDValue.length<4)){
    modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
    }
    // else if(!captchaResponse || !isCaptchaValid){
    // $('#CheckCaptchaResetmessage').html("Please Verify you're not a robot").css('color', 'red');
    // $("#CheckCaptchaResetmessage").css('border-color','red');
    // }
    else{
    $(".loader-div").show()
    $.ajax({ //check EmpID  if existed and email match
      url:"../checkExist.php",
      method:"POST",
      data: {SearchEmpID:ResetEmpID,checkEmailMatch:1},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); // hide loader
        const countEmpID = data.EmpID;
        if (countEmpID >1){
          modalErrorShow('Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.');
        }else{
          $(".loader-div").show();
          $.ajax({
            url:"checkTempPassword.php",
            method:"POST",
            data: {resetUsername:ResetEmpID,ResetTempPassword:ResetTempPassword},
            dataType: 'json', 
            success:function(data){
              $(".loader-div").hide(); // hide loader
              const Pass = data.credentialsResult;
              if(Pass =='1'){ // correct password
                if(ResetNewPassword != ResetConfirmPassword){
                  $("#CheckResetConfirmPassword").html("Error: The confirmed password does not match the new password. Please re-enter both fields.").css('color', 'red');
                  $("#resetConfirmPassword").css('border-color','red');
                }else{
                  $(".loader-div").show()
                    $.ajax({
                    url:"profileResetPassword.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
                      $(".loader-div").hide();
                      const msg = data.msg;
                      const stat = data.status;
                      if(stat == '1'){
                        modalSuccessShow(msg,resetResetPage);
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

$(document).on('keyup','#resetNewPassword',function(){
  StrongPassword('resetNewPassword');
});

$(document).on('focus','#resetNewPassword',function(){
  showMessage('message');
});

$(document).on('blur','#resetNewPassword',function(){
  hideMessage('message');
});





  