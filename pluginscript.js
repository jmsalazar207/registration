window.onload = function() {
  sessionStorage.clear();
};
  // sessionStorage.clear();
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
      jQuery("#AddRegion").on('change',function(){  //Kapag meg select Region
        var regionAction = jQuery(this).attr("id");
        var region_id = jQuery(this).val();
        if(region_id){
            jQuery.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{regionAction:regionAction, region_id:region_id},
            success:function(data){
                jQuery('#AddProvince').html(data);
                jQuery('#AddCity').html('<option value="">SELECT PROVINCE FIRST</option>');  
            }
        });
        }else{
            jQuery('#AddProvince').html('<option value="">SELECT REGION FIRST</option>');
            jQuery('#AddCity').html('<option value="">SELECT PROVINCE FIRST</option>');
            jQuery('#AddBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
        }
    });    //End select Region
    jQuery("#AddProvince").on('change',function(){  //Kapag meg Select province
      var provinceAction = jQuery(this).attr("id");
      var province_id = jQuery(this).val();
      if(province_id){
          jQuery.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{provinceAction:provinceAction, province_id:province_id},
          success:function(data){
              jQuery('#AddCity').html(data);
              jQuery('#AddBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');  
          }
      });
      }else{
          jQuery('#AddCity').html('<option value="">SELECT PROVINCE FIRST</option>');
          jQuery('#AddBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
      }
    });
    jQuery("#AddCity").on('change',function(){
      var cityAction = jQuery(this).attr("id");
      var city_id = jQuery(this).val();
      if(city_id){
          jQuery.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{cityAction:cityAction, city_id:city_id},
          success:function(data){
              jQuery('#AddBarangay').html(data);
          }
      });
      }else{
        jQuery('#AddBarangay').html('<option value="">SELECT PROVINCE FIRST</option>');
      }
    });
    //Onchange ning Division
    jQuery("#AddDivision").on('change',function(){
      var divisionAction = jQuery(this).attr("id");
      var division_ids = jQuery(this).val();
      if(division_ids){
          jQuery.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{divisionAction:divisionAction, division_ids:division_ids},
          success:function(data){
              jQuery('#AddUnit').html(data);
          }
      });
      }else{
          jQuery('#AddUnit').html('<option value="">SELECT DIVISION FIRST</option>');
      }
    });
  });

function validateFileType() { //check file type
  var selectedFile = document.getElementById('AddFile').files[0];
  var allowedTypes = ['image/jpeg', 'image/png'];

  if (!allowedTypes.includes(selectedFile.type)) {
    //  alert('Invalid file type. Please upload a JPEG, PNG or any image file.');
     $("#CheckImagemessage").html("Invalid file type. Please upload a JPEG, PNG or any image file.").css('color', 'red');
     document.getElementById('AddFile').value = '';
  }else{
    $("#CheckImagemessage").html("");
  }

}

var empno = '';
$(document).on('submit','#contentsearch',function(event){
  $('#regRoute').css("display","none");
  event.preventDefault();
  const IDNumber = $('#txtSearch').val();
  $("#txtSearch").css('border-color', '');
    $("#CheckIDmessage").html("");
  if ((IDNumber.length>5) || (IDNumber.length<4)){
    $("#CheckIDmessage").html("Opps! Invalid Employee number").css('color', 'red');
    $("#txtSearch").css('border-color', 'red');
  }else{
    var formData = new FormData(this);
    $(".loader-div").show();
    $.ajax({
      url:"search.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); // hide loader
        empno = data.empno;
        fname = data.fname;
        mname = data.mname;
        sname = data.sname;
        extname = data.extname;
        fullname = fname+' '+mname+' '+sname+' '+extname;
        var PassData ={
          empno : empno,
          fname : fname,
          mname : mname,
          sname : sname,
          extname : extname
        };
        if(data.count == 0){
          modalErrorShow("Oops! Invalid Credentials. Please contact Personnel Section.");
        }else{
            if(data.registered =="No"){ //not yet registered
              $('#FullName').text(fullname);
              modalConfirmShow('Employee Number found. Ready to proceed with registration?',RegisterYes,PassData); //(message,function,data)
            }else{ //registered
              modalAlertShow('This employee number is already registered in our system.',CloseDynamicModal);
            }
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
        resetCaptcha();
      },
      processData: false,
      contentType: false
    }); 
  }
});


