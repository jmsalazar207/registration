
$(function(){
  //Initialized
      $('.select2').select2();
  //END Initialized
  
    });
$(document).on('click', '#btnAdminDivisionUpdate', function() {   //open admin Update modal with populated information
    var btnAdminDivisionUpdate = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{btnAdminDivisionUpdate:btnAdminDivisionUpdate},
      success:function(data){
        $(".loader-div").hide(); 
        AdminDivisionUpdateInfo = JSON.parse(data);
        $("#txtUpdateDivName").val(AdminDivisionUpdateInfo['division_name']);
        $("#txtUpdateDivNameCode").val(AdminDivisionUpdateInfo['division_name_code']);
        $("#txtUpdateDivID").val(AdminDivisionUpdateInfo['division_code']);
        $("#UpdateDivision").modal('show');
        const clusterID = AdminDivisionUpdateInfo['cluster_code'];
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{clusterID:clusterID},
          success:function(data){
            $(".loader-div").hide(); 
            $('#txtUpdateCluster').html(data);
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
      });
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    })
  });

  $(document).on('click', '#btnAdminDivisionDelete', function() {    //delete user acount action
    const valueID = $(this).attr('data-valueID');
    const valueURL = $(this).attr('data-valueURL');
    const TableID = 'tblDivision';
    var PassData = {
      valueID:valueID,
      valueURL:valueURL,
      TableID:TableID
    };
    $(".loader-div").show();
    $.ajax({ //check empno
      url:"checkExist.php",
      method:"POST",
      data: {inUsedDivision:valueID},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
          const inUsedDivision = data.inUsedDivision;
          if(inUsedDivision){
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
 
  $(document).on('submit', '#formAdminDivisionUpdate', function(event) {    //admin update personal info
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(formAdminDivisionUpdate);
    modalConfirmShow('Would you like to confirm and save the changes now?',AdminDivisionUpdate,PassData);
  });

  $(document).on("submit",'#frmAdminDivisionAdd', function(event){ //trigger add division
    event.preventDefault(); // Prevent the default form submission
    var PassData = new FormData(frmAdminDivisionAdd);
    modalConfirmShow('Would you like to confirm and save the new user details now?',AdminDivisionAdd,PassData);
  });

  function AdminDivisionUpdate(formData){
    const DivisionName = $('#txtUpdateDivName').val();
    const DivisionNameCode = $('#txtUpdateDivNameCode').val();
    const DivisionID = $('#txtUpdateDivID').val();

    $("#txtUpdateDivName").css('border-color', '');
    $("#checktxtUpdateDivName").html("");

    $("#txtUpdateDivNameCode").css('border-color', '');
    $("#checktxUpdatetDivNameCode").html("");

    if(DivisionName.length <2){
      $("#checktxtUpdateDivName").html("Please enter a Division Name with at least 2 characters.").css('color', 'red');
      $("#txtUpdateDivName").css('border-color', 'red');
      $("#txtUpdateDivName").focus();
    }else if(DivisionNameCode.length <2){
      $("#checktxUpdatetDivNameCode").html("Please enter a Division Name Code with at least 2 characters.").css('color', 'red');
      $("#txtUpdateDivNameCode").css('border-color', 'red');
      $("#txtUpdateDivNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:2,adminDivision:DivisionName,DivisionNameCode:DivisionNameCode,DivisionID:DivisionID},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueDivName = data.divName;
            if(uniqueDivName){
                modalAlertShow("Apologies for the inconvenience. It appears that the division details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.");
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminUpdateDivision.php",
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

  function AdminDivisionAdd(formData){
    const DivisionName = $('#txtDivName').val();
    const DivisionNameCode = $('#txtDivNameCode').val();
    const Cluster = $('#txtCluster').val();

    $("#txtDivName").css('border-color', '');
    $("#checktxtDivName").html("");

    $("#txtDivNameCode").css('border-color', '');
    $("#checktxtDivNameCode").html("");

    if(DivisionName.length <2){
      $("#checktxtDivName").html("Please enter a Division Name with at least 2 characters.").css('color', 'red');
      $("#txtDivName").css('border-color', 'red');
      $("#txtDivName").focus();
    }else if(DivisionNameCode.length <2){
      $("#checktxtDivNameCode").html("Please enter a Division Name Code with at least 2 characters.").css('color', 'red');
      $("#txtDivNameCode").css('border-color', 'red');
      $("#txtDivNameCode").focus();
    }else{
      $(".loader-div").show();
      $.ajax({ //check empno
        url:"checkExist.php",
        method:"POST",
        data: {type:1,adminDivision:DivisionName,DivisionNameCode:DivisionNameCode},
        dataType: 'json',
        success:function(data){
          $(".loader-div").hide(); 
            const uniqueDivName = data.divName;
            if(uniqueDivName){
              modalAlertShow("Apologies for the inconvenience. It appears that the division details you provided already exists. Please verify the information and try again, or reach out to support for further assistance.");
            } else {
              $(".loader-div").show();
                $.ajax({
                  url:"adminAddNewDivision.php",
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