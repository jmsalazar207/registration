
function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  $(function(){
    $('.select2').select2()
  })
  function adminUpdate(id){
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{sessionEmpno:id},
      success:function(data){
        UpdateInfo = JSON.parse(data);
        $("#txtEmpno").val(UpdateInfo["empno"].replaceAll('03-',''));
        $("#txtOldEmpno").val(UpdateInfo["empno"].replaceAll('03-',''));
        $("#txtLName").val(UpdateInfo["sname"]);
        $("#txtFName").val(UpdateInfo["fname"]);
        $("#txtMName").val(UpdateInfo["mname"]);
        $("#txtExtName").val(UpdateInfo["ename"]).trigger('change');
        $('#formUser').modal('show');
      }
    })
  }
  $('#contentDivision').on("submit", function(event){
    event.preventDefault();
      const DivisionName = $('#txtDivName').val();
      const DivisionNameCode = $('#txtDivNameCode').val();
      const Cluster = $('#txtCluster').val();

      $("#txtDivName").css('border-color', '');
      $("#checktxtDivName").html("");

      $("#txtDivNameCode").css('border-color', '');
      $("#checktxtDivNameCode").html("");
      
      var validatePass = 1;
      if(DivisionName.length <2){
        $("#checktxtDivName").html("Please enter a Division Name with at least 2 characters.").css('color', 'red');
        $("#txtDivName").css('border-color', 'red');
        $("#txtDivName").focus();
        validatePass = 0;
      }if(DivisionNameCode.length <2){
        $("#checktxtDivNameCode").html("Please enter a Division Name Code with at least 2 characters.").css('color', 'red');
        $("#txtDivNameCode").css('border-color', 'red');
        $("#txtDivNameCode").focus();
        validatePass = 0;
      }if(validatePass){
        alert('Fasado');
      }
      // $.ajax({ //check empno
      //   url:"checkExist.php",
      //   method:"POST",
      //   data: {addEmpNo:adminEmpNo},
      //   dataType: 'json',
      //   success:function(data){
      //       const uniqueEmpNo = data.empNO;
      //       if(uniqueEmpNo){
      //           $("#checkTxtEmpno").html("Oops! It seems this employee number has already been used. Please double-check your information and try again, or contact support for assistance.").css('color', 'red');
      //           $("#txtEmpno").css('border-color', 'red');
      //           $("#txtEmpno").focus();
      //           validatePassUpdate = 0;
      //       }else if(validatePassUpdate == 1){
      //               // process update
      //               var formData = new FormData(contentUpdate);
      //               $.ajax({
      //                 url:"adminUpdateNewUser.php",
      //                 method:"POST",
      //                 dataType: "json",
      //                 data:formData,
      //                 success:function(data){
      //                   const msg = data.msg;
      //                   const stat = data.status;
      //                   if(stat === "success"){ 
      //                     $('#modalNotif-header').text('Great! Success.');
      //                     $('#modalNotif-message').text(msg);
      //                     $('#modalNotif').modal('show');
      //                   }
      //                   else{
      //                     $('#alertMessage').text(msg);
      //                     $('#modalAlert').modal('show'); 
      //                   }
      //                 },
      //                 processData: false,
      //                 contentType: false
      //               }); 
      //       }
      //   },
      //   });
  })
  $('#contentUpdate').on("submit",function(event){
      event.preventDefault();
      const adminEmpNo = $('#txtEmpno').val();
      const adminOldEmpno = $('#txtOldEmpno').val();
      const adminFName = $('#txtFName').val();
      const adminMname = $('#txtMName').val();
      const adminLName = $('#txtLName').val();
      
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

    var validatePassUpdate = 1;
    if(adminLName.length <2){
      $("#checkTxtLName").html("Please enter a Last Name with at least 2 characters.").css('color', 'red');
      $("#txtLName").css('border-color', 'red');
      $("#txtLName").focus();
      validatePassUpdate = 0;
    }if(adminMname.length ==''){
      
    }else if(adminMname.length <2){
      $("#checkTxtMName").html("Please enter a Middle Name with at least 2 characters.").css('color', 'red');
      $("#txtMName").css('border-color', 'red');
      $("#txtMName").focus();
      validatePassUpdate = 0;
    }if(adminFName.length <2){
      $("#checkTxtFName").html("Please enter a First Name with at least 2 characters.").css('color', 'red');
      $("#txtFName").css('border-color', 'red');
      $("#txtFName").focus();
      validatePassUpdate = 0;
    }if ((adminEmpNo.length>5) || (adminEmpNo.length<4)){
      $("#checkTxtEmpno").html("Invalid Employee number. Please enter a number with a minimum of 4 digits and a maximum of 5 digits.").css('color', 'red');
      $("#txtEmpno").css('border-color', 'red');
      $("#txtEmpno").focus();
      validatePassUpdate = 0;
    }
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {addEmpNo:adminEmpNo, adminOldEmpno:adminOldEmpno},
      dataType: 'json',
      success:function(data){
          const uniqueEmpNo = data.empNO;
          if(uniqueEmpNo){
              $("#checkTxtEmpno").html("Oops! It seems this employee number has already been used. Please double-check your information and try again, or contact support for assistance.").css('color', 'red');
              $("#txtEmpno").css('border-color', 'red');
              $("#txtEmpno").focus();
              validatePassUpdate = 0;
          }else if(validatePassUpdate == 1){
                  // process update
                  var formData = new FormData(contentUpdate);
                  $.ajax({
                    url:"adminUpdateNewUser.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
                      const msg = data.msg;
                      const stat = data.status;
                      if(stat === "success"){ 
                        $('#modalNotif-header').text('Great! Success.');
                        $('#modalNotif-message').text(msg);
                        $('#modalNotif').modal('show');
                      }
                      else{
                        $('#alertMessage').text(msg);
                        $('#modalAlert').modal('show'); 
                      }
                    },
                    processData: false,
                    contentType: false
                  }); 
          }
      },
      });
      // UPDATWEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
      
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
      $.ajax({ //check empno
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
                    // process register
                    var formData = new FormData(contentAdd);
                    $.ajax({
                      url:"adminAddNewUser.php",
                      method:"POST",
                      dataType: "json",
                      data:formData,
                      success:function(data){
                        const msg = data.msg;
                        const stat = data.status;
                        if(stat == "success"){
                          
                          $('#modalNotif-header').text('Great! Success.');
                          $('#modalNotif-message').text(msg);
                          $('#modalNotif').modal('show');
                        }
                        else{
                          $('#alertMessage').text(msg);
                          $('#modalAlert').modal('show'); 
                        }
                      },
                      processData: false,
                      contentType: false
                    }); 
            }
        },
        });
  })