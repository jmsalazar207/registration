
  $(document).on("submit",'#frmTrainingdVerify',function(event){ //Disapprove upload
    event.preventDefault();
    var PassData = new FormData(frmTrainingdVerify);
    modalConfirmShow('Are you sure you want to disapprove this upload?',DisapproveTrainingDetails,PassData);
  });

  $(document).on('click','#btnVerifyTrainingUpload',function(){ //approve
    var getReqestTrainingVerification = $(this).attr('value');
    $(".loader-div").show();
      $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{getReqestTrainingVerification:getReqestTrainingVerification},
          success:function(data){
            $(".loader-div").hide();
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
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
    });
  });

  $(document).on("click",'#btnApproveTrainingUpload',function(){ //Approve upload
    var PassData = new FormData(frmTrainingdVerify);
    modalConfirmShow('Are you sure you want to approve this upload?',ApproveTrainingDetails,PassData);
  });
  
  function ApproveTrainingDetails(){
    $(".loader-div").show(); 
    var TrainingUploadID = $('#VerifyTrainingID').val();
    var TableID ='VerifyTraining';
    $.ajax({
      url:"adminApproveTrainingUpload.php",
      method:"POST",
      data:{btnApproveTrainingUpload:TrainingUploadID},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
        const msg = data.msg;
        const stat = data.status;
            if(stat === "success"){
                $('#VerifyTrainingUpload').modal('hide');
                modalSuccessShow(msg,triggerTableReload,TableID);
            } else {
                modalErrorShow(msg);
            }
        },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
        }
    });
  }

  function DisapproveTrainingDetails(formData){
    var TableID ='VerifyTraining';
    $(".loader-div").show();
    $.ajax({
      url:"adminDisapproveTrainingUpload.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        const msg = data.msg;
        const stat = data.status;
            if(stat === "success"){
                $('#VerifyTrainingUpload').modal('hide');
                modalSuccessShow(msg,triggerTableReload,TableID);
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