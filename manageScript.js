function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  $(function(){
    $('.select2').select2()
  })
  $("#contentAdd").on("submit",function(event){
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
      $.ajax({ //check email and mobile if existed 
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
                alert('Ala yang kalupa proceed insert');
            }
        },
        });
  })