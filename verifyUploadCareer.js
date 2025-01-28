$(document).on("click",'#btnApproveCareerUpload',function(){ //Approve upload
  var PassData = new FormData(frmBankDetailsVerify);
  modalConfirmShow('Are you sure you want to approve this upload?',ApproveCareerDetails,PassData);
});

$(document).on('click','#btnVerifyCareerUpload',function(){
  $(".loader-div").show();
  var getReqestCareerVerification = $(this).attr('value');
  $.ajax({
    url:"includes/functions.php",
    method:"POST",
    data:{getReqestCareerVerification:getReqestCareerVerification},
    success:function(data){
      $(".loader-div").hide(); 
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
    },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
  });
});

$(document).on("submit",'#frmCareerdVerify',function(event){ //Disapprove upload
  event.preventDefault();
  var PassData = new FormData(frmCareerdVerify);
  modalConfirmShow('Are you sure you want to disapprove this upload?',DisapproveCareerDetails,PassData);
});

function ApproveCareerDetails(){
  $(".loader-div").show();
  var TableID ='VerifyCareer';
  var CareerUploadID = $('#VerifycareerID').val();
  $.ajax({
    url:"adminApproveCareerUpload.php",
    method:"POST",
    data:{btnApproveCareerUpload:CareerUploadID},
    dataType: 'json',
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        $('#VerifyCareerUpload').modal('hide');
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

function DisapproveCareerDetails(formData){
  $(".loader-div").show();
  var TableID ='VerifyCareer';
  $.ajax({
    url:"adminDisapproveCareerUpload.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide(); 
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        $('#VerifyCareerUpload').modal('hide');
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