
function StrongPassword(){
  var myInput = document.getElementById("resetNewPassword");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var special_char = document.getElementById("special_char");
  var length = document.getElementById("length");
  
  // When the user starts to type something inside the password field
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
    }
    
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
    } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    }
    
    // Validate special
    var special_chars = /[!@#$%^.+=~-]/g;
    if(myInput.value.match(special_chars)) {  
    special_char.classList.remove("invalid");
    special_char.classList.add("valid");
    } else {
    special_char.classList.remove("valid");
    special_char.classList.add("invalid");
    }
    
    // Validate length
    if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    }
  }
  function showMessage(){
    // When the user clicks on the password field, show the message box
    document.getElementById("message").style.display = "block";
  }
  function hideMessage(){
    // When the user clicks outside of the password field, hide the message box
    document.getElementById("message").style.display = "none";
  }
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
  function NumberOnly(evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  function recaptchaCallbackReset() {
      $('#CheckCaptchaResetmessage').val(1); //check captcha is checked login
    };
    function recaptchaExpiredReset() {
    $('#CheckCaptchaResetmessage').val(0); //check captcha is expired login
    };
    function recaptchaCallbackForgot() {
      $('#CheckCaptchaForgotmessage').val(1); //check captcha is checked login
    };
    function recaptchaExpiredForgot() {
    $('#CheckCaptchaForgotmessage').val(0); //check captcha is expired login
    };
    $('#frmForgot').on("submit",function(event){
      event.preventDefault();
      EmpIDValue = $("#forgotUsername").val();
      const EmpID = '03-'+EmpIDValue;
      const Email = $("#resetPassword").val();
      $("#checkForgotUsername").html("").css('color', 'red');
      $("#checkForgotUsername").css('border-color','');
      $("#checkForgotEmail").html("").css('color', 'red');
      $("#checkForgotEmail").css('border-color','');
      $("#CheckCaptchaForgotmessage").html("");
      const loginCaptcha = $('#CheckCaptchaForgotmessage').val();
      if(loginCaptcha !=1){
        $("#CheckCaptchaForgotmessage").html("Please Verify you're not a robot").css('color', 'red');
        $("#CheckCaptchaForgotmessage").focus();
      }else if((EmpIDValue.length>5) || (EmpIDValue.length<4)){
        $("#checkForgotUsername").html("Oops! It seems like the employee number you entered is invalid. Please verify and re-enter.").css('color', 'red');
        $("#checkForgotUsername").css('border-color','red');
      }else{
        $(".loader-div").show(); // show loader
        $.ajax({ //check EmpID  if existed and email match
          url:"checkExist.php",
          method:"POST",
          data: {SearchEmpID:EmpID,checkEmailMatch:Email},
          dataType: 'json',
          success:function(data){
            $(".loader-div").hide(); // hide loader
            const countEmpID = data.EmpID;
            const countEmailAdd = data.EmailAdd;
            if (countEmpID <1){
              $("#checkForgotUsername").html("Employee Not Found! The entered employee number does not match any records in our database. Please check and re-enter.").css('color', 'red');
              $("#checkForgotUsername").css('border-color','red');
            }else if(countEmailAdd <1){
              $("#checkForgotEmail").html("Uh-oh! It looks like the email you provided isn’t the same as the registered one. Please verify and re-enter.").css('color', 'red');
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
                      $('#modalNotif').modal('show');
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
      
    });
    $('#frmReset').on("submit",function(event){
      $("#checkResetUsername").html("").css('color', 'red');
      $("#resetUsername").css('border-color','');
      $("#CheckResetConfirmPassword").html("").css('color', 'red');
      $("#resetConfirmPassword").css('border-color','');
      event.preventDefault();
       ResetEmpIDValue = $("#resetUsername").val();
       const ResetEmpID = '03-'+ResetEmpIDValue;
       const ResetCaptcha = $('#CheckCaptchaResetmessage').val();
       const ResetConfirmPassword = $('#resetConfirmPassword').val();
       const ResetNewPassword = $('#resetNewPassword').val();
       const ResetTempPassword = $('#resetPassword').val();
       if((ResetEmpIDValue.length>5) || (ResetEmpIDValue.length<4)){
        $("#checkResetUsername").html("Oops! It seems like the employee number you entered is invalid. Please verify and re-enter.").css('color', 'red');
        $("#checkResetUsername").css('border-color','red');
       }else if(ResetCaptcha !=1){
        $('#CheckCaptchaResetmessage').html("Please Verify you're not a robot").css('color', 'red');
        $("#CheckCaptchaResetmessage").css('border-color','red');
       }else{
        $(".loader-div").show()
        $.ajax({ //check EmpID  if existed and email match
          url:"checkExist.php",
          method:"POST",
          data: {SearchEmpID:ResetEmpID,checkEmailMatch:1},
          dataType: 'json',
          success:function(data){
            $(".loader-div").hide(); // hide loader
            const countEmpID = data.EmpID;
            if (countEmpID <1){
              $("#checkResetUsername").html("Employee Not Found! The entered employee number does not match any records in our database. Please check and re-enter.").css('color', 'red');
              $("#resetUsername").css('border-color','red');
            }else{
              $(".loader-div").show()
              $.ajax({
                url:"checkExist.php",
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
    });
  