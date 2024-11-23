function checkPasswordMatch() { //password confirmed password if matched
  var NewPassword = $("#resetNewPassword").val();
  var ConfirmPassword = $("#resetConfirmPassword").val();
  if (NewPassword != ConfirmPassword){
      $("#CheckResetConfirmPassword").html("Passwords does not match!").css('color', 'red');
      $("#btnReset").attr('disabled', true);
  }else{
      $("#CheckResetConfirmPassword").html("Passwords match.").css('color', 'green');
      $("#btnReset").attr('disabled', false);
  }
  if(NewPassword=='' || NewPassword == '') $("#checkmessage").html("");
}
function redirectTo(url) {
  window.location.href = url;
}
$('#frmForgot').on("submit",function(event){
  event.preventDefault();
  EmpIDValue = $("#empno").val();
  const EmpID = '03-'+EmpIDValue;
  const Email = $("#email").val();
  $("#checkForgotUsername").html("").css('color', 'red');
  $("#checkForgotUsername").css('border-color','');
  $("#checkForgotEmail").html("").css('color', 'red');
  $("#checkForgotEmail").css('border-color','');
  $("#CheckCaptchaForgotmessage").html("");
  const captchaResponse = grecaptcha.getResponse();
  if(!captchaResponse || !isCaptchaValid){
    $("#CheckCaptchaForgotmessage").html("Please Verify you're not a robot").css('color', 'red');
    $("#CheckCaptchaForgotmessage").focus();
  }else if((EmpIDValue.length>5) || (EmpIDValue.length<4)){
    $("#checkForgotUsername").html("Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.").css('color', 'red');
    $("#checkForgotUsername").css('border-color','red');
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
        if (countEmpID <1){
          $("#checkForgotUsername").html("Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.").css('color', 'red');
          $("#checkForgotUsername").css('border-color','red');
        }else if(countEmailAdd <1){
          $("#checkForgotEmail").html("Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.").css('color', 'red');
          $("#checkForgotEmail").css('border-color','red');
        }else{
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
                  $('#modalNotif-header').text('Great! Success.');
                  $('#modalNotif-message').text(msg);
                  $('#modalNotifOk').hide();
                  $('#modalNotif').modal('show');
                  const redirectUrl = 'reset.php';
                  $(document).on('hidden.bs.modal', '#modalNotif', function () {
                    // Check if you need to redirect after the modal closes
                    if (redirectUrl) {
                        redirectTo(redirectUrl);
                    }
                });
              }else{
                $('#modalNotif-header').text('Opps! Error.');
                $('#modalNotif-message').text(msg);
                  $('#modalNotif').modal('show');
              }
            },error: function(xhr, status, error) {
              alert('The system encountered an error while processing your request:', error);
            }
          });
        }
      }
    });
  }
})
$('#frmReset').on("submit",function(event){
  $("#checkResetUsername").html("").css('color', 'red');
  $("#resetUsername").css('border-color','');
  $("#CheckResetConfirmPassword").html("").css('color', 'red');
  $("#resetConfirmPassword").css('border-color','');
  event.preventDefault();
    ResetEmpIDValue = $("#resetUsername").val();
    const ResetEmpID = '03-'+ResetEmpIDValue;
    const ResetConfirmPassword = $('#resetConfirmPassword').val();
    const ResetNewPassword = $('#resetNewPassword').val();
    const ResetTempPassword = $('#resetPassword').val();
    const captchaResponse = grecaptcha.getResponse();
    if((ResetEmpIDValue.length>5) || (ResetEmpIDValue.length<4)){
    $("#checkResetUsername").html("Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.").css('color', 'red');
    $("#checkResetUsername").css('border-color','red');
    }else if(!captchaResponse || !isCaptchaValid){
    $('#CheckCaptchaResetmessage').html("Please Verify you're not a robot").css('color', 'red');
    $("#CheckCaptchaResetmessage").css('border-color','red');
    }else{
    $(".loader-div").show()
    $.ajax({ //check EmpID  if existed and email match
      url:"../checkExist.php",
      method:"POST",
      data: {SearchEmpID:ResetEmpID,checkEmailMatch:1},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); // hide loader
        const countEmpID = data.EmpID;
        if (countEmpID <1){
          $("#checkResetUsername").html("Oops! Invalid input detected. Please verify your entry and try again. For assistance, contact support.").css('color', 'red');
          $("#resetUsername").css('border-color','red');
        }else{
          $(".loader-div").show();
          $.ajax({
            url:"../checkExist.php",
            method:"POST",
            data: {resetUsername:ResetEmpID,resetTempPassword:ResetTempPassword},
            dataType: 'json',
            success:function(data){
              $(".loader-div").hide(); // hide loader
              const Pass = data.EmpID;
              if(Pass){
                if(ResetNewPassword != ResetConfirmPassword){
                  $("#CheckResetConfirmPassword").html("Error: The confirmed password does not match the new password. Please re-enter both fields.").css('color', 'red');
                  $("#resetConfirmPassword").css('border-color','red');
                }else{
                  $(".loader-div").show()
                  var formData = new FormData(frmReset);
                    $.ajax({
                      url:"profileResetPassword.php",
                      method:"POST",
                      dataType: "json",
                      data:formData,
                      success:function(data){
                        $(".loader-div").hide();
                        const msg = data.msg;
                        const stat = data.status;
                        if(stat){
                          $('#modalNotif-header').text('Great! Success.');
                          $('#modalNotif-message').text(msg);
                          $('#modalNotif').modal('show');
                      }else{
                        $('#modalNotif-header').text('Opps! Error.');
                        $('#modalNotif-message').text(msg);
                          $('#modalNotif').modal('show');
                      }
                      },error: function(xhr, status, error) {
                        alert('The system encountered an error while processing your request:', error);
                      },
                      processData: false,
                      contentType: false
                    }); 
                }

              }else{
                $("#checkResetTempPassword").html("Opps! Invalid temporary password!").css('color', 'red');
                $("#resetPassword").css('border-color','red');
              }
            }
          });
        }
      }
    });
    }
})
  