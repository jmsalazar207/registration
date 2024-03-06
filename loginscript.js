
function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
function recaptchaCallbackLogin() {
    $('#CheckCaptchaLoginmessage').val(1); //check captcha is checked login
  };
  function recaptchaExpiredLogin() {
  $('#CheckCaptchaLoginmessage').val(0); //check captcha is expired login
  };
$("#contentLogin").on("submit",function(event){
  $('#regRoute').css("display","none");
    event.preventDefault();
    const username = $('#username').val();
    const password = $('#password').val();
    sessionStorage.setItem("password",password);
    const loginCaptcha = $('#CheckCaptchaLoginmessage').val();
    $("#CheckCaptchaLoginmessage").html("");
    var loginPass = 1;
    if(loginCaptcha == 0){
      $("#CheckCaptchaLoginmessage").html("Please Verify you're not a robot").css('color', 'red');
      $("#CheckCaptchaLoginmessage").focus();
      loginPass = 0;
    }
    if(loginPass==1){
        $.ajax({ //check email and mobile if existed 
            url:"checkpassword.php",
            method:"POST",
            data: {username:username,password:password},
            dataType: 'json',
            success:function(data){
                // 1 registered ok password match
                // 0 registered wrong password
                // 2 not yet registered hihi
                // 3 no data in the database call personnel
                 // 4 registered ok password match but not approved
            const credentialsMatch = data.credentialsMatch;
            var employeeNo = data.empno;
            sessionStorage.setItem("updateEmpNO",employeeNo);
            
              if(credentialsMatch==1){
                sessionStorage.setItem("loginEmpno",employeeNo);
                window.location.href="homePage.php"
              }else if(credentialsMatch==0){ //modal error password 
                $('#alertErrorMessage').text("Oops! It seems there's an issue with your login credentials. Please try again.");
                $('#modalError').modal('show'); 
                sessionStorage.clear();
              }else if(credentialsMatch==2){ //modal for registration
                $('#regRoute').css("display","inline-flex");
                $('#alertMessage').text("The entered employee number is not yet registered in the system. Please proceed to register by clicking the 'Register' button or the 'Click here to register' link.");
                $('#modalAlert').modal('show');
              }else if(credentialsMatch==4){ //modal not yet approved
                $('#alertMessage').text('Your account is pending approval. Please reach out to ICTMS or Personnel Section to expedite the approval process.');
                $('#modalAlert').modal('show');
                sessionStorage.clear();
              }else{ //modal no data found
                $('#alertMessage').text("We couldn't find any data in the database. Please contact ICTMS or Personnel Section for further assistance in verifying your information");              
                $('#modalAlert').modal('show');
                sessionStorage.clear();
              }
            },
          });
    }
    

  });