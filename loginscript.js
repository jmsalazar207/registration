
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
    // sessionStorage.setItem("password",password);
    const loginCaptcha = $('#CheckCaptchaLoginmessage').val();
    $("#CheckCaptchaLoginmessage").html("");
    var loginPass = 1;
    // if(loginCaptcha == 0){
    //   $("#CheckCaptchaLoginmessage").html("Please Verify you're not a robot").css('color', 'red');
    //   $("#CheckCaptchaLoginmessage").focus();
    //   loginPass = 0;
    // }
    if(loginPass==1){
        $.ajax({ //check email and mobile if existed 
            url:"checkpassword.php",
            method:"POST",
            data: {username:username,password:password},
            dataType: 'json',
            success:function(data){
            const credentialsMatch = data.credentialsMatch;
            // const userLevel = data.AccountUserLevel;
            var employeeNo = data.empno;
            // sessionStorage.setItem("updateEmpNO",employeeNo);
            
              if(credentialsMatch==2){
                  window.location.href="homePage.php"
              }else if(credentialsMatch==3){ //modal error password 
                $('#alertErrorMessage').text("Your registration has been disapproved by the administrator. Please contact the Personnel Section to verify your account.");
                $('#modalError').modal('show'); 
              }else if(credentialsMatch==4){ //modal error password 
                $('#alertErrorMessage').text("Your account has been locked. Please reach out to the Personnel Section for assistance with unlocking your account.");
                $('#modalError').modal('show'); 
                sessionStorage.clear();
              }else if(credentialsMatch==5){ //modal error password 
                $.ajax({ 
                  url: "checkExist.php",
                  method: "POST",
                  data: { attemptEmpNO: employeeNo },
                  dataType: 'json',
                  success: function(data) {
                      var count = parseInt(data.password_attempt); 
                      count++;
                      if (count >= 3) {
                          $.ajax({
                            url: "updateAttempt.php", // Endpoint to update the attempt count
                            method: "POST",
                            data: { LockEmpNo: employeeNo },
                            success: function(data) {
                              const msg = data.msg;
                              const stat = data.status;
                              if(stat == "success"){
                              $('#modalNotif-header').text('Opps! Error!');
                              $('#modalNotif-message').text(msg);
                              $('#modalNotif').modal('show');
                              sessionStorage.clear();
                              }else{
                              $('#modalNotif-header').text('Opps! Error!');
                              $('#modalNotif-message').text(msg);
                              $('#modalNotif').modal('show');
                              }
                            }
                        });
                      } else {
                          $.ajax({
                              url: "updateAttempt.php", // Endpoint to update the attempt count
                              method: "POST",
                              data: { attemptEmpNO: employeeNo, attemptCount: count },
                              success: function(data) {
                                const msg = data.msg;
                                const stat = data.status;
                                if(stat == "success"){
                                $('#modalNotif-header').text('Opps! Error!');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                                sessionStorage.clear();
                                }else{
                                $('#modalNotif-header').text('Opps! Error!');
                                $('#modalNotif-message').text(msg);
                                $('#modalNotif').modal('show');
                                }
                              }
                          });
                      }
                  },
                  error: function(xhr, status, error) {
                      console.error("An error occurred: ", error);
                  }
              });
              }else if(credentialsMatch==0){ //modal for registration
                $('#regRoute').css("display","inline-flex");
                $('#alertMessage').text("The entered employee number is not yet registered in the system. Please proceed to register by clicking the 'Register' button or the 'Click here to register' link.");
                $('#modalAlert').modal('show');
              }else if(credentialsMatch==1){ //modal not yet approved
                // $('#alertMessage').text('Your account is pending approval. Please reach out to ICTMS or Personnel Section to expedite the approval process.');
                 $('#alertMessage').text('Your account is currently pending approval. Kindly reach out to the personnel department for further assistance in completing the approval process.');
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