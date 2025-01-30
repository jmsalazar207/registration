$(document).on("click",'#btnApproveEligibilityUpload',function(){ //Approve upload
  var PassData = new FormData(frmEligibilitydVerify);
  modalConfirmShow('Are you sure you want to approve this upload?',ApprovedEligibilityUpload,PassData);
});

$(document).on('submit','#frmEligibilitydVerify',function(event){
  event.preventDefault();
  var PassData = new FormData(frmEligibilitydVerify);
  modalConfirmShow('Are you sure you want to disapprove this upload?',DisapproveEligibilityUpload,PassData);
});

$(document).on('click','#btnVerifyEligibilityUpload',function(){
  var getReqestEligibilityVerification = $(this).attr('value');
  $(".loader-div").show();
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getReqestEligibilityVerification:getReqestEligibilityVerification},
        success:function(data){
          $(".loader-div").hide();
          const EligibilityUploadData = JSON.parse(data);
          $('#VerifyEligibilityid').val(EligibilityUploadData['id']);
          $('#VerifyeligibilityCredentials').val(EligibilityUploadData['elibility_title']);
          $('#VerifyeligibilityRating').val(EligibilityUploadData['eligibility_rating']);
          $('#VerifyeligibilityExamDate').val(EligibilityUploadData['eligibility_exam_date']);
          $('#VerifyeligibilityPlaceExamination').val(EligibilityUploadData['eligibility_exam_place']);
          $('#VerifyeligibilityNumber').val(EligibilityUploadData['eligibility_license']);
          $('#VerifyeligibilityValidityDate').val(EligibilityUploadData['eligibility_validity_date']);
          $('#VerifyEligibilityRemarks').val('');
          const VerifyuploadedMOV = EligibilityUploadData['eligibility_uploaded_mov']; //retrieve file name
          var pdfVerifyEligibilityURL = 'uploadedMOV/'+VerifyuploadedMOV; //pdf directory 
          const iframeVefiyEligibilityPDF = document.getElementById('VerifyUploadedEligibilityMOV'); //iframe id
          iframeVefiyEligibilityPDF.src = `${pdfVerifyEligibilityURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#VerifyEligibilityUpload').modal('show');
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
  });
});

function ApprovedEligibilityUpload(){
  $(".loader-div").show();
  var EligibilityUploadID = $('#VerifyEligibilityid').val();
  var TableID ='VerifyEligibility';
    $.ajax({  
      url:"adminApproveEligibilityUpload.php",
      method:"POST",
      data:{btnApproveEligibilityUpload:EligibilityUploadID},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){
          $('#VerifyEligibilityUpload').modal('hide');
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
function DisapproveEligibilityUpload(formData){
  $(".loader-div").show();
  var TableID ='VerifyEligibility';
  $.ajax({
    url:"adminDisapproveEligibilityUpload.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        $('#VerifyEligibilityUpload').modal('hide');
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
  