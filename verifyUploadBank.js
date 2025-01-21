$(document).on('click', '#btnVerifyBankDetailsUpload', function() { 
    var bankDetails = $(this).attr('value');
    $(".loader-div").show();
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getBankDetails:bankDetails},
      success:function(data){
        $(".loader-div").hide(); 
        BankDetails = JSON.parse(data);
        $('#VerifyBankRequesterName').val(BankDetails.FullName);
        $('#VerifyBankAccountNumber').val(BankDetails.bank_account_number);
        $('#VerifyBankID').val(BankDetails.id);
        const uploadedMOV = BankDetails.bank_account_mov; //retrieve file name
        $("#VerifyBankUploadedMOV").attr('src', 'uploadedBankMOV/' + uploadedMOV);
        $('#VerifyBankDetailsUpload').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
  });

  $(document).on('submit','#frmBankDetailsVerify',function(event){
    alert('sdfds');
    event.preventDefault();
    var PassData = new FormData(frmBankDetailsVerify);
    modalConfirmShow('Are you sure you want to disapprove this upload?',BankDetailsVerify,PassData);
  });

  function BankDetailsVerify(formData){
    $(".loader-div").show();
    $.ajax({
    url:"adminDisapproveBankDetails.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
	$(".loader-div").hide(); 
    const msg = data.msg;
    const stat = data.status;
        if(stat === "success"){
            modalSuccessShow(msg,triggerTableReload,'VerifyBankDetails');
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