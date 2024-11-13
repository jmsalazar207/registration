function btnVerifyUpload(getReqestVerification){
    $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{getReqestVerification:getReqestVerification},
        success:function(data){
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
        }
  });
  };
  $("#btnApproveEducUpload").on("click",function(){ //Approve upload
    var EducUploadID = $('#VerifyacadsId').val();
    $.ajax({
      url:"adminApproveEducUpload.php",
      method:"POST",
      data:{btnApproveEducUpload:EducUploadID},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
        $('#VerifyAcadsUpload').hide();
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
  $("#contentVerifyAcadsUpload").on("submit",function(event){ //Disapprove upload
    event.preventDefault();
    var formData = new FormData(contentVerifyAcadsUpload);
    $.ajax({
      url:"adminDisapproveEducUpload.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#VerifyAcadsUpload').modal('hide');
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