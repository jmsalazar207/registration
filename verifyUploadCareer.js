function btnVerifyCareerUpload(getReqestCareerVerification){
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getReqestCareerVerification:getReqestCareerVerification},
        success:function(data){
          const CareerUploadData = JSON.parse(data);
          $('#VerifycareerID').val(CareerUploadData['id']);
          $('#VerifycareerDateFrom').val(CareerUploadData['career_date_from']);
          $('#VerifycareerDateTo').val(CareerUploadData['career_date_to']);
          $('#VerifycareerGovtService').val(CareerUploadData['career_govt_service']).trigger('change');
          $('#VerifycareerGovtService').attr('disabled','disabled')
          $('#VerifycareerPosition').val(CareerUploadData['career_position_title']);      
          $('#VerifycareerOrganization').val(CareerUploadData['career_organization']);
          $('#VerifycareerSalary').val(CareerUploadData['career_salary']);
          $('#VerifycareerCompensention').val(CareerUploadData['career_compensention_level']);
          $('#VerifycareerStatusAppointment').val(CareerUploadData['career_status_appointment']);
          const uploadedMOV = CareerUploadData['career_uploaded_mov']; //retrieve file name
          var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
          const iframeCareerPDF = document.getElementById('VerifyUploadedCareerMOV'); //iframe id
          iframeCareerPDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#VerifyCareerUpload').modal('show');
        }
  });
  };
  $("#frmCareerdVerify").on("submit",function(event){ //Disapprove upload
    event.preventDefault();
    var formData = new FormData(frmCareerdVerify);
    $.ajax({
      url:"adminDisapproveCareerUpload.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#VerifyCareerUpload').modal('hide');
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
  });
  $("#btnApproveCareerUpload").on("click",function(){ //Approve upload
    var CareerUploadID = $('#VerifycareerID').val();
    $.ajax({
      url:"adminApproveCareerUpload.php",
      method:"POST",
      data:{btnApproveCareerUpload:CareerUploadID},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
        $('#VerifyCareerUpload').hide();
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      }
    });
  });