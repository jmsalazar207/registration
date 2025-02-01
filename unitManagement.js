  $(document).on('submit', '#formAdminUnitUpdate', function(event) {    //admin update personal info
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(formAdminUnitUpdate);
    modalConfirmShow('Would you like to confirm and save the changes now?',AdminUnitUpdate,PassData);
  });

  $(document).on("submit",'#frmAdminUnitAdd', function(event){ //trigger add division
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(frmAdminUnitAdd);
    modalConfirmShow('Would you like to confirm and save the new user details now?',AdminUnitAdd,PassData);
  });

  $(document).on('click', '#btnAdminUnitDelete', function() {    //delete user acount action
    const valueID = $(this).attr('data-valueID');
    const valueURL = $(this).attr('data-valueURL');
    const TableID = 'tblUnit';
    var PassData = {
      valueID:valueID,
      valueURL:valueURL,
      TableID:TableID
    };
    $(".loader-div").show();
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {inUsedUnit:valueID},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
          const inUsedUnit = data.inUsedUnit;
          if(inUsedUnit){
            modalAlertShow('Oops! Unable to remove division information as it is currently in use.');
          } else {
            modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
          }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      },
      });
  });

  $(document).on('click', '#btnAdminUnitUpdate', function() {   //open admin Update modal with populated information
    var btnAdminUnitUpdate = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{btnAdminUnitUpdate:btnAdminUnitUpdate},
      success:function(data){
        $(".loader-div").hide(); 
        AdminUnitUpdateInfo = JSON.parse(data);
        $("#txtUpdateUnitID").val(AdminUnitUpdateInfo['unit_code']);
        $("#txtUpdateUnitName").val(AdminUnitUpdateInfo['unit_name']);
        $("#txtUpdateUnitNameCode").val(AdminUnitUpdateInfo['unit_name_code']);

        const unitDivCode = AdminUnitUpdateInfo['division_code'];
        const unitStationCode = AdminUnitUpdateInfo['station_code'];
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{list_division_id:unitDivCode},
          success:function(data){
              $('#txtUpdateUnitDiv').html(data);
          } 
        });
        $("#UpdateUnit").modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    })
  });
  
  function AdminUnitUpdate(formData){
    const UnitName = $('#txtUpdateUnitName').val();
    const UnitNameCode = $('#txtUpdateUnitNameCode').val();
    const UnitID = $('#txtUpdateUnitID').val();

    $("#txtUpdateUnitName").css('border-color', '');
    $("#checktxtUpdateUnitName").html("");

    $("#txtUpdateUnitNameCode").css('border-color', '');
    $("#checktxtUpdateUnitNameCode").html("");

    if(UnitName.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name with at least 2 characters.").css('color', 'red');
      $("#txtUnitName").css('border-color', 'red');
      $("#txtUnitName").focus();
    }else if(UnitNameCode.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name Code with at least 2 characters.").css('color', 'red');
      $("#txtUnitNameCode").css('border-color', 'red');
      $("#txtUnitNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:2,adminUnitName:UnitName,adminUnitNameCode:UnitNameCode,UnitID:UnitID},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueUnitDetails = data.UnitDetails;
            if(uniqueUnitDetails){
                modalAlertShow('Apologies for the inconvenience. It appears that the unit details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.')
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminUpdateUnit.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,refreshPage);
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
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        },
        });
    }
  }

  function AdminUnitAdd(formData){
    const UnitName = $('#txtUnitName').val();
    const UnitNameCode = $('#txtUnitNameCode').val();

    $("#txtUnitName").css('border-color', '');
    $("#checktxtUnitName").html("");

    $("#txtUnitNameCode").css('border-color', '');
    $("#checktxtUnitNameCode").html("");

    if(UnitName.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name with at least 2 characters.").css('color', 'red');
      $("#txtUnitName").css('border-color', 'red');
      $("#txtUnitName").focus();
    }else if(UnitNameCode.length <2){
      $("#checktxtUnitName").html("Please enter a Unit Name Code with at least 2 characters.").css('color', 'red');
      $("#txtUnitNameCode").css('border-color', 'red');
      $("#txtUnitNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:1,adminUnitName:UnitName,adminUnitNameCode:UnitNameCode},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueUnitDetails = data.UnitDetails;
            if(uniqueUnitDetails){
                modalAlertShow('Apologies for the inconvenience. It appears that the unit details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.')
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminAddNewUnit.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,refreshPage)
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
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        },
        });
    }

  }