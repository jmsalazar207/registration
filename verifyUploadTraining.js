function btnVerifyTrainingUpload(getReqestTrainingVerification){
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getReqestTrainingVerification:getReqestTrainingVerification},
        success:function(data){
          const TrainingUploadData = JSON.parse(data);
          $('#VerifyTrainingID').val(TrainingUploadData['id']);
          $('#VerifytrainingTitle').val(TrainingUploadData['training_title']);
          $('#VerifytrainingDateFrom').val(TrainingUploadData['training_date_from']);
          $('#VerifytrainingDateTo').val(TrainingUploadData['training_date_to']);
          $('#VerifytrainingHours').val(TrainingUploadData['training_hours']);
          $('#VerifytrainingType').val(TrainingUploadData['training_type']).trigger("change");
          $('#VerifytrainingConductedBy').val(TrainingUploadData['training_conducted_by']);
          const uploadedTrainingMOV = TrainingUploadData['training_uploaded_mov']; //retrieve file name
          var pdfURL = 'uploadedMOV/'+uploadedTrainingMOV; //pdf directory 
          const iframeTrainingPDF = document.getElementById('VerifyUploadedTrainingMOV'); //iframe id
          iframeTrainingPDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#VerifyTrainingUpload').modal('show');
        }
  });
  };
  $("#frmTrainingdVerify").on("submit",function(event){ //Disapprove upload
    event.preventDefault();
    var formData = new FormData(frmTrainingdVerify);
    $.ajax({
      url:"adminDisapproveTrainingUpload.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#VerifyTrainingUpload').modal('hide');
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
  $("#btnApproveTrainingUpload").on("click",function(){ //Approve upload
    var TrainingUploadID = $('#VerifyTrainingID').val();
    $.ajax({
      url:"adminApproveTrainingUpload.php",
      method:"POST",
      data:{btnApproveTrainingUpload:TrainingUploadID},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
        $('#VerifyTrainingUpload').hide();
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