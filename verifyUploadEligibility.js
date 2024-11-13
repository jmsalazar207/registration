function btnVerifyEligibilityUpload(getReqestEligibilityVerification){
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getReqestEligibilityVerification:getReqestEligibilityVerification},
        success:function(data){
          const EligibilityUploadData = JSON.parse(data);
          $('#VerifyEligibilityid').val(EligibilityUploadData['id']);
          $('#VerifyeligibilityCredentials').val(EligibilityUploadData['elibility_title']);
          $('#VerifyeligibilityRating').val(EligibilityUploadData['eligibility_rating']);
          $('#VerifyeligibilityExamDate').val(EligibilityUploadData['eligibility_exam_date']);
          $('#VerifyeligibilityPlaceExamination').val(EligibilityUploadData['eligibility_exam_place']);
          $('#VerifyeligibilityNumber').val(EligibilityUploadData['eligibility_license']);
          $('#VerifyeligibilityValidityDate').val(EligibilityUploadData['eligibility_validity_date']);
          const VerifyuploadedMOV = EligibilityUploadData['eligibility_uploaded_mov']; //retrieve file name
          var pdfVerifyEligibilityURL = 'uploadedMOV/'+VerifyuploadedMOV; //pdf directory 
          const iframeVefiyEligibilityPDF = document.getElementById('VerifyUploadedEligibilityMOV'); //iframe id
          iframeVefiyEligibilityPDF.src = `${pdfVerifyEligibilityURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#VerifyEligibilityUpload').modal('show');
        }
  });
  };
  $("#btnApproveEligibilityUpload").on("click",function(){ //Approve upload
    var EligibilityUploadID = $('#VerifyEligibilityid').val();
    $.ajax({
      url:"adminApproveEligibilityUpload.php",
      method:"POST",
      data:{btnApproveEligibilityUpload:EligibilityUploadID},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
        $('#VerifyEligibilityUpload').hide();
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
  $("#frmEligibilitydVerify").on("submit",function(event){ //Disapprove upload
    event.preventDefault();
    var formData = new FormData(frmEligibilitydVerify);
    $.ajax({
      url:"adminDisapproveEligibilityUpload.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#VerifyEligibilityUpload').modal('hide');
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
  