function RegisterYes(PassData){ //proceed with the registration 'Yes'
  var empID = PassData.empno;
  var FName = PassData.fname;
  var MName = PassData.mname;
  var SName = PassData.sname;
  var EName = PassData.extname;
  $('#RegisterConfirm').modal('hide');
  $('#contentform').trigger("reset");
  $('#AddRegion').val('').trigger('change');
  $('#AddProvince').html('<option value="">SELECT REGION FIRST</option>');
  $('#AddCity').html('<option value="">SELECT PROVINCE FIRST</option>');
  $('#AddBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
  $('#AddPosition').val('').trigger('change');
  $('#AddDivision').val('').trigger('change');
  $('#AddUnit').html('<option value="">SELECT DIVISION FIRST</option>');
  $('#btnSubmit').val('Register');
  $('#RegisterContent').show();
  $('#ContentTip').show();
  $("#EmployeeNumber").val(empID);
  $("#AddFirstName").val(FName);
  $("#AddLastName").val(SName);
  $("#AddMiddleName").val(MName);
  $("#AddextName").val(EName).trigger('change');
  $("#HiddenAddextName").val(EName);
  $('#SearchContent').hide();
};

$(document).on('submit','#contentform',function(event){
  event.preventDefault();
  const email = $('#AddEmail').val();
  const empno = $('#EmployeeNumber').val();
  const mobile_no = $('#AddMobileNumber').val();
  const FName = $('#AddFirstName').val();
  const MName = $('#AddMiddleName').val();
  const LName = $('#AddLastName').val();
  const Street = $('#AddStreet').val();
  const Birthday = $('#AddBirthdate').val();
  const captchaResponse = grecaptcha.getResponse();
  var age = computeBday(Birthday);

  
  $("#AddMobileNumber").css('border-color', '');
  $("#CheckMobileNomessage").html("");

  $("#CheckEmailNomessage").html("");
  
  $("#dataConsent").css('border-color', '');
  $("#CheckDataConsentmessage").html("");

  $("#AddFirstName").css('border-color', '');
  $("#CheckFNamemessage").html("");

  $("#AddMiddleName").css('border-color', '');
  $("#CheckMNamemessage").html("");

  $("#AddLastName").css('border-color', '');
  $("#CheckLNamemessage").html("");
  
  $("#AddStreet").css('border-color', '');
  $("#CheckStreetmessage").html("");
  
  $("#AddBirthdate").css('border-color', '');
  $("#CheckBdaymessage").html("");

  $("#AddFile").css('border-color', '');
  $("#CheckImagemessage").html("");
  $("#CheckCaptchamessage").html("");

  if (!captchaResponse || !isCaptchaValid) { 
    $("#CheckCaptchamessage").html("Please Verify you're not a robot").css('color', 'red');
    $("#CheckCaptchamessage").focus();
    return; // Exit function if captcha is not valid
  }else if(!$("#dataConsent").is(":checked")){
    $("#CheckDataConsentmessage").html("You need to agree to our data privacy notice to continue.").css('color', 'red');
    $("#dataConsent").css('border-color', 'red');
  }else if(Street.length > 0 && Street.length < 5){
    $("#CheckStreetmessage").html("Please enter a Street with at least 5 characters.").css('color', 'red');
    $("#AddStreet").css('border-color', 'red');
    $("#AddStreet").focus();
  }else if((mobile_no.length != 11) || ((mobile_no.slice(0, 2)) !== "09")){
    $("#CheckMobileNomessage").html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
    $("#AddMobileNumber").css('border-color', 'red');
    $("#AddMobileNumber").focus();
  }else if((age <18) || (age >65)){
    $("#CheckBdaymessage").html("Kindly provide a valid date of birth. Age should fall within the range of 18 to 65 years.").css('color', 'red');
    $("#AddBirthdate").css('border-color','red')
    $("#AddBirthdate").focus();
  }else if(LName.length <2){
    $("#CheckLNamemessage").html("Please enter a Last Name with at least 2 characters.").css('color', 'red');
    $("#AddLastName").css('border-color', 'red');
    $("#AddLastName").focus();
  }else if((MName.length =='') && (MName.length <2)){
    $("#CheckMNamemessage").html("Please enter a Middle Name with at least 2 characters.").css('color', 'red');
    $("#AddMiddleName").css('border-color', 'red');
    $("#AddMiddleName").focus();
  }else if(FName.length <2){
    $("#CheckFNamemessage").html("Please enter a First Name with at least 2 characters.").css('color', 'red');
    $("#AddFirstName").css('border-color', 'red');
    $("#AddFirstName").focus();
  }else{
    $(".loader-div").show();
    $.ajax({ //check email and mobile if existed 
      url:"checkUnique.php",
      method:"POST",
      data: {type:1,empno:empno,email:email,mobile_no:mobile_no},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
        const uniqueMobile = data.mobile;
        const uniqueEmail = data.email;
          if(uniqueEmail > 0){
            $("#CheckEmailNomessage").html("");
            $("#CheckEmailNomessage").html("The email address provided has already been used for registration.").css('color', 'red');
          }else if(uniqueMobile > 0){
            $("#CheckMobileNomessage").html("");
            $("#CheckMobileNomessage").html("The mobile number provided has already been used for registration.").css('color', 'red');
          } else {
            $(".loader-div").show();
            var formData = new FormData(contentform);
            $.ajax({
              url:"addnew.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $(".loader-div").hide();
                const msg = data.msg;
                const stat = data.status;
                if(stat == "success"){
                  modalSuccessShow(msg,refreshPage,'');
                } else {
                  modalErrorShow(msg)
                  resetCaptcha();
                }
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
                resetCaptcha();
              },
              processData: false,
              contentType: false
            }); 
          }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
        resetCaptcha();
      },
    });
  } 
});