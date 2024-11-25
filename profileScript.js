// const { ajax } = require("jquery");

$("#ConfirmPassword").keyup(checkPasswordMatch);
var myInput = document.getElementById("NewPassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var special_char = document.getElementById("special_char");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
  letter.classList.remove("invalid");
  letter.classList.add("valid");
  } else {
  letter.classList.remove("valid");
  letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
  capital.classList.remove("invalid");
  capital.classList.add("valid");
  } else {
  capital.classList.remove("valid");
  capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
  number.classList.remove("invalid");
  number.classList.add("valid");
  } else {
  number.classList.remove("valid");
  number.classList.add("invalid");
  }
  
  // Validate special
  var special_chars = /[!@#$%^.+=~-]/g;
  if(myInput.value.match(special_chars)) {  
  special_char.classList.remove("invalid");
  special_char.classList.add("valid");
  } else {
  special_char.classList.remove("valid");
  special_char.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
  length.classList.remove("invalid");
  length.classList.add("valid");
  } else {
  length.classList.remove("valid");
  length.classList.add("invalid");
  }
}
function checkPasswordMatch() { //password confirmed password if matched
  var NewPassword = $("#NewPassword").val();
  var ConfirmPassword = $("#ConfirmPassword").val();
  if (NewPassword != ConfirmPassword){
      $("#checkmessage").html("Passwords does not match!").css('color', 'red');
      $("#btnChangePassword").attr('disabled', true);
  }else{
      $("#checkmessage").html("Passwords match.").css('color', 'green');
      $("#btnChangePassword").attr('disabled', false);
  }
  if(NewPassword=='' || NewPassword == '') $("#checkmessage").html("");
}
  $(".toggle-OldPassword").click(function() { //show password in desired password
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  $(".toggle-NewPassword").click(function() { //show password in desired password
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  $(".toggle-ConfirmPassword").click(function() { //show password in desired password
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  function validateFileTypeCareer() { //check file type
    var selectedFile = document.getElementById('careerMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
       $("#CheckcareerMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('careerMOV').value = '';
    }else{
      $("#CheckcareerMOV").html("");
    }
  
  }
  function validateFileTypeEligibility() { //check file type
    var selectedFile = document.getElementById('eligibilityMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
      //  alert('Invalid file type. Please upload a JPEG, PNG or any image file.');
       $("#CheckEligibilityMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('eligibilityMOV').value = '';
    }else{
      $("#CheckEligibilityMOV").html("");
    }
  
  }
  function validateFileTypeTraining() { //check file type
    var selectedFile = document.getElementById('trainingUploadMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
      //  alert('Invalid file type. Please upload a JPEG, PNG or any image file.');
       $("#CheckTrainingMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('trainingUploadMOV').value = '';
    }else{
      $("#CheckTrainingMOV").html("");
    }
  
  }
  function validateFileTypeAcademic() { //check file type
    var selectedFile = document.getElementById('acadMOV').files[0];
    var allowedTypes = ['application/pdf'];
    const size = (selectedFile.size / 1024 / 1024).toFixed(2);

    if (!allowedTypes.includes(selectedFile.type)) {
       $("#CheckacadMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('acadMOV').value = '';
    }else if(size > 5){
      $("#CheckacadMOV").html("The file is too large and cannot be uploaded. Please reduce the size of the file and try again.").css('color', 'red');
      document.getElementById('acadMOV').value = '';
    }else{
      $("#CheckacadMOV").html("");
    }
  }
  function validateUpdateFileTypeCareer() { //check file type
    var selectedFile = document.getElementById('UpdatecareerMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
       $("#CheckUpdatecareerMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('UpdatecareerMOV').value = '';
    }else{
      $("#CheckUpdatecareerMOV").html("");
    }
  }
  function validateUpdateFileTypeTraining() { //check file type
    var selectedFile = document.getElementById('UpdateTrainingMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
       $("#CheckUpdateTrainingMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('UpdateTrainingMOV').value = '';
    }else{
      $("#CheckUpdateTrainingMOV").html("");
    }
  }
  function validateUpdateFileTypeAcademic() { //check file type
    var selectedFile = document.getElementById('UpdateacadMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
      //  alert('Invalid file type. Please upload a JPEG, PNG or any image file.');
       $("#CheckUpdateacadMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('UpdateacadMOV').value = '';
    }else{
      $("#CheckUpdateacadMOV").html("");
    }
  
  }
  function validateUpdateFileTypeEligibility() { //check file type
    var selectedFile = document.getElementById('UpdateEligibilityMOV').files[0];
    var allowedTypes = ['application/pdf'];
  
    if (!allowedTypes.includes(selectedFile.type)) {
      //  alert('Invalid file type. Please upload a JPEG, PNG or any image file.');
       $("#CheckUpdateEligibilityMOV").html("Only PDF files can be uploaded. Please choose a PDF file.").css('color', 'red');
       document.getElementById('UpdateEligibilityMOV').value = '';
    }else{
      $("#CheckUpdateEligibilityMOV").html("");
    }
  
  }
function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  function filterNumbersAndDots(evt) {
    const char = String.fromCharCode(evt.which);
    if (!/[0-9.]/.test(char)) {
      evt.preventDefault();
    }
}

  //Kapag meg select Region
  jQuery(document).ready(function() {
        $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("ajax_search.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result p", function(){
      // Set the filter to the clicked school's name
      $(this).parents(".search-box").find('#txtFilter').val($(this).find('.schl_name').text());
      // Set the school ID from the clicked result
      $(this).parents(".search-box").find('#txtID').val($(this).find('.school_id').text());
      // Clear the result dropdown
      $(this).parents(".search-box").find('#txtUpdateFilter').val($(this).find('.schl_name').text());
      // Set the school ID from the clicked result
      $(this).parents(".search-box").find('#txtUpdateID').val($(this).find('.school_id').text());
      // Clear the result dropdown
      $(this).parent(".result").empty();
      });
    $('.select2').select2();
    jQuery("#AddRegion").on('change',function(){
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
                jQuery('#AddBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
            }
        });
        }else{
            jQuery('#AddProvince').html('<option value="">SELECT REGION FIRST</option>');
            jQuery('#AddCity').html('<option value="">SELECT PROVINCE FIRST</option>');
            jQuery('#AddBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
        }
    });
  });
//End select Region
//Kapag meg Select province
  jQuery(document).ready(function() {
    jQuery("#AddProvince").on('change',function(){
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
  });
//end select city
//kapag meg select barangay
        jQuery(document).ready(function() {
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
        });  
// Permanent
  //Kapag meg select Region
  jQuery(document).ready(function() {

    jQuery("#AddPermanentRegion").on('change',function(){
        var regionAction = jQuery(this).attr("id");
        var region_id = jQuery(this).val();
        if(region_id){
            jQuery.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{regionAction:regionAction, region_id:region_id},
            success:function(data){

                jQuery('#AddPermanentProvince').html(data);
                jQuery('#AddPermanentCity').html('<option value="">SELECT PROVINCE FIRST</option>');
                jQuery('#AddPermanentBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');  
            }
        });
        }else{
            jQuery('#AddPermanentProvince').html('<option value="">SELECT REGION FIRST</option>');
            jQuery('#AddPermanentCity').html('<option value="">SELECT PROVINCE FIRST</option>');
            jQuery('#AddPermanentBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
        }
    });
  });
//End select Region
//Kapag meg Select province
  jQuery(document).ready(function() {
    jQuery("#AddPermanentProvince").on('change',function(){
        var provinceAction = jQuery(this).attr("id");
        var province_id = jQuery(this).val();
        if(province_id){
            jQuery.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{provinceAction:provinceAction, province_id:province_id},
            success:function(data){
                jQuery('#AddPermanentCity').html(data);
                jQuery('#AddPermanentBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');  
            }
        });
        }else{
            jQuery('#AddPermanentCity').html('<option value="">SELECT PROVINCE FIRST</option>');
            jQuery('#AddPermanentBarangay').html('<option value="">SELECT MUNICIPALITY FIRST</option>');
        }
    });
  });
//end select city
//kapag meg select barangay
        jQuery(document).ready(function() {
      jQuery("#AddPermanentCity").on('change',function(){
          var cityAction = jQuery(this).attr("id");
          var city_id = jQuery(this).val();
          if(city_id){
              jQuery.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{cityAction:cityAction, city_id:city_id},
              success:function(data){
                  jQuery('#AddPermanentBarangay').html(data);
                   
              }
          });
          }else{
              jQuery('#AddPermanentBarangay').html('<option value="">SELECT PROVINCE FIRST</option>');
             
          }
      });
        });  
$(function(){
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
      let year_start = 1940;
      let year_end = (new Date).getFullYear(); // current year
      let year_selected = '';

      let YearOption = '';
      YearOption = '<option value="">Year</option>'; // first option

      for (let i = year_start; i <= year_end; i++) {
          let selected = (i === year_selected ? ' selected' : '');
          YearOption += '<option value="' + i + '"' + selected + '>' + i + '</option>';
      }
      $("#acadPeriodFrom").html(YearOption);
      $("#acadPeriodTo").html(YearOption);
      $("#acadYearGraduated").html(YearOption);

      $("#UpdateacadPeriodFrom").html(YearOption);
      $("#UpdateacadPeriodTo").html(YearOption);
      $("#UpdateacadYearGraduated").html(YearOption);

    $.ajax({ //set 3 entry in person references
      url:"checkExist.php",
      method:"POST",
      data:{countReference:1},
      dataType: 'json',
      success:function(data){
        const countReference = data.countRef;
        if(countReference==3){
          $('#frmReferencesAdd').hide();
          $('#refLimitInfo').show();
        }
      }
    });
    //work experience present checkbox
    $.ajax({ //present
      url:"checkExist.php",
      method:"POST",
      data:{countPresent:1},
      dataType: 'json',
      success:function(data){
        const countPresent = data.countPresent;
        if(countPresent){
          $('#labelCareerPresent').hide();
          $('#careerPresent').hide();
        }
      }
    });
    $.ajax({ //getInfo session
        url:"getInfo.php",
        method:"POST",
        dataType: 'json',
        success:function(data){
            const empno = data.empno;
            const fname = data.fname;
            const sname = data.sname;
            const mname = data.mname;
            const extname = data.ename;
            var sex = data.sex;
            if(sex > 0){
              sex = 'FEMALE'
            }else{
              sex = 'MALE'
            }
            const dob = data.birthdate;
            const position = data.position_name;
            const division = data.division_name;
            const unit = data.unit_name;
            const region = data.region_name;
            const province = data.prov_name;
            const city = data.city_name;
            const brgy = data.brgy_name;
            const houseNo = data.numAdd;
            const street = data.street;
            const mobileNumber = data.mobile;
            const telephoneNumber = data.telephone;
            const email = data.eaddress
            const region_code = data.region;
            const province_code = data.province;
            const city_code = data.city;
            const brgy_code = data.barangay;
            const subd = data.subd;
            const zip_code = data.zip_code;

            //profileCard
            $("#profileFullName").text(fname+" "+sname);
            $("#profilePosition").text(position);
            $("#profileDivision").text(division);
            $("#profileUnit").text(unit);
            //overView
            $("#infoEmpno").text(empno);
            $("#infoFullName").text(fname+" "+mname+" "+sname+" "+extname);
            $("#infoPosition").text(position);
            $("#infoDivision").text(division);
            $("#infoUnit").text(unit);
            $("#infoAddress").text(houseNo+" "+street+" "+brgy+" "+city+" "+province+" "+region);
            $("#infoMobileNo").text(mobileNumber);
            $("#infoEmail").text(email);
            
            //updateinfo
            const permhouseNo = data.permNumAdd;
            const permstreet = data.permStreet;
            const permRegion_code = data.permRegion;
            const permProvince_code = data.permProvince;
            const permCity_code = data.permCity;
            const permBrgy_code = data.permBarangay;
            const permSubd = data.permSubd;
            const permZipCode = data.permZipCode;
            $("#AddFullName").val(fname+" "+mname+" "+sname+" "+extname);
            $("#AddSex").val(sex);
            $("#AddDOB").val(dob);
            $("#AddStreet").val(street);
            $("#AddHouseNumber").val(houseNo);
            $("#AddSubd").val(subd);
            $("#AddZipCode").val(zip_code);
            $("#AddPermanentHouseNumber").val(permhouseNo);
            $("#AddPermanentStreet").val(permstreet);
            $("#AddPermanentSubd").val(permSubd);
            $("#AddPermanentZipCode").val(permZipCode);
            $("#AddMobileNo").val(mobileNumber);
            $("#AddTelephoneNo").val(telephoneNumber);
            $("#AddEmail").val(email);
            var update_region_id = region_code;
            $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{update_region_id:update_region_id},
                success:function(data){
                    $('#AddRegion').html(data);
                }
            });
            var update_province_id = province_code;
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_province_id:update_province_id,Where_region_ID:update_region_id},
              success:function(data){
                  $('#AddProvince').html(data);
              }
          });
            var update_city_id = city_code;
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_city_id:update_city_id,Where_province_ID:update_province_id},
              success:function(data){
                  $('#AddCity').html(data);
              }
          });
            var update_barangay_id = brgy_code;
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_barangay_id:update_barangay_id,Where_city_ID:update_city_id},
              success:function(data){
                  $('#AddBarangay').html(data);
              }
          });
          // Permanent
          var update_Perm_region_id = permRegion_code;
          $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_region_id:update_Perm_region_id},
              success:function(data){
                  $('#AddPermanentRegion').html(data);
              }
          });
          var update_Perm_province_id = permProvince_code;
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_province_id:update_Perm_province_id,Where_region_ID:update_Perm_region_id},
            success:function(data){
                $('#AddPermanentProvince').html(data);
            }
        });
          var update_Perm_city_id = permCity_code;
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_city_id:update_Perm_city_id,Where_province_ID:update_Perm_province_id},
            success:function(data){
                $('#AddPermanentCity').html(data);
            }
        });
          var update_Perm_barangay_id = permBrgy_code ;
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_barangay_id:update_Perm_barangay_id,Where_city_ID:update_Perm_city_id},
            success:function(data){
                $('#AddPermanentBarangay').html(data);
            }
        });
        //otherinfo
        const birth_place = data.pob;
        const citizenship = data.citizenship;
        const byBirth = data.byBirth;
        const byNaturalization = data.byNaturalization;
        const countryCitizenship = data.country_citizenship; //Find database
        const civilStatus = data.civil_status;
        const civilStatus_other = data.civil_status_other;
        const height = data.height;
        const weight = data.weight;
        const bloodType = data.blood_type;
        const GSIS = data.gsis_no;
        const PAGIBIG = data.pagibig_no;
        const PHILHEALTH = data.philhealth_no;
        const SSS = data.sss_no;
        const TIN = data.tin_no;
        $("#gsisNo").val(GSIS);
        $("#pagibigNo").val(PAGIBIG);
        $("#philhealthNo").val(PHILHEALTH);
        $("#sssNo").val(SSS);
        $("#tinNo").val(TIN);
        $("#Weight").val(weight);
        $("#Height").val(height);
        $("#OthersCivilStatus").val(civilStatus_other);
        $("#CivilStatus").val(civilStatus).trigger('change');
        var citi_country = countryCitizenship;
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{citi_country:citi_country},
          success:function(data){
            $("#DualCitizenCountry").html(data);
          }
        })
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{blood_type_id:bloodType},
          success:function(data){
            $("#BloodType").html(data);
          }
        })
        if(byNaturalization =='on'){
          $("#chkByNaturalization").prop('checked', true);
          $("#DualCitizenCountry").attr("disabled",false);
        }
        if(byBirth =='on'){
          $("#chkByBirth").prop('checked', true);
          $("#DualCitizenCountry").attr("disabled",false);
        }
        if(citizenship =='on'){
          $("#chkFilipino").prop('checked', true);
        }
        var pob = birth_place;
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{pob:pob},
          success:function(data){
              $('#PlaceOfBirth').html(data);
          }
        });
        var eligibility = '';
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{eligibility:eligibility},
          success:function(data){
              $('#eligibilityCredentials').html(data);
          }
        });
                //Family Background
                if(civilStatus==1 || civilStatus=='' || civilStatus == null){
                  $("#optSpouse").attr("disabled",true);
                  $("#optSpouse").attr("title","Spouse selection is unavailable due to the individual's marital status.");
                }
                //other infor part 2
                if(data.q1a != ''){
                  $("#q1a_"+data.q1a).prop("checked", true)
                }
                if(data.q1b != ''){
                  $("#q1b_"+data.q1b).prop("checked", true)
                }
                $("#q1b_details").val(data.q1b_details);

                if(data.q2a != ''){
                  $("#q2a_"+data.q2a).prop("checked", true)
                }

                $("#q2a_details").val(data.q2a_details);


                if(data.q2b != ''){
                  $("#q2b_"+data.q2b).prop("checked", true)
                } 
                $("#q2b_datefiled").val(data.q2b_datefiled);
                $("#q2_status").val(data.q2_status);


                if(data.q3 != ''){
                  $("#q3_"+data.q3).prop("checked", true)
                }
                $("#q3_details").val(data.q3_details);

                if(data.q4 != ''){
                  $("#q4_"+data.q4).prop("checked", true)
                }
                $("#q4_details").val(data.q4_details);

                if(data.q5a != ''){
                  $("#q5a_"+data.q5a).prop("checked", true)
                }
                $("#q5a_details").val(data.q5a_details);

                if(data.q5b != ''){
                  $("#q5b_"+data.q5b).prop("checked", true)
                }
                $("#q5b_details").val(data.q5b_details);

                if(data.q6 != ''){
                  $("#q6_"+data.q6).prop("checked", true)
                }
                $("#q6_details").val(data.q6_details);

                if(data.q7a != ''){
                  $("#q7a_"+data.q7a).prop("checked", true)
                }
                $("#q7a_details").val(data.q7a_details);

                if(data.q7b != ''){
                  $("#q7b_"+data.q7b).prop("checked", true)
                }
                $("#q7b_details").val(data.q7b_details);

                if(data.q7c != ''){
                  $("#q7c_"+data.q7c).prop("checked", true)
                }
                $("#q7c_details").val(data.q7c_details);
                $('#GovernId').val(data.id);
                $('#GovernIDTitle').val(data.govern_id_title);
                $('#GovernIDNo').val(data.govern_id_no);
                $('#GovernIDDateIssue').val(data.govern_id_date);
                var poi = data.govern_id_place;
                $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{pob:poi},
                success:function(data){
                    $('#GovernIDPlaceIssue').html(data);
                }
              });
              }//end
    });
    $("#form_other_info").on("submit",function(event){
      event.preventDefault();
      var formData = new FormData(form_other_info);
      $.ajax({
        url:"otherInfo2_action.php",
                method:"POST",
                dataType: "json",
                data:formData,
                success:function(data){
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
    $.ajax({ 
      url:"checkExist.php",
      method:"POST",
      data:{employeeNumber:1},
      dataType: 'json',
      success:function(data){
          const spouse = data.spouse;
          const father = data.father;
          const mother = data.mother;
          const acadCount  = data.acad_level;
          const eligibilityCount = data.eligibility;
          const trainingCount = data.training;
          const careerCount = data.career;
          $("#encodedCount").val(acadCount);
          $("#encodedEligibilityCount").val(eligibilityCount);
          $("#encodedTrainingCount").val(trainingCount);
          $("#encodedCareerCount").val(careerCount);
          if(spouse>0){
              $("#optSpouse").attr("disabled",true);
              $("#optSpouse").attr("title","You've already recorded 'SPOUSE'. Feel free to review the table below for any updates if necessary.");
          }
          if(father>0){
            $("#optFather").attr("disabled",true);
            $("#optFather").attr("title","You've already recorded 'FATHER'. Feel free to review the table below for any updates if necessary.");
          }
          if(mother>0){
            $("#optMother").attr("disabled",true);
            $("#optMother").attr("title","You've already recorded 'MOTHER'. Feel free to review the table below for any updates if necessary.");
          }
          const elementary = data.elementary; //for educ background
          const secondary = data.secondary; //for educ background
          if(elementary){
            $("#optElementary").attr("disabled",true);
            $("#optElementary").attr("title","You've already recorded 'ELEMENTARY'. Feel free to review the table below for any updates if necessary.");
          }
          if(secondary){
            $("#optSecondary").attr("disabled",true);
            $("#optSecondary").attr("title","You've already recorded 'SECONDARY'. Feel free to review the table below for any updates if necessary.");
          }
          
      }
    });  
});
$("#frmFamilyBackgroundAdd").on("submit",function(event){
  event.preventDefault();
  const FBSname = $("#FBSname").val();
  const FBFname = $("#FBFname").val();
  const FBMname = $("#FBMname").val();
  const FBbirthday = $("#FBDOB").val();
  var selectRelation = $("#relation").val();
  var bday = new Date(FBbirthday);
  var month_diff = Date.now() - bday.getTime();
  var age_dt = new Date(month_diff); 
  var year = age_dt.getUTCFullYear();
  var age = Math.abs(year - 1970);
  validatePass = 1;

  $("#CheckFBSname").html("");
  $("#FBSname").css('border-color', '');
  $("#CheckFBFname").html("");
  $("#FBFname").css('border-color', '');
  $("#CheckFBMname").html("");
  $("#FBMname").css('border-color', '');
  $("#CheckFBDOB").html("");
  if(selectRelation !=2 && age <18){
    $("#CheckFBDOB").html("Please furnish a valid date of birth ensuring the individual is aged 18 years or older.").css('color', 'red');
    validatePass = 0;
  }
  if(FBSname.length<2){
    $("#CheckFBSname").html("Please enter last name atleast 2 characters.").css('color', 'red');
    $("#FBSname").css('border-color', 'red');
    $("#FBSname").focus();
    validatePass = 0;
  }
  if(FBFname.length <2){
    $("#CheckFBFname").html("Please enter first name atleast 2 characters.").css('color', 'red');
    $("#FBFname").css('border-color', 'red');
    $("#FBFname").focus();
    validatePass = 0;
  }
  if(FBMname.length !='' && FBMname.length <2 ){
    $("#CheckFBMname").html("Please enter middle name atleast 2 characters.").css('color', 'red');
    $("#FBMname").css('border-color', 'red');
    $("#FBMname").focus();
    validatePass = 0;
  }
  if (validatePass ==1){
    var formData = new FormData(frmFamilyBackgroundAdd);
    $.ajax({
      url:"familyBackgroundAdd.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
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
  }
});
$("#frmAcademicAdd").on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmAcademicAdd);
  const acadPeriodFrom = $("#acadPeriodFrom").val();
  const acadPeriodTo = $("#acadPeriodTo").val();
  const acadLevel = $("#acadEducLevel").val();
  const totalYear = (acadPeriodTo-acadPeriodFrom);
  const acadYearGraduated = $("#acadYearGraduated").val();

  $("#CheckacadPeriodTo").html("");
  $("#CheckacadYearGraduated").html("");
  $("#acadPeriodTo").css('border-color', '');
  $("#acadPeriodFrom").css('border-color', '');
  $("#acadYearGraduated").css('border-color', '');

  if(acadPeriodFrom > acadPeriodTo){
    $("#CheckacadPeriodTo").html("Date error: Please verify the encoded year").css('color', 'red');
    $("#acadPeriodTo").css('border-color', 'red');
    $("#acadPeriodFrom").css('border-color', 'red');
    $("#acadPeriodTo").focus();
  }else if(acadLevel ==1 && totalYear<6){
    $("#CheckacadPeriodTo").html("Date error: Please note that the encoded year of attendance is not equivalent to 6 years.").css('color', 'red');
    $("#acadPeriodTo").css('border-color', 'red');
    $("#acadPeriodFrom").css('border-color', 'red');
  }else if(acadYearGraduated != '' && acadYearGraduated != acadPeriodTo){
    $("#CheckacadYearGraduated").html("Date error: Please verify the encoded year").css('color', 'red');
    $("#acadPeriodTo").css('border-color', 'red');
    $("#acadYearGraduated").css('border-color', 'red');
    $("#acadYearGraduated").focus();
  }else{
    $.ajax({
      url:"academicAdd.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                const msg = data.msg;
                const stat = data.status;
                if(stat == "success"){
                    $('#modalNotif-header').text('Great! Success.');
                    $('#modalNotif-message').text(msg);
                     $('#modalNotif').modal('show');
                }
                else{
                  $('#modalNotif-header').text('Opps!');
                  $('#modalNotif-message').text(msg);
                  $('#modalNotif').modal('show');
                }
              },
              processData: false,
              contentType: false
    });
  }

});
$("#frmCareerdAdd").on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmCareerdAdd);
  $.ajax({
    url:"careerAdd.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
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
$("#frmnonAcademicAdd").on("submit",function(event){
  event.preventDefault();
  const nonAcademic = $('#nonAcademicTitle').val();
  $("#CheckNonAcademic").html("").css('color', 'red');
  $("#nonAcademicTitle").css('border-color', '');
  if(nonAcademic.length<3){
    $("#CheckNonAcademic").html("Please input atleast 3 character").css('color', 'red');
    $("#nonAcademicTitle").css('border-color', 'red');
  }else{
    var formData = new FormData(frmnonAcademicAdd);
    $.ajax({
      url:"non-AcademicAdd.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){ 
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
  }
});
$("#frmReferencesAdd").on("submit",function(event){
  event.preventDefault();
  $('#checkreferencesName').html("");
  $('#referencesName').css('border-color','');
  $('#checkreferencesAddress').html("");
  $('#referencesAddress').css('border-color','');
  $('#checkreferencesMobile').html("");
  $('#referencesMobile').css('border-color','');
  const RefTelNo = $('#referencesMobile').val();
  const RefName = $('#referencesName').val();
  const RefAddress = $('#referencesAddress').val();
  if(RefName.length<3){
    $('#checkreferencesName').html("Please input atleast 3 character").css('color', 'red');
    $('#referencesName').css('border-color','red');
  }else if(RefAddress.length<3){
    $('#checkreferencesAddress').html("Please input atleast 3 character").css('color', 'red');;
    $('#referencesAddress').css('border-color','red');
  }else if((RefTelNo.length != 11) || ((RefTelNo.slice(0, 2)) !== "09")){
    $('#checkreferencesMobile').html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
    $('#referencesMobile').css('border-color','red');
  }else{
    const RefMobNumber = $('#referencesMobile').val();
    $.ajax({ //check Ref Number if existed 
      url:"checkExist.php",
      method:"POST",
      data: {RefMobNumber:RefMobNumber},
      dataType: 'json',
      success:function(data){
        const countRefMobile = data.countRefMobile;
        if (countRefMobile){
          $('#checkreferencesMobile').html("Oops! It looks like this mobile number has already been assigned to another person. Please double-check and update if necessary.").css('color', 'red');
          $('#referencesMobile').css('border-color','red');
        }else{
          var formData = new FormData(frmReferencesAdd);
          $.ajax({
            url:"referencesAdd.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
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
        }
      }
    });
  }
});
$("#frmSkillsAdd").on("submit",function(event){
  event.preventDefault();
  $('#checkSkillsTitle').html("");
  $('#skillsTitle').css('border-color','');
  const skillsTitle = $('#skillsTitle').val();
  if(skillsTitle.length<3){
    $('#checkSkillsTitle').html("Please input atleast 3 character").css('color', 'red');
    $('#skillsTitle').css('border-color', 'red');
  }else{
    var formData = new FormData(frmSkillsAdd);
    $.ajax({
      url:"skillsAdd.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
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
  }
});
$("#frmTrainingAdd").on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmTrainingAdd);
  $.ajax({
    url:"trainingAdd.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
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
$("#frmEligibilitydAdd").on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmEligibilitydAdd);
  $.ajax({
    url:"eligibilityAdd.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
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
$("#frmVoluntaryAdd").on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmVoluntaryAdd);
  $.ajax({
    url:"voluntaryWorkAdd.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
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
$("#frmBasicInfoUpdate").on("submit",function(event){
    event.preventDefault();
    const empno = $('#AddEmpNo').val();
    const mobile_no = $('#AddMobileNo').val();
    const email = $('#AddEmail').val();
    const street = $('#AddStreet').val();
    const permStreet = $("#AddPermanentStreet").val();

    $("#AddEmail").css('border-color', '');
    $("#CheckAddEmail").html("");

    $("#AddMobileNo").css('border-color', '');
    $("#CheckAddMobileNo").html("");

    $("#AddStreet").css('border-color', '');
    $("#CheckAddStreet").html("");

    $("#AddPermanentStreet").css('border-color', '');
    $("#CheckAddPermanentStreet").html("");

    var validatePass = 1;
    if(street.length !='' && street.length<5){
      $("#CheckAddStreet").html("Please enter a Street with at least 5 characters.").css('color', 'red');
      $("#AddStreet").css('border-color', 'red');
      $("#AddStreet").focus();
      validatePass = 0;
  }
    if(permStreet.length !='' && permStreet.length<5){
        $("#CheckAddPermanentStreet").html("Please enter a Street with at least 5 characters.").css('color', 'red');
        $("#AddPermanentStreet").css('border-color', 'red');
        $("#AddPermanentStreet").focus();
        validatePass = 0;
    }
    if((mobile_no.length != 11) || ((mobile_no.slice(0, 2)) !== "09")){
      $("#CheckAddMobileNo").html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
      $("#AddMobileNo").css('border-color', 'red');
      $("#AddMobileNo").focus();
      validatePass = 0;
    }
    $.ajax({ //check email and mobile if existed 
      url:"checkUnique.php",
      method:"POST",
      data: {type:1,empno:empno,email:email,mobile_no:mobile_no},
      dataType: 'json',
      success:function(data){
        const uniqueMobile = data.mobile;
        const uniqueEmail = data.email;
          if(uniqueEmail > 0){
            $("#CheckAddEmail").html("");
            $("#CheckAddEmail").html("The email address provided has already been used.").css('color', 'red');
          }
          if(uniqueMobile > 0){
            $("#CheckAddMobileNo").html("");
            $("#CheckAddMobileNo").html("The mobile number provided has already been used.").css('color', 'red');
          }
          if(validatePass ==1 && uniqueMobile==0 && uniqueEmail==0){
            $.ajax({ 
              url:"checkExist.php",
              method:"POST",
              data:{BasicInfo:1},
              dataType: 'json',
              success:function(data){
                const BasicInfo = data.Basic_Info;
                if(BasicInfo){
                  var formData = new FormData(frmBasicInfoUpdate);
                  $.ajax({
                  url:"basicInfoUpdate.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat == "success"){
                        $('#modalNotif-header').text('Great! Success.');
                        $('#modalNotif-message').text(msg);
                        $('#modalNotif').modal('show');
                    }else{
                      $('#modalNotif-header').text('Opps!');
                      $('#modalNotif-message').text(msg);
                      $('#modalNotif').modal('show'); 
                    }
                  },
                  processData: false,
                  contentType: false
                  }); 
                }else{
                  var formData = new FormData(frmBasicInfoUpdate);
                  $.ajax({
                  url:"basicInfoAdd.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat == "success"){
                        $('#modalNotif-header').text('Great! Success.');
                        $('#modalNotif-message').text(msg);
                        $('#modalNotif').modal('show');
                    }else{
                      $('#modalNotif-header').text('Opps!');
                      $('#modalNotif-message').text(msg);
                      $('#modalNotif').modal('show'); 
                    }
                  },
                  processData: false,
                  contentType: false
                  }); 
                }
              }
            });
          }
      },
    });
});
$("#frmOtherInfoUpdate").on("submit",function(event){
  event.preventDefault();
  var validated = 0;
  const gsis = $('#gsisNo').val();
  const pagibig = $('#pagibigNo').val();
  const philhealth = $('#philhealthNo').val();
  const sss = $('#sssNo').val();
  const tin = $('#tinNo').val();

  var validated = 1;
  $("#CheckGSIS").html("");
  $("#gsisNo").css('border-color', '');
  $("#CheckPAGIBIG").html("");
  $("#pagibigNo").css('border-color', '');
  $("#CheckPHILHEALTH").html("");
  $("#philhealthNo").css('border-color', '');
  $("#CheckSSS").html("");
  $("#sssNo").css('border-color', '');
  $("#CheckTIN").html("");
  $("#tinNo").css('border-color', '');
  $.ajax({ //check ID Number if existed 
    url:"checkExist.php",
    method:"POST",
    data: {gsis:gsis,pagibig:pagibig,philhealth:philhealth,sss:sss,tin:tin},
    dataType: 'json',
    success:function(data){
        const UniqueGSIS = data.gsis;
        const UniquePAGIBIG = data.pagibig;
        const UniquePHILHEALTH = data.philhealth;
        const UniqueSSS = data.sss;
        const UniqueTIN = data.tin;
        if(UniqueGSIS >0){
            $("#CheckGSIS").html("The ID Number provided has already been used.").css('color', 'red');
            $("#gsisNo").css('border-color', 'red');
            validated = 0;
        }
        if(UniquePAGIBIG >0){
          $("#CheckPAGIBIG").html("The ID Number provided has already been used.").css('color', 'red');
          $("#pagibigNo").css('border-color', 'red');
          validated = 0;
        }
        if(UniquePHILHEALTH >0){
          $("#CheckPHILHEALTH").html("The ID Number provided has already been used.").css('color', 'red');
          $("#philhealthNo").css('border-color', 'red');
          validated = 0;
        }
        if(UniqueSSS >0){
          $("#CheckSSS").html("The ID Number provided has already been used.").css('color', 'red');
          $("#sssNo").css('border-color', 'red');
          validated = 0;
        }
        if(UniqueTIN >0){
          $("#CheckTIN").html("The ID Number provided has already been used.").css('color', 'red');
          $("#tinNo").css('border-color', 'red');
          validated = 0;
        }
        if(validated==1){
          $.ajax({ 
            url:"checkExist.php",
            method:"POST",
            data:{BasicOtherInfo:1},
            dataType: 'json',
            success:function(data){
              const BasicOtherInfo = data.Basic_Other_Info;
              if(BasicOtherInfo){
                   var formData = new FormData(frmOtherInfoUpdate);
                    $.ajax({
                    url:"otherInfoUpdate.php",
                    method:"POST",
                    dataType: "json",
                    data:formData,
                    success:function(data){
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
              }else{
                var formData = new FormData(frmOtherInfoUpdate);
                $.ajax({
                  url:"otherInfoAdd.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat == "success"){
                        $('#modalNotif-header').text('Great! Success.');
                        $('#modalNotif-message').text(msg);
                        $('#modalNotif').modal('show');
                    }else{
                      $('#modalNotif-header').text('Opps!');
                      $('#modalNotif-message').text(msg);
                      $('#modalNotif').modal('show');
                    }
                  },
                  processData: false,
                  contentType: false
                });
              }
            }
            });
        }
    }, 
  });
});
$("#frmProfileChangePass").on("submit", function(event){ //confirm the old password first
  event.preventDefault();
  const id = $('#sessionID').val().split("03-");
  const username = id[1];
  const password = $('#OldPassword').val();
  const newPassword = $('#NewPassword').val();
  const confirmPassword = $('#ConfirmPassword').val();
  $("#checkNewPassword").html("").css('color', 'red');
  $("#NewPassword").css('border-color', '');
  $("#checkOldPassword").html("").css('color', 'red');
  $("#OldPassword").css('border-color', '');
  $("#checkmessage").html("").css('color', 'red');
  $("#ConfirmPassword").css('border-color', '');
  $.ajax({
    url:"checkpassword.php",
    method:"POST",
    data: {username:username,password:password},
    dataType: 'json',
    success:function(data){
      const Pass = data.credentialsMatch; //2 is passed and 5 is wrong password
      if(Pass == 2){
        if(password == newPassword){
          $("#checkNewPassword").html("Opps! You cannot use your previous password as the new password. Please choose a different password to ensure account security.").css('color', 'red');
          $("#NewPassword").css('border-color', 'red');
        }else if(confirmPassword != newPassword){
          $("#checkmessage").html("Error: The confirmed password does not match the new password. Please re-enter both fields.").css('color', 'red');
          $("#ConfirmPassword").css('border-color', '');
        }else{
        var formData = new FormData(frmProfileChangePass);
          $.ajax({
            url:"profileChangePassword.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              const msg = data.msg;
              const stat = data.status;
              if(stat == "success"){
                  $('#modalNotif-header').text('Great! Success.');
                  $('#modalNotif-message').text(msg);
                  $('#modalNotif').modal('show');
              }else{
                  $('#alertMessage').text(msg);
                  $('#modalAlert').modal('show'); 
              }
            },
            processData: false,
            contentType: false
          }); 
        }
      }else{
        $("#checkOldPassword").html("The current password you entered does not match our records. Please verify and try again.").css('color', 'red');
        $("#OldPassword").css('border-color', 'red');
      }
    }
  });
});
function byBirth(){
  var byBirth = document.getElementById("chkByBirth");
  if(byBirth.checked ==true){
    $("#DualCitizenCountry").attr("disabled",false);
    $("#chkByNaturalization").prop('checked', false);
  }else{
      
    $("#DualCitizenCountry").attr("disabled",true);
    // $("#DualCitizenCountry").remove();
  }
}
function byNaturalization(){
  var byNaturalization = document.getElementById("chkByNaturalization");
  if (byNaturalization.checked ==true){
    $("#DualCitizenCountry").attr("disabled",false);
    $("#chkByBirth").prop('checked', false);
  }else{
    // $("#DualCitizenCountry").val().trigger('change');
    $("#DualCitizenCountry").attr("disabled",true);
  }
}
function careerPresentCheck(){
  var careerPresent = document.getElementById("careerPresent");
  if (careerPresent.checked ==true){
    $("#careerDateTo").val('');
    $("#careerDateTo").attr('required', false);
  }else{
    $("#careerDateTo").attr('required', 'required');
  }
}
function FBMember(){  
  var selectValue = $("#relation").val();
  if(selectValue >1){
    $("#divSpouseFields").hide();
    $("#FBoccupation").attr("disabled",true);
    $("#FBBusinessName").attr("disabled",true);
    $("#FBBusinessAddress").attr("disabled",true);
    $("#FBTelephoneNo").attr("disabled",true);
  }else{
    $("#divSpouseFields").show();
  }
}
function PeriodTo(){
  const selected_educLevel = $("#acadEducLevel").val();
  const periodTo = $("#acadPeriodTo").val();
  if(selected_educLevel ==1){
    $('#acadYearGraduated').val(periodTo).trigger("change");
  }else if(selected_educLevel ==2){
    $('#acadYearGraduated').val(periodTo).trigger("change");
  }
}
function resetFrmEducBackground(){
  $("#acadNameSchool").attr('required','required');
  $("#acadNameSchool").prop('disabled', false);
  $("#txtFilter").hide();
  $("#txtFilter").attr('required',false);
  $("#acadHighestLevel").val('');
  $("#acadHighestLevel").attr('readonly',false);
  $("#acadMOV").attr('required','required');
  $("#acadYearGraduated").attr('required',false);
  $('#acadYearGraduated').val('').trigger("change");
  $("#acadMOV").attr('disabled',false); //set upload file to disabled
  $("#divAcadMOV").show();
}
function EducLevel(){
  resetFrmEducBackground();
  var selectLevelValue = $("#acadEducLevel").val();
  if(selectLevelValue ==1){
    $("#acadDegree").html('<option value="1">PRIMARY EDUCATION</option>'); //set acad degree dropdown option
    $("#acadHighestLevel").val('GRADUATED'); //set highest level value
    $("#acadHighestLevel").attr('readonly','readonly'); // set readonly highest level
    $("#acadMOV").attr('disabled','disabled'); //set upload file to disabled
    $("#divAcadMOV").hide();
    $("#acadYearGraduated").attr('required','required'); // set year graduated to required field
    $("#acadNameSchool").prop('disabled', true);
    $("#acadNameSchool").attr('required',false);
    $("#txtFilter").attr('required','required');
    $("#txtFilter").show();
  }else if(selectLevelValue ==2){
    $("#acadDegree").html('<option value="1">SECONDARY EDUCATION</option>'); //set acad degree dropdown option
    $("#acadHighestLevel").val('GRADUATED'); //set highest level value
    $("#acadHighestLevel").attr('readonly','readonly'); // set readonly highest level
    $("#acadMOV").attr('disabled','disabled'); //set upload file to disabled
    $("#divAcadMOV").hide();
    $("#acadYearGraduated").attr('required','required'); // set year graduated to required field
    $("#acadNameSchool").prop('disabled', true);
    $("#acadNameSchool").attr('required',false);
    $("#txtFilter").attr('required','required');
    $("#txtFilter").show();
  }else if(selectLevelValue ==3){
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{optionCollegeCourse:0},
      success:function(data){
          $('#acadDegree').html(data);
        }
      });
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{optionCollegeSchool:0},
        success:function(data){
            $('#acadNameSchool').html(data);
          }
        });
  }else if(selectLevelValue ==4){
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{optionTrainingCourse:0},
      success:function(data){
          $('#acadDegree').html(data);
        }
      });
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{optionCollegeSchool:0},
        success:function(data){
            $('#acadNameSchool').html(data);
          }
        });
  }else if(selectLevelValue ==5){
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{optionGraduateStudies:0},
      success:function(data){
          $('#acadDegree').html(data);
        }
      });
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{optionCollegeSchool:0},
        success:function(data){
            $('#acadNameSchool').html(data);
          }
        });
  }else{
    $("#acadDegree").html('<option value="">No Available Option</option>');
    $("#acadNameSchool").html('<option value="">No Available Option</option>');
  }
}
function Others(){
    var selectValue = $("#CivilStatus").val();
    if(selectValue>4){
    $("#OthersCivilStatus").attr("disabled",false);
    }else{
    $("#OthersCivilStatus").val('');
    $("#OthersCivilStatus").attr("disabled",true);
    }
}
function btnAcadViewUploaded(uploadedAcadMOV){
  $('#downloadDocs').attr('href','uploadedMOV/'+uploadedAcadMOV)
  $('#ViewVerifiedMOV').attr('src','uploadedMOV/'+uploadedAcadMOV);
  $('#ViewUploadedMOV').modal('show');
}
function btnEligibilityViewUploaded(uploadedEligibilityMOV){
  $('#downloadDocs').attr('href','uploadedMOV/'+uploadedEligibilityMOV)
  $('#ViewVerifiedMOV').attr('src','uploadedMOV/'+uploadedEligibilityMOV);
  $('#ViewUploadedMOV').modal('show');
}
function btnCareerViewUploaded(uploadedCareerMOV){
  $('#downloadDocs').attr('href','uploadedMOV/'+uploadedCareerMOV)
  $('#ViewVerifiedMOV').attr('src','uploadedMOV/'+uploadedCareerMOV);
  $('#ViewUploadedMOV').modal('show');
}
function btnTrainingViewUploaded(uploadedTrainingMOV){
  $('#downloadDocs').attr('href','uploadedMOV/'+uploadedTrainingMOV)
  $('#ViewVerifiedMOV').attr('src','uploadedMOV/'+uploadedTrainingMOV);
  $('#ViewUploadedMOV').modal('show');
}
function btnSkillsUpdate(getSkills){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getSkills:getSkills},
      success:function(data){
        const SkillsData = JSON.parse(data);
        $('#SkillsID').val(SkillsData['id']);
        $('#updateskillsTitle').val(SkillsData['skills_title']);
        $('#updateSkills').modal('show');
      }
});
}
function btnReferencesUpdate(getRef){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getRef:getRef},
      success:function(data){
        const RefData = JSON.parse(data);
        $('#ReferencesID').val(RefData['id']);
        $('#updateReferencesName').val(RefData['ref_name']);
        $('#updateReferencesAddress').val(RefData['ref_address']);
        $('#updateReferencesMobile').val(RefData['ref_mobile']);
        $('#updateReferences').modal('show');
      }
});
}
function btnNonAcademicUpdate(getNonAcademic){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getNonAcademic:getNonAcademic},
      success:function(data){  
        const NonAcademicData = JSON.parse(data);
        $('#NonAcademicID').val(NonAcademicData['id']);
        $('#updateNonAcademicTitle').val(NonAcademicData['non_academic_title']);
        $('#updateNonAcademic').modal('show');
      }
});
}
function btnDelete(Value){
  var btnValue = Value;
  const array = btnValue.split(",");
  const ID = array[0];
  const PHP = array[1];
  $('#DeleteID').val('');
  $('#DeletePHP').val('');
  $('#DeleteID').val(ID);
  $('#DeletePHP').val(PHP);
  $('#modalConfirmDelete').modal('show');
}
function btnTrainingUpdate(getTraining){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getTraining:getTraining},
      success:function(data){
        const TrainingData = JSON.parse(data);
        $('#TrainingID').val(TrainingData['id']);
        $('#updatetrainingTitle').val(TrainingData['training_title']);
        $('#updatetrainingDateFrom').val(TrainingData['training_date_from']);
        $('#updatetrainingDateTo').val(TrainingData['training_date_to']);
        $('#updatetrainingHours').val(TrainingData['training_hours']);
        $('#updatetrainingType').val(TrainingData['training_type']).trigger("change");
        $('#updatetrainingConductedBy').val(TrainingData['training_conducted_by']);
        const uploadedTrainingMOV = TrainingData['training_uploaded_mov']; //retrieve file name
        $('#currentTrainingFileName').val(uploadedTrainingMOV); //set filename to hidden textbox
        var pdfURL = 'uploadedMOV/'+uploadedTrainingMOV; //pdf directory 
        const iframeTrainingPDF = document.getElementById('UploadedTrainingMOV'); //iframe id
        iframeTrainingPDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
        $('#updateTraining').modal('show');
      }
});
}
  function btnFBUpdate(getFBid){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getFBid:getFBid},
      success:function(data){
        const FBdata = JSON.parse(data);
        const FBrelation = FBdata['relation'];
        const FBSurName = FBdata['surname'];
        const FBFirstName = FBdata['firstname'];
        const FBMiddleName = FBdata['middlename'];
        const FBExtName = FBdata['extname'];
        const FBOccupation = FBdata['occupation'];
        const FBBusiness = FBdata['businessName'];
        const FBBusinessAddress = FBdata['businessAddress'];
        const FBTelephone = FBdata['telephoneNo'];
        const FBbirthday = FBdata['birthday'];
        const FBid = FBdata['id'];
        $("#FBid").val(FBid);
        $("#updateFBSname").val(FBSurName);
        $("#updateFBFname").val(FBFirstName);
        $("#updateFBMname").val(FBMiddleName);
        $("#updateFBExtName").val(FBExtName);
        $("#updateFBDOB").val(FBbirthday);
        $("#updateFBoccupation").val(FBOccupation);
        $("#updateFBBusinessName").val(FBBusiness);
        $("#updateFBBusinessAddress").val(FBBusinessAddress);
        $("#updateFBTelephoneNo").val(FBTelephone);
        $("#updaterelation").val(FBrelation).trigger('change');
        $("#updaterelation").attr("disabled",true);
        $('#updateFB').modal('show');
        if(FBrelation >1){
          $("#divupdateSpouseFields").hide();
          $("#updateFBoccupation").attr("disabled",true);
          $("#updateFBBusinessName").attr("disabled",true);
          $("#updateFBBusinessAddress").attr("disabled",true);
          $("#updateFBTelephoneNo").attr("disabled",true);
        }else{
          $("#divupdateSpouseFields").show();
          $("#updateFBoccupation").attr("disabled",false);
          $("#updateFBBusinessName").attr("disabled",false);
          $("#updateFBBusinessAddress").attr("disabled",false);
          $("#updateFBTelephoneNo").attr("disabled",false);
        }
      }
});
}
function btnAcadUpdate(getAcads){
  $('#UpdateacadHighestLevel').attr('readonly',false);
  $("#UpdateacadYearGraduated").attr('required',false);
  $('#divReuploadMOV').show();
  $("#txtUpdateFilter").attr('required',false);
  $("#txtUpdateFilter").hide();
  $("#UpdateacadNameSchool").prop('disabled',false);
  $("#UpdateacadNameSchool").attr('required','required');
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getAcads:getAcads},
      success:function(data){
        const AcadsData = JSON.parse(data);
        const AcadsLevel = AcadsData['acad_level'];
        const AcadsSchool = AcadsData['acad_school'];
        const AcadsDegree = AcadsData['acad_degree'];
        const AcadsPrimarySchoolID = AcadsData['primary_school_id'];
        const AcadsPrimarySchoolName = AcadsData['primary_school_title'];
        $('#acadsId').val(AcadsData['id']);
        $('#UpdateacadEducLevel').val(AcadsData['acad_level']).trigger('change');
        $('#updateacadEducLevel').attr('readonly','readonly');
        $('#UpdateacadPeriodFrom').val(AcadsData['acad_from']).trigger('change');
        $('#UpdateacadPeriodTo').val(AcadsData['acad_to']).trigger('change');
        $('#UpdateacadYearGraduated').val(AcadsData['acad_year_graduated']).trigger('change');
        $('#UpdateacadHighestLevel').val(AcadsData['acad_highest_level']);
        $('#UpdateacadHonors').val(AcadsData['acad_honors']);
        $('#UpdateacadEducLevelValue').val(AcadsData['acad_level']);
        if(AcadsLevel ==1){ //Elementary
          $("#UpdateacadDegree").html('<option value="1">PRIMARY EDUCATION</option>');
          $('#UpdateacadHighestLevel').attr('readonly','readonly');
          $("#UpdateacadYearGraduated").attr('required','required');
          $("#UpdateacadNameSchool").prop('disabled',true);
          $("#UpdateacadNameSchool").attr('required',false);
          $("#txtUpdateFilter").show();
          $("#txtUpdateID").val(AcadsPrimarySchoolID); 
          $("#txtUpdateFilter").val(AcadsPrimarySchoolName);
          $("#txtUpdateFilter").attr('required','required');
           $('#divReuploadMOV').hide();
            const uploadedMOV = "pdf.pdf"
            $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
            var pdfURL = 'images/'+uploadedMOV; //pdf directory 
            const iframePDF = document.getElementById('UploadedMOV'); //iframe id
            iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#updateAcads').modal('show');
        }else if(AcadsLevel ==2){ //High school
          $("#UpdateacadDegree").html('<option value="1">SECONDARY EDUCATION</option>');
          $('#UpdateacadHighestLevel').attr('readonly','readonly');
          $("#UpdateacadYearGraduated").attr('required','required');
          $("#UpdateacadNameSchool").prop('disabled',true);
          $("#UpdateacadNameSchool").attr('required',false);
          $("#txtUpdateFilter").show();
          $("#txtUpdateID").val(AcadsPrimarySchoolID); 
          $("#txtUpdateFilter").val(AcadsPrimarySchoolName);
          $("#txtUpdateFilter").attr('required','required');
          $('#divReuploadMOV').hide();
            const uploadedMOV = "pdf.pdf"
            $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
            var pdfURL = 'images/'+uploadedMOV; //pdf directory 
            const iframePDF = document.getElementById('UploadedMOV'); //iframe id
            iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
            $('#updateAcads').modal('show');
        }else if(AcadsLevel ==3){ //college
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeSchool:AcadsSchool},
            success:function(data){
                $('#UpdateacadNameSchool').html(data);
              }
            });
            $.ajax({
              url:"includes/functions.php", 
              method:"POST",
              data:{optionCollegeCourse:AcadsDegree},
              success:function(data){
                  $('#UpdateacadDegree').html(data);
                }
              });
          const uploadedMOV = AcadsData['acad_uploaded_mov']; //retrieve file name
          $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
          var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
          const iframePDF = document.getElementById('UploadedMOV'); //iframe id
          iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#updateAcads').modal('show');
        }else if(AcadsLevel ==4){ //vocational
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeSchool:AcadsSchool},
            success:function(data){
                $('#UpdateacadNameSchool').html(data);
              }
            });
            $.ajax({
              url:"includes/functions.php", 
              method:"POST",
              data:{optionTrainingCourse:AcadsDegree},
              success:function(data){
                  $('#UpdateacadDegree').html(data);
                }
              });
          const uploadedMOV = AcadsData['acad_uploaded_mov']; //retrieve file name
          $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
          var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
          const iframePDF = document.getElementById('UploadedMOV'); //iframe id
          iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#updateAcads').modal('show');
        }else{
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeSchool:AcadsSchool},
            success:function(data){
                $('#UpdateacadNameSchool').html(data);
              }
            });
            $.ajax({
              url:"includes/functions.php", 
              method:"POST",
              data:{optionGraduateStudies:AcadsDegree},
              success:function(data){
                  $('#UpdateacadDegree').html(data);
                }
              });
          const uploadedMOV = AcadsData['acad_uploaded_mov']; //retrieve file name
          $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
          var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
          const iframePDF = document.getElementById('UploadedMOV'); //iframe id
          iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#updateAcads').modal('show');
        }
      }
});
}
function openChangePassword(){
  $('#changePassword').modal('show');
}
function btnEligibilityUpdate(getEligibility){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getEligibility:getEligibility},
      success:function(data){
        const EligibilityData = JSON.parse(data);
        $('#Eligibilityid').val(EligibilityData['id']);
        const credit_eligibility = EligibilityData['eligibility_credentials'];
        $.ajax({
          url:"includes/functions.php", 
          method:"POST",
          data:{eligibility:credit_eligibility},
          success:function(data){
              $('#UpdateeligibilityCredentials').html(data);
            }
          });
          $('#UpdateeligibilityCredentials').attr('disabled','disabled')
        $('#UpdateeligibilityRating').val(EligibilityData['eligibility_rating']);
        $('#UpdateeligibilityExamDate').val(EligibilityData['eligibility_exam_date']);
        $('#UpdateeligibilityPlaceExamination').val(EligibilityData['eligibility_exam_place']);
        $('#UpdateeligibilityNumber').val(EligibilityData['eligibility_license'])
        $('#UpdateeligibilityValidityDate').val(EligibilityData['eligibility_validity_date']);
        const uploadedEligibilityMOV = EligibilityData['eligibility_uploaded_mov']; //retrieve file name
        $('#currentEligibilityFileName').val(uploadedEligibilityMOV); //set filename to hidden textbox
        var pdfEligibilityURL = 'uploadedMOV/'+uploadedEligibilityMOV; //pdf directory 
        const iframeEligibilityPDF = document.getElementById('UploadedEligibilityMOV'); //iframe id
        iframeEligibilityPDF.src = `${pdfEligibilityURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
        $('#updateEligibility').modal('show');
      }
});
}
function btnCareerUpdate(getCareer){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getCareer:getCareer},
      success:function(data){
        const CareerData = JSON.parse(data);
        $('#careerID').val(CareerData['id']);
        $('#UpdatecareerDateFrom').val(CareerData['career_date_from']);
        $('#UpdatecareerGovtService').val(CareerData['career_govt_service']).trigger('change');
        $('#UpdatecareerDateTo').val(CareerData['career_date_to']);
        $('#UpdatecareerPosition').val(CareerData['career_position_title']);      
        $('#UpdatecareerOrganization').val(CareerData['career_organization']);
        $('#UpdatecareerSalary').val(CareerData['career_salary']);
        $('#UpdatecareerCompensention').val(CareerData['career_compensention_level']);
        $('#UpdatecareerStatusAppointment').val(CareerData['career_status_appointment']);
        const uploadedMOV = CareerData['career_uploaded_mov']; //retrieve file name
        $('#currentCareerFileName').val(uploadedMOV); //set filename to hidden textbox
        var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
        const iframeCareerPDF = document.getElementById('UploadedCareerMOV'); //iframe id
        iframeCareerPDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version

        $('#updateCareer').modal('show');
      }
});
}
function btnVoluntaryUpdate(getVoluntary){
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getVoluntary:getVoluntary},
      success:function(data){
        const VoluntaryData = JSON.parse(data);
        $('#voluntaryID').val(VoluntaryData['id']);
        $('#UpdatevoluntaryNAO').val(VoluntaryData['vw_name_address']);
        $('#UpdatevoluntaryDateFrom').val(VoluntaryData['vw_date_from']);
        $('#UpdatevoluntaryDateTo').val(VoluntaryData['vw_date_to']);
        $('#UpdatevoluntaryTotalHrs').val(VoluntaryData['vw_no_hrs']);
        $('#UpdatevoluntaryPosition').val(VoluntaryData['vw_position']);
        $('#updateVoluntary').modal('show');
      }
});
}
$("#contentUpdateFB").on("submit",function(event){
  event.preventDefault();
  const FBSname = $("#updateFBSname").val();
  const FBFname = $("#updateFBFname").val();
  const FBMname = $("#updateFBMname").val();
  const FBbirthday = $("#updateFBDOB").val();
  var selectRelation = $("#updaterelation").val();
  var bday = new Date(FBbirthday);
  var month_diff = Date.now() - bday.getTime();
  var age_dt = new Date(month_diff); 
  var year = age_dt.getUTCFullYear();
  var age = Math.abs(year - 1970);
  validatePass = 1;

  $("#CheckupdateFBSname").html("");
  $("#updateFBSname").css('border-color', '');
  $("#CheckupdateFBFname").html("");
  $("#updateFBFname").css('border-color', '');
  $("#CheckupdateFBMname").html("");
  $("#updateFBMname").css('border-color', '');
  $("#updateCheckFBDOB").html("");
  if(selectRelation !=2 && age < 18){
    $("#updateCheckFBDOB").html("Please furnish a valid date of birth ensuring the individual is aged 18 years or older.").css('color', 'red');
    validatePass = 0;
    $("#updateFB").modal({"backdrop": "static"});
  }
  if(FBSname.length<2){
    $("#CheckupdateFBSname").html("Please enter first name atleast 2 characters.").css('color', 'red');
    $("#updateFBSname").css('border-color', 'red');
    $("#updateFBSname").focus();
    validatePass = 0;
    $("#updateFB").modal({"backdrop": "static"});
  }
  if(FBFname.length <2){
    $("#CheckupdateFBFname").html("Please enter last name atleast 2 characters.").css('color', 'red');
    $("#updateFBFname").css('border-color', 'red');
    $("#updateFBFname").focus();
    validatePass = 0;
    $("#updateFB").modal({"backdrop": "static"});
  }
  if(FBMname.length !='' && FBMname.length <2 ){
    $("#CheckupdateFBMname").html("Please enter middle name atleast 2 characters.").css('color', 'red');
    $("#updateFBMname").css('border-color', 'red');
    $("#updateFBMname").focus();
    validatePass = 0;
    $("#updateFB").modal({"backdrop": "static"});
  }
  if (validatePass ==1){
  
    var formData = new FormData(contentUpdateFB);
    $.ajax({
      url:"familyBackgroundUpdate.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#updateFB').modal('hide');
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
  }
});
$('#contentUpdateAcads').on("submit",function(event){
  event.preventDefault();
  const acadPeriodFrom = $("#UpdateacadPeriodFrom").val();
  const acadPeriodTo = $("#UpdateacadPeriodTo").val();
  const acadLevel = $("#UpdateacadEducLevel").val();
  const totalYear = (acadPeriodTo-acadPeriodFrom);
  const acadYearGraduated = $("#UpdateacadYearGraduated").val();

  $("#CheckUpdateacadPeriodTo").html("");
  $("#CheckUpdateacadYearGraduated").html("");
  $("#UpdateacadPeriodTo").css('border-color', '');
  $("#UpdateacadPeriodFrom").css('border-color', '');
  $("#UpdateacadYearGraduated").css('border-color', '');

  if(acadPeriodFrom >= acadPeriodTo){
    $("#CheckUpdateacadPeriodTo").html("Date error: Please verify the encoded year").css('color', 'red');
    $("#UpdateacadPeriodTo").focus();
  }else if(acadLevel ==1 && totalYear<6){
    $("#CheckUpdateacadPeriodTo").html("Date error: Please note that the encoded year of attendance is not equivalent to 6 years.").css('color', 'red');
    $("#UpdateacadPeriodTo").focus();
  }else if(acadYearGraduated != '' && acadYearGraduated != acadPeriodTo){
    $("#CheckUpdateacadYearGraduated").html("Date error: Please verify the encoded year").css('color', 'red');
    $("#UpdateacadYearGraduated").focus();
  }else{
  var formData = new FormData(contentUpdateAcads);
    $.ajax({
      url:"academicUpdate.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#updateAcads').modal('hide');
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
   }
});
$('#frmEligibilitydUpdate').on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmEligibilitydUpdate);
  $.ajax({
    url:"eligibilityUpdate.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              $('#updateEligibility').modal('hide');
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
$('#frmCareerdUpdate').on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmCareerdUpdate);
  $.ajax({
    url:"careerUpdate.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              $('#updateCareer').modal('hide');
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
$('#frmVoluntaryUpdate').on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmVoluntaryUpdate);
  $.ajax({
    url:"voluntaryWorkUpdate.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              $('#updateVoluntary').modal('hide');
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
$('#frmTrainingdUpdate').on("submit",function(event){
  event.preventDefault();
  var formData = new FormData(frmTrainingdUpdate);
  $.ajax({
    url:"trainingUpdate.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              $('#updateTraining').modal('hide');
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
$('#frmSkillsUpdate').on("submit",function(event){
  event.preventDefault();
  const UpdateSkills = $('#updateskillsTitle').val();
  $("#CheckUpdateSkills").html("").css('color', 'red');
  $("#updateskillsTitle").css('border-color', '');
  if(UpdateSkills.length<3){
    $("#CheckUpdateSkills").html("Please input atleast 3 character").css('color', 'red');
    $("#updateskillsTitle").css('border-color', 'red');
  }else{
    var formData = new FormData(frmSkillsUpdate);
    $.ajax({
      url:"skillsUpdate.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#updateSkills').modal('hide');
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
  }
});
$('#frmReferencesUpdate').on("submit",function(event){
  event.preventDefault();
  $('#CheckUpdateReferencesName').html("");
  $('#updateReferencesName').css('border-color','');
  $('#CheckUpdateReferencesAddress').html("");
  $('#updateReferencesAddress').css('border-color','');
  $('#CheckUpdateReferencesMobile').html("");
  $('#updateReferencesMobile').css('border-color','');
  const UpdateRefTelNo = $('#updateReferencesMobile').val();
  const UpdateRefName = $('#updateReferencesName').val();
  const UpdateRefAddress = $('#updateReferencesAddress').val();
  if(UpdateRefName.length<3){
    $('#CheckUpdateReferencesName').html("Please input atleast 3 character").css('color', 'red');
    $('#updateReferencesName').css('border-color','red');
  }else if(UpdateRefAddress.length<3){
    $('#CheckUpdateReferencesAddress').html("Please input atleast 3 character").css('color', 'red');;
    $('#updateReferencesAddress').css('border-color','red');
  }else if((UpdateRefTelNo.length != 11) || ((UpdateRefTelNo.slice(0, 2)) !== "09")){
    $('#CheckUpdateReferencesMobile').html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
    $('#updateReferencesMobile').css('border-color','red');
  }else{
    $.ajax({ //check Ref Number if existed 
      url:"checkExist.php",
      method:"POST",
      data: {RefMobNumber:UpdateRefTelNo},
      dataType: 'json',
      success:function(data){
        const countRefMobile = data.countRefMobile;
        if (countRefMobile){
          $('#CheckUpdateReferencesMobile').html("Oops! It looks like this mobile number has already been assigned to another person. Please double-check and update if necessary.").css('color', 'red');
          $('#updateReferencesMobile').css('border-color','red');
        }else{
        var formData = new FormData(frmReferencesUpdate);
            $.ajax({
              url:"referencesUpdate.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#updateReferences').modal('hide');
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
        }
      }
    });
  }
});
$('#frmNonAcademicUpdate').on("submit",function(event){
  event.preventDefault();
  const UpdatenonAcademic = $('#updateNonAcademicTitle').val();
  $("#CheckUpdateNonAcademic").html("").css('color', 'red');
  $("#updateNonAcademicTitle").css('border-color', '');
  if(UpdatenonAcademic.length<3){
    $("#CheckUpdateNonAcademic").html("Please input atleast 3 character").css('color', 'red');
    $("#updateNonAcademicTitle").css('border-color', 'red');
  }else{
    var formData = new FormData(frmNonAcademicUpdate);
    $.ajax({
      url:"non-academicUpdate.php",
              method:"POST",
              dataType: "json",
              data:formData,
              success:function(data){
                $('#updateNonAcademic').modal('hide');
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
  }
});
$("#frmConfirmDelete").on("submit",function(event){
  $deleteURL = $('#DeletePHP').val();
  event.preventDefault();
  var formData = new FormData(frmConfirmDelete);
  $.ajax({
    url:$deleteURL,
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $('#modalConfirmDelete').modal('hide');
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
$("#frmGovernID").on("submit",function(event){
  event.preventDefault();
  $.ajax({ 
    url:"checkExist.php",
    method:"POST",
    data:{governID:1},
    dataType: 'json',
    success:function(data){
      const GovernID = data.Govern_ID;
      if(GovernID){
        var formData = new FormData(frmGovernID);
        $.ajax({
          url:"governIDUpdate.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
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
      }else{
        var formData = new FormData(frmGovernID);
        $.ajax({
          url:"governIDAdd.php",
          method:"POST",
          dataType: "json",
          data:formData,
          success:function(data){
            const msg = data.msg;
            const stat = data.status;
            if(stat == "success"){
                $('#modalNotif-header').text('Great! Success.');
                $('#modalNotif-message').text(msg);
                $('#modalNotif').modal('show');
            }else{
                $('#modalNotif-header').text('Oppss!');
                $('#modalNotif-message').text(msg);
                $('#modalNotif').modal('show'); 
            }
          },
          processData: false,
          contentType: false
        });
      }
    }
  });
});