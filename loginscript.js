
function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  
  let isCaptchaValid = false;

  function onCaptchaSuccess() {
    isCaptchaValid = true;
  }
  
  function onCaptchaExpired() {
    isCaptchaValid = false;
  }
  
  $("#contentLogin").on("submit", function(event) {
    $('#regRoute').css("display", "none");
    event.preventDefault();
  
    const username = $('#username').val();
    const password = $('#password').val();
    const captchaResponse = grecaptcha.getResponse();
  
    $("#CheckCaptchaLoginmessage").html("");
  
    // Validate captcha
    if (!captchaResponse || !isCaptchaValid) { 
      $("#CheckCaptchaLoginmessage").html("Please verify you're not a robot").css('color', 'red');
      $("#CheckCaptchaLoginmessage").focus();
      return; // Exit function if captcha is not valid
    }
  
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
          window.location.href = "homePage.php";
        } else if (credentialsMatch == 3) {
          modalErrorShow("Your registration has been disapproved by the administrator. Please contact the Personnel Section.");
          resetCaptcha();
        } else if (credentialsMatch == 4) {
          modalErrorShow("Your account has been locked. Please contact the Personnel Section.");
          resetCaptcha();
          sessionStorage.clear();
        } else if (credentialsMatch == 5) {
          handleWrongPassword(employeeNo);
        } else if (credentialsMatch == 0) {
          $('#regRoute').css("display", "inline-flex");
          modalAlertShow("Oops! Invalid Credentials. Please contact Personnel Section for assistance.");
          resetCaptcha();
        } else if (credentialsMatch == 1) {
          modalAlertShow("Your account is pending approval. Please contact the Personnel Section.");
          resetCaptcha();
          sessionStorage.clear();
        } else {
          modalAlertShow("Oops! Invalid Credentials. Please contact Personnel Section.");
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
  
  // Helper function to reset captcha
  function resetCaptcha() {
    grecaptcha.reset();
    isCaptchaValid = false;
  }
  
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
  