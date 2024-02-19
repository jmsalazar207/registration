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
  // function UpdateYes(empnoUpdate){
  //   alert(empnoUpdate);
  //   window.location.href="mainRegister.php?empno="+empnoUpdate; 
    // $('#RegisterContent').show();

    // $.ajax({
    //       url:"includes/functions.php",
    //       method:"POST",
    //       data:{empnoUpdate:empnoUpdate},
    //       success:function(data){
    //         UpdateInfo = JSON.parse(data);
    //         $("#AddLastName").val(UpdateInfo["sname"]);
    //         $("#AddFirstName").val(UpdateInfo["fname"]);
    //         $("#AddMiddleName").val(UpdateInfo["mname"]);
    //         $("#AddMobileNumber").val(UpdateInfo["mobile"]);
    //         $("#AddSex").val(UpdateInfo["sex"]).trigger('change');
    //         $("#AddextName").val(UpdateInfo["ename"]).trigger('change');
    //         $("#AddBirthdate").val(UpdateInfo["birthdate"]);
    //         $("#AddEmail").val(UpdateInfo["eaddress"]);
    //         $("#AddStreet").val(UpdateInfo["street"]);
    //         $("#AddHouseNumber").val(UpdateInfo["numAdd"]);
    //         $("#EmployeeNumber").val(UpdateInfo["empno"]);
    //         //md5 in jquery
    //         $("#DesiredPassword").val(password);
    //         var update_region_id = UpdateInfo["region"];
    //         $.ajax({
    //             url:"includes/functions.php",
    //             method:"POST",
    //             data:{update_region_id:update_region_id},
    //             success:function(data){
    //                 $('#AddRegion').html(data);
    //             }
    //         });
    //         var update_province_id = UpdateInfo["province"];
    //         $.ajax({
    //           url:"includes/functions.php",
    //           method:"POST",
    //           data:{update_province_id:update_province_id,Where_region_ID:update_region_id},
    //           success:function(data){
    //               $('#AddProvince').html(data);
    //           }
    //       });
    //         var update_city_id = UpdateInfo["city"];
    //         $.ajax({
    //           url:"includes/functions.php",
    //           method:"POST",
    //           data:{update_city_id:update_city_id,Where_province_ID:update_province_id},
    //           success:function(data){
    //               $('#AddCity').html(data);
    //           }
    //       });
    //         var update_barangay_id = UpdateInfo["barangay"];
    //         $.ajax({
    //           url:"includes/functions.php",
    //           method:"POST",
    //           data:{update_barangay_id:update_barangay_id,Where_city_ID:update_city_id},
    //           success:function(data){
    //               $('#AddBarangay').html(data);
    //           }
    //       });
    //         var update_position_id = UpdateInfo["position"];
    //         $.ajax({
    //           url:"includes/functions.php",
    //           method:"POST",
    //           data:{update_position_id:update_position_id},
    //           success:function(data){
    //               $('#AddPosition').html(data);
    //           }
    //       });
    //         var update_division_id = UpdateInfo["division"];
    //         $.ajax({
    //           url:"includes/functions.php",
    //           method:"POST",
    //           data:{update_division_id:update_division_id},
    //           success:function(data){
    //               $('#AddDivision').html(data);
    //           }
    //       });
    //         var update_unit_id = UpdateInfo["unit"];
    //         $.ajax({
    //           url:"includes/functions.php",
    //           method:"POST",
    //           data:{update_unit_id:update_unit_id,Where_division_ID:update_division_id},
    //           success:function(data){
    //               $('#AddUnit').html(data);
    //           }
    //       });
    //       }
    //     });
    //     $('#btnSubmit').val('Update');
    //     $('#processType').val('Update');
    //     $('#RegisterContent').show();
    //     $('#SearchContent').hide();   
    //     window.location.href="mainRegister.php"; 
    // };
$("#contentLogin").on("submit",function(event){
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
                sessionStorage.setItem("empno",employeeNo);
                $('#AlertProceedUpdate').text("Great! By clicking Ok, You will be redirected to update page");
                $('#SuccessLoginConfirm').modal('show'); 
              }else if(credentialsMatch==0){ //modal error password 
                $('#alertErrorMessage').text("Oops! It seems there's an issue with your login credentials. Please try again.");
                $('#modalError').modal('show'); 

              }else if(credentialsMatch==2){ //modal for registration
                $('#alertMessage').text("To access your account, you'll need to register first. Please click on 'Click here to register' to proceed to the registration page.");
                $('#modalAlert').modal('show');
              }else if(credentialsMatch==4){ //modal not yet approved
                $('#alertMessage').text('Your account is pending approval. Please reach out to ICTMS to expedite the approval process.');
                $('#modalAlert').modal('show');
              }else{ //modal no data found
                $('#alertMessage').text("We couldn't find any data in the database. Please contact ICTMS for further assistance in verifying your information");
                $('#modalAlert').modal('show');
              }

            },
          });
    }
    

  });