$(document).on("click",'#btnApproveEducUpload',function(){ //Approve upload
  var PassData = new FormData(contentVerifyAcadsUpload);
  modalConfirmShow('Are you sure you want to approve this upload?',ApproveEducUpload,PassData);
});

$(document).on('submit','#contentVerifyAcadsUpload',function(event){
  event.preventDefault();
  var PassData = new FormData(contentVerifyAcadsUpload);
  modalConfirmShow('Are you sure you want to disapprove this upload?',DisapproveEducUpload,PassData);
});

function DisapproveEducUpload(formData){
  $(".loader-div").show();
  var TableID ='VerifyEduc';
  $.ajax({
    url:"adminDisapproveEducUpload.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide();
      $('#VerifyAcadsUpload').modal('hide');
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        $('#VerifyAcadsUpload').modal('hide');
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

function ApproveEducUpload(){
  $(".loader-div").show();
  var EducUploadID = $('#VerifyacadsId').val();
  var TableID ='VerifyEduc';
  $.ajax({
    url:"adminApproveEducUpload.php",
    method:"POST",
    data:{btnApproveEducUpload:EducUploadID},
    dataType: 'json',
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;  
      if(stat === "success"){
        $('#VerifyAcadsUpload').modal('hide');
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
$(document).on('click','#btnVerifyUpload',function(){
  var getReqestVerification = $(this).attr('value');
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getReqestVerification:getReqestVerification},
      success:function(data){
        $(".loader-div").hide();
        const EducUploadData = JSON.parse(data);
        $('#VerifyacadsId').val(EducUploadData['id']);
        $('#VerifyacadEducLevel').val(EducUploadData['acad_level']).trigger('change');
        $('#VerifyacadNameSchool').val(EducUploadData['college_school_title']);
        $('#VerifyacadDegree').val(EducUploadData['college_course_title']);
        $('#VerifyacadPeriodFrom').val(EducUploadData['acad_from']);
        $('#VerifyacadPeriodTo').val(EducUploadData['acad_to']);
        $('#VerifyacadHighestLevel').val(EducUploadData['acad_highest_level']);
        $('#VerifyacadYearGraduated').val(EducUploadData['acad_year_graduated']);
        $('#VerifyacadHonors').val(EducUploadData['acad_honors']);
        const VerifyuploadedMOV = EducUploadData['acad_uploaded_mov']; //retrieve file name
        var pdfVerifyAcadsURL = 'uploadedMOV/'+VerifyuploadedMOV; //pdf directory 
        const iframeVefiyAcadsPDF = document.getElementById('VerifyUploadedMOV'); //iframe id
        iframeVefiyAcadsPDF.src = `${pdfVerifyAcadsURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
        $('#VerifyAcadsUpload').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
  });
});
