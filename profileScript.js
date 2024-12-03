// const { ajax } = require("jquery");

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
jQuery("#AddRegion").on('change',function(){  //End select Region
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

//kapag meg select barangay

$(function(){
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });
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

$(".loader-div").show();
$.ajax({ //set 3 entry in person references
  url:"checkExist.php",
  method:"POST",
  data:{countReference:1},
  dataType: 'json',
  success:function(data){
    $(".loader-div").hide(); 
    const countReference = data.countRef;
    if(countReference==3){
      $('#frmReferencesAdd').hide(); //hide insert form
      $('#refLimitInfo').show(); //show info
    }
  },error: function(xhr, status, error) {
    modalErrorShow("The system encountered an error. Please contact support.");
    $(".loader-div").hide();
  }
});

$(".loader-div").show();
$.ajax({ //work experience present checkbox hide when already encoded present work
  url:"checkExist.php",
  method:"POST",
  data:{countPresent:1},
  dataType: 'json',
  success:function(data){
    $(".loader-div").hide(); 
    const countPresent = data.countPresent;
    if(countPresent){
      $('#labelCareerPresent').hide();
      $('#careerPresent').hide();
    }
  },error: function(xhr, status, error) {
    modalErrorShow("The system encountered an error. Please contact support.");
    $(".loader-div").hide();
  }
});

  getInfo();
  checkAlreadyEncode(); //check all already recorded  
});

  function getInfo(){
    $(".loader-div").show();
  $.ajax({ //getInfo session populate
      url:"getInfo.php",
      method:"POST",
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
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
          const sameAddress = data.sameAddress;
          if(sameAddress ==1){
            $('#sameAddressCheckbox').prop('checked', true);
            $('#AddPermanentZipCode').attr('readonly',true);
            $('#AddPermanentCity').attr('disabled',true);
            $('#AddPermanentProvince').attr('disabled',true);
            $('#AddPermanentRegion').attr('disabled',true);
            $('#AddPermanentBarangay').attr('disabled',true);
            $('#AddPermanentHouseNumber').attr('readonly',true);
            $('#AddPermanentStreet').attr('readonly',true);
            $('#AddPermanentSubd').attr('readonly',true);
            $('#AddPermanentZipCode').attr('required',false);
          }else{
            $('#sameAddressCheckbox').prop('checked', false);
            $('#AddPermanentZipCode').attr('readonly',false);
            $('#AddPermanentCity').attr('disabled',false);
            $('#AddPermanentProvince').attr('disabled',false);
            $('#AddPermanentRegion').attr('disabled',false);
            $('#AddPermanentBarangay').attr('disabled',false);
            $('#AddPermanentHouseNumber').attr('readonly',false);
            $('#AddPermanentStreet').attr('readonly',false);
            $('#AddPermanentSubd').attr('readonly',false);
            $('#AddPermanentZipCode').attr('required',true);
          }
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

          $(".loader-div").show();
          var update_region_id = region_code;
          $.ajax({  
              url:"includes/functions.php",
              method:"POST",
              data:{update_region_id:update_region_id},
              success:function(data){
                  $(".loader-div").hide(); 
                  $('#AddRegion').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
          });

          $(".loader-div").show();
          var update_province_id = province_code;
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_province_id:update_province_id,Where_region_ID:update_region_id},
            success:function(data){
              $(".loader-div").hide(); 
              $('#AddProvince').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
        });

          $(".loader-div").show();
          var update_city_id = city_code;
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_city_id:update_city_id,Where_province_ID:update_province_id},
            success:function(data){
                $(".loader-div").hide(); 
                $('#AddCity').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });

          $(".loader-div").show();
          var update_barangay_id = brgy_code;
          $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_barangay_id:update_barangay_id,Where_city_ID:update_city_id},
            success:function(data){
              $(".loader-div").hide();
                $('#AddBarangay').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
        });

        // Permanent
        $(".loader-div").show();
        var update_Perm_region_id = permRegion_code;
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_region_id:update_Perm_region_id},
            success:function(data){
              $(".loader-div").hide();
                $('#AddPermanentRegion').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
        });

        $(".loader-div").show();
        var update_Perm_province_id = permProvince_code;
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{update_province_id:update_Perm_province_id,Where_region_ID:update_Perm_region_id},
          success:function(data){
            $(".loader-div").hide();
              $('#AddPermanentProvince').html(data);
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
      });

        $(".loader-div").show();
        var update_Perm_city_id = permCity_code;
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{update_city_id:update_Perm_city_id,Where_province_ID:update_Perm_province_id},
          success:function(data){
            $(".loader-div").hide();
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
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
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

      $(".loader-div").show();
      var citi_country = countryCitizenship;
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{citi_country:citi_country},
        success:function(data){
          $(".loader-div").hide(); 
          $("#DualCitizenCountry").html(data);
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
      });

      $(".loader-div").show();
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{blood_type_id:bloodType},
        success:function(data){
          $(".loader-div").hide(); 
          $("#BloodType").html(data);
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
      });

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

      $(".loader-div").show();
      var pob = birth_place;
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{pob:pob},
        success:function(data){
          $(".loader-div").hide(); 
          $('#PlaceOfBirth').html(data);
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
      });

      $(".loader-div").show();
      var eligibility = '';
      $.ajax({
        url:"includes/functions.php",
        method:"POST",
        data:{eligibility:eligibility},
        success:function(data){
          $(".loader-div").hide(); 
            $('#eligibilityCredentials').html(data);
        },error: function(xhr, status, error) {
          modalErrorShow("The system encountered an error. Please contact support.");
          $(".loader-div").hide();
        }
      });

              //Family Background
              if(civilStatus==1 || civilStatus=='' || civilStatus == null){
                $("#optSpouse").remove();
              }else{
                // $("#relation").append('<option name = "optSpouse" id="optSpouse" value="1">Spouse</option>');
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

              $(".loader-div").show();
              var poi = data.govern_id_place;
              $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{pob:poi},
              success:function(data){
                $(".loader-div").hide(); 
                  $('#GovernIDPlaceIssue').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
            });

      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
  });
  }

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

  function filterNumbersAndDots(evt) {
    const char = String.fromCharCode(evt.which);
    if (!/[0-9.]/.test(char)) {
      evt.preventDefault();
    }
  }

  function UserFamilyBackgroundUpdate (formData){ //update family member action
    const FBSname = $("#updateFBSname").val();
    const FBFname = $("#updateFBFname").val();
    const FBMname = $("#updateFBMname").val();
    const FBbirthday = $("#updateFBDOB").val();
    var selectRelation = $("#updaterelation").val();
    var age = computeBday(FBbirthday);
  
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
      // $("#updateFB").modal({"backdrop": "static"});
    }else if(FBSname.length<2){
      $("#CheckupdateFBSname").html("Please enter first name atleast 2 characters.").css('color', 'red');
      $("#updateFBSname").css('border-color', 'red');
      $("#updateFBSname").focus();
      // $("#updateFB").modal({"backdrop": "static"});
    }else if(FBFname.length <2){
      $("#CheckupdateFBFname").html("Please enter last name atleast 2 characters.").css('color', 'red');
      $("#updateFBFname").css('border-color', 'red');
      $("#updateFBFname").focus();
      // $("#updateFB").modal({"backdrop": "static"});
    }else if(FBMname.length !='' && FBMname.length <2 ){
      $("#CheckupdateFBMname").html("Please enter middle name atleast 2 characters.").css('color', 'red');
      $("#updateFBMname").css('border-color', 'red');
      $("#updateFBMname").focus();
      // $("#updateFB").modal({"backdrop": "static"});
    } else {
      $(".loader-div").show();
      $.ajax({
        url:"familyBackgroundUpdate.php",
        method:"POST",
        dataType: "json",
        data:formData,
        success:function(data){
          $(".loader-div").hide(); 
          $('#updateFB').modal('hide');
          const msg = data.msg;
          const stat = data.status;
          if(stat === "success"){ 
            // /$('#updateFB').modal('hide');
            modalSuccessShow(msg,triggerTableReload,'tblFBMember');
            resetFormFamilyBackground();
            checkAlreadyEncode();
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
  }

function checkAlreadyEncode(){
  $(".loader-div").show();
    $.ajax({ 
      url:"checkExist.php",
      method:"POST",
      data:{employeeNumber:1},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide();
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
            $("#optSpouse").remove();
          }else{
            $.ajax({ 
              url:"checkExist.php",
              method:"POST",
              data:{CivilStatus:1},
              dataType: 'json',
              success:function(data){
                const civilStat = data.civil_status;
                if (spouse == 0  && $("#optSpouse").length === 0 && civilStat !=1) {
                  $("#relation").append('<option name="optSpouse" id="optSpouse" value="1">Spouse</option>');
                }
              }
            });
          }
          if(father>0){
            $("#optFather").remove();
          }else{
            if ($("#optFather").length === 0) {
              $("#relation").append('<option name = "optFather" id="optFather" value="3">Father</option>');
            }
          }
          if(mother>0){
            $("#optMother").remove();
          }else{
            if ($("#optMother").length === 0) {
              $("#relation").append('<option name = "optMother" id="optMother" value="4">Mother</option>');
            }
          }
          const elementary = data.elementary; //for educ background
          const secondary = data.secondary; //for educ background
          if(elementary){
            $("#optElementary").remove();
          }else{
            if ($("#optElementary").length === 0) {
              $("#acadEducLevel").append('<option name = "optElementary" id="optElementary" value="1">Elementary</option>');
            }
          }
          if(secondary){
            $("#optSecondary").remove();
          }else{
            if ($("#optElementary").length === 0) {
            $("#acadEducLevel").append('<option name = "optSecondary" id="optSecondary" value="2">Secondary</option>');
            }
          }
          
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    }); 
}

function resetFormFamilyBackground() {
  $('#frmUserFamilyBackgroundAdd')[0].reset(); // Reset all inputs in the form
  var selectRelation = 0;
  FBMember(selectRelation);
}

function resetFormBasicInfo(){
  $(".loader-div").show();
  clearForm();
  $.ajax({ //getInfo session populate
      url:"getInfo.php",
      method:"POST",
      dataType: 'json',
      success:function(data){
          const permhouseNo = data.permNumAdd;
          const permstreet = data.permStreet;
          const permRegion_code = data.permRegion;
          const permProvince_code = data.permProvince;
          const permCity_code = data.permCity;
          const permBrgy_code = data.permBarangay;
          const permSubd = data.permSubd;
          const permZipCode = data.permZipCode;
        $(".loader-div").hide(); 
        // Permanent
        $(".loader-div").show();
        $("#AddPermanentHouseNumber").val(permhouseNo);
          $("#AddPermanentStreet").val(permstreet);
          $("#AddPermanentSubd").val(permSubd);
          $("#AddPermanentZipCode").val(permZipCode);
        var update_Perm_region_id = permRegion_code;
        $.ajax({
            url:"includes/functions.php",
            method:"POST",
            data:{update_region_id:update_Perm_region_id},
            success:function(data){
              $(".loader-div").hide();
                $('#AddPermanentRegion').html(data);
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
        });

        $(".loader-div").show();
        var update_Perm_province_id = permProvince_code;
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{update_province_id:update_Perm_province_id,Where_region_ID:update_Perm_region_id},
          success:function(data){
            $(".loader-div").hide();
              $('#AddPermanentProvince').html(data);
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
      });

        $(".loader-div").show();
        var update_Perm_city_id = permCity_code;
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{update_city_id:update_Perm_city_id,Where_province_ID:update_Perm_province_id},
          success:function(data){
            $(".loader-div").hide();
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
          },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
      });
      }
  });
}

function UserBasicInfoUpdate(formData){ //add/update basic information
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


  if(street.length > 0 && street.length<5){
    $("#CheckAddStreet").html("Please enter a Street with at least 5 characters.").css('color', 'red');
    $("#AddStreet").css('border-color', 'red');
    $("#AddStreet").focus();
  }else if(permStreet.length !='' && permStreet.length<5){
        $("#CheckAddPermanentStreet").html("Please enter a Street with at least 5 characters.").css('color', 'red');
        $("#AddPermanentStreet").css('border-color', 'red');
        $("#AddPermanentStreet").focus();
  }else if((mobile_no.length != 11) || ((mobile_no.slice(0, 2)) !== "09")){
      $("#CheckAddMobileNo").html("The mobile number should adhere to the format starting with '09' and must consist of precisely 11 digits.").css('color', 'red');
      $("#AddMobileNo").css('border-color', 'red');
      $("#AddMobileNo").focus();
  } else {
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
          $("#CheckAddEmail").html("");
          $("#CheckAddEmail").html("The email address provided has already been used.").css('color', 'red');
        }else if(uniqueMobile > 0){
          $("#CheckAddMobileNo").html("");
          $("#CheckAddMobileNo").html("The mobile number provided has already been used.").css('color', 'red');
        } else {
          $(".loader-div").show();
          $.ajax({ 
            url:"checkExist.php",
            method:"POST",
            data:{BasicInfo:1},
            dataType: 'json',
            success:function(data){
              $(".loader-div").hide(); 
              const BasicInfo = data.Basic_Info;
              if(BasicInfo){
                $.ajax({
                url:"basicInfoUpdate.php",
                method:"POST",
                dataType: "json",
                data:formData,
                success:function(data){
                  $(".loader-div").hide(); 
                  const msg = data.msg;
                  const stat = data.status;
                  if(stat === "success"){ 
                    modalSuccessShow(msg,resetFormBasicInfo,'');
                  } else {
                    modalErrorShow(msg);
                  }
                },
                processData: false,
                contentType: false
                }); 
              } else {
                $(".loader-div").show();
                $.ajax({
                url:"basicInfoAdd.php",
                method:"POST",
                dataType: "json",
                data:formData,
                success:function(data){
                  $(".loader-div").hide(); 
                  const msg = data.msg;
                  const stat = data.status;
                  if(stat === "success"){ 
                    modalSuccessShow(msg,reloadFormBasicInfo,'');
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
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
          });
        }
    },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    },
  });
}
  
}

function UserOtherBasicInfoUpdate(formData){
  const gsis = $('#gsisNo').val();
  const pagibig = $('#pagibigNo').val();
  const philhealth = $('#philhealthNo').val();
  const sss = $('#sssNo').val();
  const tin = $('#tinNo').val();


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

  $(".loader-div").show();
  $.ajax({ //check ID Number if existed 
    url:"checkExist.php",
    method:"POST",
    data: {gsis:gsis,pagibig:pagibig,philhealth:philhealth,sss:sss,tin:tin},
    dataType: 'json',
    success:function(data){
      $(".loader-div").hide(); 
        const UniqueGSIS = data.gsis;
        const UniquePAGIBIG = data.pagibig;
        const UniquePHILHEALTH = data.philhealth;
        const UniqueSSS = data.sss;
        const UniqueTIN = data.tin;
        if(UniqueGSIS >0){
            $("#CheckGSIS").html("The ID Number provided has already been used.").css('color', 'red');
            $("#gsisNo").css('border-color', 'red');
        }else if(UniquePAGIBIG >0){
          $("#CheckPAGIBIG").html("The ID Number provided has already been used.").css('color', 'red');
          $("#pagibigNo").css('border-color', 'red');
        }else if(UniquePHILHEALTH >0){
          $("#CheckPHILHEALTH").html("The ID Number provided has already been used.").css('color', 'red');
          $("#philhealthNo").css('border-color', 'red');
        }else if(UniqueSSS >0){
          $("#CheckSSS").html("The ID Number provided has already been used.").css('color', 'red');
          $("#sssNo").css('border-color', 'red');
        }else if(UniqueTIN >0){
          $("#CheckTIN").html("The ID Number provided has already been used.").css('color', 'red');
          $("#tinNo").css('border-color', 'red');
        } else {
          $(".loader-div").show();
          $.ajax({ 
            url:"checkExist.php",
            method:"POST",
            data:{BasicOtherInfo:1},
            dataType: 'json',
            success:function(data){
              $(".loader-div").hide(); 
              const BasicOtherInfo = data.Basic_Other_Info;
              if(BasicOtherInfo){
                $(".loader-div").show();
                  $.ajax({
                  url:"otherInfoUpdate.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,clearForm);
                      getInfo();
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
              } else {
                $(".loader-div").show();
                $.ajax({
                  url:"otherInfoAdd.php",
                  method:"POST",
                  dataType: "json",
                  data:formData,
                  success:function(data){
                    $(".loader-div").hide(); 
                    const msg = data.msg;
                    const stat = data.status;
                    if(stat === "success"){ 
                      modalSuccessShow(msg,clearForm)
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
            },error: function(xhr, status, error) {
              modalErrorShow("The system encountered an error. Please contact support.");
              $(".loader-div").hide();
            }
            });
        }
    },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }, 
  });
}

function byBirth(){
  var byBirth = document.getElementById("chkByBirth");
  if(byBirth.checked ==true){
    $("#DualCitizenCountry").attr("disabled",false);
    $("#chkByNaturalization").prop('checked', false);
    $("#lblDualCitizenCountry").attr('class','col-sm-12 requiredField');
  }else{
    $("#lblDualCitizenCountry").attr('class','col-sm-12');
    $("#DualCitizenCountry").attr("disabled",true);
  }
}

function byNaturalization(){
  var byNaturalization = document.getElementById("chkByNaturalization");
  if (byNaturalization.checked ==true){
    $("#DualCitizenCountry").attr("disabled",false);
    $("#chkByBirth").prop('checked', false);
    $("#lblDualCitizenCountry").attr('class','col-sm-12 requiredField');
  }else{
    $("#lblDualCitizenCountry").attr('class','col-sm-12');
    $("#DualCitizenCountry").attr("disabled",true);
  }
}

function Others(){
  var selectValue = $("#CivilStatus").val();
  if(selectValue>4){
  $("#OthersCivilStatus").attr("disabled",false);
  $("#lblOthersCivilStatus").attr('class','col-sm-12 requiredField');
  }else{
  $("#lblOthersCivilStatus").attr('class','col-sm-12');
  $("#OthersCivilStatus").val('');
  $("#OthersCivilStatus").attr("disabled",true);
  }
}

function FBMember(value) {

  if (value == 1) { // If "Spouse" is selected
      $("#divSpouseFields").show(); // Hide the spouse-related fields container
      // Disable all related fields in a single line
      $("#FBoccupation, #FBBusinessName, #FBBusinessAddress, #FBTelephoneNo").attr("disabled", false);
  } else {
      $("#divSpouseFields").hide(); // Show the spouse-related fields container
      // Enable all related fields in a single line
      $("#FBoccupation, #FBBusinessName, #FBBusinessAddress, #FBTelephoneNo").attr("disabled", true);
  }
}

function UserFamilyBackgroundAdd(formData){
  const FBSname = $("#FBSname").val();
  const FBFname = $("#FBFname").val();
  const FBMname = $("#FBMname").val();
  const FBbirthday = $("#FBDOB").val();
  var selectRelation = $("#relation").val();
  var age = computeBday(FBbirthday);

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
  }else if(FBSname.length<2){
    $("#CheckFBSname").html("Please enter last name atleast 2 characters.").css('color', 'red');
    $("#FBSname").css('border-color', 'red');
    $("#FBSname").focus();
  }else if(FBFname.length <2){
    $("#CheckFBFname").html("Please enter first name atleast 2 characters.").css('color', 'red');
    $("#FBFname").css('border-color', 'red');
    $("#FBFname").focus();
  }else if(FBMname.length !='' && FBMname.length <2 ){
    $("#CheckFBMname").html("Please enter middle name atleast 2 characters.").css('color', 'red');
    $("#FBMname").css('border-color', 'red');
    $("#FBMname").focus();
  } else {
    $(".loader-div").show();
    $.ajax({
      url:"familyBackgroundAdd.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,'tblFBMember');
          resetFormFamilyBackground();
          checkAlreadyEncode();
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
}

function btnFBUpdate(getFBid){ //open modal family update
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getFBid:getFBid},
      success:function(data){
        $(".loader-div").hide(); 
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
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}

function EducLevel(selectLevelValue){
  resetFrmEducBackground();
  if(selectLevelValue ==1){
    $('#divifGraduated').hide();
    $("#ifGraduated").prop('checked', true);
    $('#lblacadYearGraduated').attr('class','col-sm-12 requiredField');
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
    $("#ifGraduated").prop('checked', true);
    $('#divifGraduated').hide();
    $('#lblacadYearGraduated').attr('class','col-sm-12 requiredField');
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
    $('#divifGraduated').show();
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
    $("#divAcadMOV").hide();
    $("#acadDegree").html('<option value="">No Available Option</option>');
    $("#acadNameSchool").html('<option value="">No Available Option</option>');
    $("#acadDegree").html('<option value="">SELECT EDUCATIONAL LEVEL FIRST</option>');
  }
}

function resetFrmEducBackground(){
  // $('#frmUserAcademicAdd')[0].reset();
  $("#ifGraduated").prop('checked', false);
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
  $('#divifGraduated').hide();
  // $('#acadDegree').val('').trigger('change');
  $('#acadPeriodFrom').val('').trigger('change');
  $('#acadPeriodTo').val('').trigger('change');
  $('#lblacadYearGraduated').attr('class','col-sm-12');
  $("#acadDegree").html('<option value="">SELECT EDUCATIONAL LEVEL FIRST</option>');
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

function UserAcadacemicAdd(formData){
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
  }else if($('#ifGraduated').prop('checked') && acadYearGraduated != acadPeriodTo){
    $("#CheckacadYearGraduated").html("Date error: Please verify the encoded year").css('color', 'red');
    $("#acadPeriodTo").css('border-color', 'red');
    $("#acadYearGraduated").css('border-color', 'red');
    $("#acadYearGraduated").focus();
  }else{
    $(".loader-div").show();
    $.ajax({
      url:"academicAdd.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){
          modalSuccessShow(msg,triggerTableReload,'tblAcads');
          resetFrmEducBackground();
          checkAlreadyEncode();
          $('#acadEducLevel').val('').trigger('change');
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
}

function btnAcadUpdate(getAcads){
  $(".loader-div").show();
  $('#divifGraduatedUpdate').hide();
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
        $(".loader-div").hide(); 
        const AcadsData = JSON.parse(data);
        const AcadsLevel = AcadsData['acad_level'];
        const AcadsSchool = AcadsData['acad_school'];
        const AcadsDegree = AcadsData['acad_degree'];
        const AcadsifGraduated = AcadsData['ifGraduated'];
        const AcadsPrimarySchoolID = AcadsData['primary_school_id'];
        const AcadsPrimarySchoolName = AcadsData['primary_school_title'];
        if(AcadsifGraduated ==1){
          $('#UpdateifGraduated').prop('checked',true);
          $("#lblUpdateacadYearGraduated").attr('class','col-sm-12 requiredField');
          $('#UpdateacadYearGraduated').attr('required',true);
          $('#UpdateacadHighestLevel').val('GRADUATED');
          $('#UpdateacadHighestLevel').attr('readonly',true);
        } else {
          $('#UpdateifGraduated').prop('checked',false);
          $("#lblUpdateacadYearGraduated").attr('class','col-sm-12');
          $('#UpdateacadYearGraduated').attr('required',false);
          $('#UpdateacadHighestLevel').val('');
          $('#UpdateacadHighestLevel').attr('readonly',false);
        }
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
          $(".loader-div").show();
          $('#divifGraduatedUpdate').show();
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeSchool:AcadsSchool},
            success:function(data){
              $(".loader-div").hide(); 
                $('#UpdateacadNameSchool').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
          });
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeCourse:AcadsDegree},
            success:function(data){
              $(".loader-div").hide();
                $('#UpdateacadDegree').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
          });
          const uploadedMOV = AcadsData['acad_uploaded_mov']; //retrieve file name
          $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
          var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
          const iframePDF = document.getElementById('UploadedMOV'); //iframe id
          iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#updateAcads').modal('show');
        }else if(AcadsLevel ==4){ //vocational
          $('#divifGraduatedUpdate').show();
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeSchool:AcadsSchool},
            success:function(data){
                $('#UpdateacadNameSchool').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
            });
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionTrainingCourse:AcadsDegree},
            success:function(data){
                $('#UpdateacadDegree').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
              }
            });
          const uploadedMOV = AcadsData['acad_uploaded_mov']; //retrieve file name
          $('#currentAcadsFileName').val(uploadedMOV); //set filename to hidden textbox
          var pdfURL = 'uploadedMOV/'+uploadedMOV; //pdf directory 
          const iframePDF = document.getElementById('UploadedMOV'); //iframe id
          iframePDF.src = `${pdfURL}?t=${new Date().getTime()}`; //embed the url pdf to iframe with time value to get the latest version
          $('#updateAcads').modal('show');
        }else{
          $('#divifGraduatedUpdate').show();
          $.ajax({
            url:"includes/functions.php", 
            method:"POST",
            data:{optionCollegeSchool:AcadsSchool},
            success:function(data){
                $('#UpdateacadNameSchool').html(data);
              },error: function(xhr, status, error) {
                modalErrorShow("The system encountered an error. Please contact support.");
                $(".loader-div").hide();
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
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}

function UserAcadsUpdate(formData){
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
  }else if($('#UpdateifGraduated').prop('checked') && acadYearGraduated != acadPeriodTo){
    $("#CheckUpdateacadYearGraduated").html("Date error: Please verify the encoded year").css('color', 'red');
    $("#UpdateacadYearGraduated").focus();
  }else{
    $(".loader-div").show();
    $.ajax({
      url:"academicUpdate.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide();
        $('#updateAcads').modal('hide');
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){ 
          modalSuccessShow(msg,triggerTableReload,'tblAcads');
          checkAlreadyEncode();
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
}

function UserEligibilitydAdd(formData){
  $(".loader-div").show();
  $.ajax({
    url:"eligibilityAdd.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide(); 
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        modalSuccessShow(msg,triggerTableReload,'tblEligibility');
        $('#frmUserEligibilitydAdd')[0].reset();
        $('#eligibilityCredentials').val('').trigger('change');

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

function checkUpdateEligibility(eligibilityValue){
  $('#UpdateeligibilityRating').attr('readonly',true);
  $('#UpdateeligibilityRating').attr('required',false);
  $('#lblUpdateeligibilityRating').attr('class','col-sm-12'); 
  $('#UpdateeligibilityNumber').attr('required',false);
  $('#UpdateeligibilityNumber').attr('readonly',true);
  $('#lblUpdateeligibilityNumber').attr('class','col-sm-12');
  $('#UpdateeligibilityValidityDate').attr('required',false);
  $('#UpdateeligibilityValidityDate').attr('readonly',true);
  $('#lblUpdateeligibilityValidityDate').attr('class','col-sm-12');
  if(eligibilityValue ==1 || eligibilityValue ==2 || eligibilityValue ==3){
    $('#UpdateeligibilityRating').attr('readonly',false);
    $('#UpdateeligibilityRating').attr('required',true);
    $('#lblUpdateeligibilityRating').attr('class','col-sm-12 requiredField');
  }else if(eligibilityValue==10){
    $('#UpdateeligibilityRating').attr('readonly',false);
    $('#UpdateeligibilityRating').attr('required',true);
    $('#lblUpdateeligibilityRating').attr('class','col-sm-12 requiredField');    
    $('#UpdateeligibilityNumber').attr('required',true);  
    $('#UpdateeligibilityNumber').attr('readonly',false);
    $('#lblUpdateeligibilityNumber').attr('class','col-sm-12 requiredField');
    $('#UpdateeligibilityValidityDate').attr('required',true);
    $('#UpdateeligibilityValidityDate').attr('readonly',false);
    $('#lblUpdateeligibilityValidityDate').attr('class','col-sm-12 requiredField');
  }
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
        checkUpdateEligibility(credit_eligibility);
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

function UserEligibilitydUpdate(formData){
  $(".loader-div").show();
  $.ajax({
    url:"eligibilityUpdate.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide();
      $('#updateEligibility').modal('hide');
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){ 
        modalSuccessShow(msg,triggerTableReload,'tblEligibility');
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

function UserCareerdAdd(formData){
  $(".loader-div").show();
  $.ajax({
    url:"careerAdd.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        modalSuccessShow(msg,triggerTableReload,'tblcareer');
        $('#frmUserCareerdAdd')[0].reset();
        $('#careerGovt').val('').trigger('change');
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

function btnCareerViewUploaded(uploadedCareerMOV){
  $('#downloadDocs').attr('href','uploadedMOV/'+uploadedCareerMOV)
  $('#ViewVerifiedMOV').attr('src','uploadedMOV/'+uploadedCareerMOV);
  $('#ViewUploadedMOV').modal('show');
}

function btnCareerUpdate(getCareer){
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getCareer:getCareer},
      success:function(data){
        $(".loader-div").hide(); 
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
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}

function UserCareerUpdate(formData){
  $(".loader-div").show();
  $.ajax({
    url:"careerUpdate.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide(); 
      $('#updateCareer').modal('hide');
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
      modalSuccessShow(msg,triggerTableReload,'tblcareer');
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

function UserVoluntaryAdd(formData){
  $(".loader-div").show();
  $.ajax({
    url:"voluntaryWorkAdd.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        modalSuccessShow(msg,triggerTableReload,'tblVoluntary');
        $('#frmUserVoluntaryAdd')[0].reset();
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

function btnVoluntaryUpdate(getVoluntary){
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getVoluntary:getVoluntary},
      success:function(data){
        $(".loader-div").hide(); 
        const VoluntaryData = JSON.parse(data);
        $('#voluntaryID').val(VoluntaryData['id']);
        $('#UpdatevoluntaryNAO').val(VoluntaryData['vw_name_address']);
        $('#UpdatevoluntaryDateFrom').val(VoluntaryData['vw_date_from']);
        $('#UpdatevoluntaryDateTo').val(VoluntaryData['vw_date_to']);
        $('#UpdatevoluntaryTotalHrs').val(VoluntaryData['vw_no_hrs']);
        $('#UpdatevoluntaryPosition').val(VoluntaryData['vw_position']);
        $('#updateVoluntary').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}
 
function UserVoluntaryUpdate(formData){
  $(".loader-div").show();
    $.ajax({
      url:"voluntaryWorkUpdate.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        $('#updateVoluntary').modal('hide');
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){
          modalSuccessShow(msg,triggerTableReload,'tblVoluntary');
          $('#frmUserVoluntaryAdd')[0].reset();
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

function UserTrainingAdd(formData){
  $(".loader-div").show();
  $.ajax({
    url:"trainingAdd.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        modalSuccessShow(msg,triggerTableReload,'tbltraining');
        $('#frmUserTrainingAdd')[0].reset();
        $('#trainingType').val('').trigger('change');
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

function btnTrainingUpdate(getTraining){
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getTraining:getTraining},
      success:function(data){
        const TrainingData = JSON.parse(data);
        $(".loader-div").hide(); 
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
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
} 

function UserTrainingdUpdate(formData){
  $(".loader-div").show();
  $.ajax({
    url:"trainingUpdate.php",
    method:"POST",
    dataType: "json",
    data:formData,
    success:function(data){
      $(".loader-div").hide(); 
      $('#updateTraining').modal('hide');
      const msg = data.msg;
      const stat = data.status;
      if(stat === "success"){
        modalSuccessShow(msg,triggerTableReload,'tbltraining');
        $('#frmUserTrainingdUpdate')[0].reset();
      } else {
        modalErrorShow(msg);
      }
    } ,error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    },
    processData: false,
    contentType: false

  });
}

function UserSkillsAdd(formData){
  $('#checkSkillsTitle').html("");
  $('#skillsTitle').css('border-color','');
  const skillsTitle = $('#skillsTitle').val();
  if(skillsTitle.length<3){
    $('#checkSkillsTitle').html("Please input atleast 3 character").css('color', 'red');
    $('#skillsTitle').css('border-color', 'red');
  }else{
    $(".loader-div").show();
    $.ajax({
      url:"skillsAdd.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){
          modalSuccessShow(msg,triggerTableReload,'tblSkills');
          $('#frmUserSkillsAdd')[0].reset();
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
}

function btnSkillsUpdate(getSkills){
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getSkills:getSkills},
      success:function(data){
        $(".loader-div").hide(); 
        const SkillsData = JSON.parse(data);
        $('#SkillsID').val(SkillsData['id']);
        $('#updateskillsTitle').val(SkillsData['skills_title']);
        $('#updateSkills').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}

function UserSkillsUpdate(formData){
  const UpdateSkills = $('#updateskillsTitle').val();
  $("#CheckUpdateSkills").html("").css('color', 'red');
  $("#updateskillsTitle").css('border-color', '');
  if(UpdateSkills.length<3){
    $("#CheckUpdateSkills").html("Please input atleast 3 character").css('color', 'red');
    $("#updateskillsTitle").css('border-color', 'red');
  }else{
		$(".loader-div").show();
    $.ajax({
      url:"skillsUpdate.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        $('#updateSkills').modal('hide');
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){
          modalSuccessShow(msg,triggerTableReload,'tblSkills');
          $('#frmUserSkillsAdd')[0].reset();
        } else {
          modalErrorShow(msg);
        }
      },
      processData: false,
      contentType: false
    });
  }
}

function UsernonAcademicAdd(formData){
  const nonAcademic = $('#nonAcademicTitle').val();
  $("#CheckNonAcademic").html("").css('color', 'red');
  $("#nonAcademicTitle").css('border-color', '');
  if(nonAcademic.length<3){
    $("#CheckNonAcademic").html("Please input atleast 3 character").css('color', 'red');
    $("#nonAcademicTitle").css('border-color', 'red');
  }else{
		$(".loader-div").show();
    $.ajax({
      url:"non-AcademicAdd.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){ 
        $(".loader-div").hide(); 
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){
          modalSuccessShow(msg,triggerTableReload,'tblnonAcademic');
          $('#frmUsernonAcademicAdd')[0].reset();
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
}

function btnNonAcademicUpdate(getNonAcademic){
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getNonAcademic:getNonAcademic},
      success:function(data){  
        $(".loader-div").hide(); 
        const NonAcademicData = JSON.parse(data);
        $('#NonAcademicID').val(NonAcademicData['id']);
        $('#updateNonAcademicTitle').val(NonAcademicData['non_academic_title']);
        $('#updateNonAcademic').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}

function UserNonAcademicUpdate(formData){
  const UpdatenonAcademic = $('#updateNonAcademicTitle').val();
  $("#CheckUpdateNonAcademic").html("").css('color', 'red');
  $("#updateNonAcademicTitle").css('border-color', '');
  if(UpdatenonAcademic.length<3){
    $("#CheckUpdateNonAcademic").html("Please input atleast 3 character").css('color', 'red');
    $("#updateNonAcademicTitle").css('border-color', 'red');
  }else{
		$(".loader-div").show();
    $.ajax({
      url:"non-academicUpdate.php",
      method:"POST",
      dataType: "json",
      data:formData,
      success:function(data){
        $(".loader-div").hide(); 
        $('#updateNonAcademic').modal('hide');
        const msg = data.msg;
        const stat = data.status;
        if(stat === "success"){
          modalSuccessShow(msg,triggerTableReload,'tblnonAcademic');
          $('#frmUsernonAcademicAdd')[0].reset();
        } else {
          modalErrorShow(msg);
        }
      },
      processData: false,
      contentType: false
    });
  }
}

function UserReferencesAdd(formData){
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
		$(".loader-div").show();
    const RefMobNumber = $('#referencesMobile').val();
    $.ajax({ //check Ref Number if existed 
      url:"checkExist.php",
      method:"POST",
      data: {RefMobNumber:RefMobNumber},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
        const countRefMobile = data.countRefMobile;
        if (countRefMobile){
          $('#checkreferencesMobile').html("Oops! It looks like this mobile number has already been assigned to another person. Please double-check and update if necessary.").css('color', 'red');
          $('#referencesMobile').css('border-color','red');
        }else{
          $(".loader-div").show();
          $.ajax({
            url:"referencesAdd.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              $(".loader-div").hide();
              const msg = data.msg;
              const stat = data.status;
              if(stat === "success"){
                modalSuccessShow(msg,triggerTableReload,'tblReferences');
                $('#frmUserReferencesAdd')[0].reset();
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
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
  }
}

function btnReferencesUpdate(getRef){
  $(".loader-div").show();
  $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{getRef:getRef},
      success:function(data){
        $(".loader-div").hide(); 
        const RefData = JSON.parse(data);
        $('#ReferencesID').val(RefData['id']);
        $('#updateReferencesName').val(RefData['ref_name']);
        $('#updateReferencesAddress').val(RefData['ref_address']);
        $('#updateReferencesMobile').val(RefData['ref_mobile']);
        $('#updateReferences').modal('show');
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
});
}

$(document).on('change','#UpdateifGraduated', function(){
  if ($(this).is(':checked')) {
    $("#lblUpdateacadYearGraduated").attr('class','col-sm-12 requiredField');
    $('#UpdateacadYearGraduated').attr('required',true);
    $('#UpdateacadHighestLevel').val('GRADUATED');
    $('#UpdateacadHighestLevel').attr('readonly',true);
  } else {
    $("#lblUpdateacadYearGraduated").attr('class','col-sm-12');
    $('#UpdateacadYearGraduated').attr('required',false);
    $('#UpdateacadHighestLevel').val('');
    $('#UpdateacadHighestLevel').attr('readonly',false);
  }
});

$(document).on('change','#sameAddressCheckbox',function(){
    $('#AddPermanentZipCode').val('');
    $('#AddPermanentBarangay').val('').trigger('change');
    $('#AddPermanentCity').val('').trigger('change');
    $('#AddPermanentProvince').val('').trigger('change');
    $('#AddPermanentRegion').val('').trigger('change');
    $('#AddPermanentHouseNumber').val('');
    $('#AddPermanentStreet').val('');
    $('#AddPermanentSubd').val('');

  if ($(this).is(':checked')) {
    $('#AddPermanentZipCode').attr('readonly',true);
    $('#AddPermanentCity').attr('disabled',true);
    $('#AddPermanentProvince').attr('disabled',true);
    $('#AddPermanentRegion').attr('disabled',true);
    $('#AddPermanentBarangay').attr('disabled',true);
    $('#AddPermanentHouseNumber').attr('readonly',true);
    $('#AddPermanentStreet').attr('readonly',true);
    $('#AddPermanentSubd').attr('readonly',true);
    $('#AddPermanentZipCode').attr('required',false);
  } else {
    $('#AddPermanentZipCode').attr('required',true);
    $('#AddPermanentZipCode').attr('readonly',false);
    $('#AddPermanentCity').attr('disabled',false);
    $('#AddPermanentProvince').attr('disabled',false);
    $('#AddPermanentRegion').attr('disabled',false);
    $('#AddPermanentBarangay').attr('disabled',false);
    $('#AddPermanentHouseNumber').attr('readonly',false);
    $('#AddPermanentStreet').attr('readonly',false);
    $('#AddPermanentSubd').attr('readonly',false);
   
  }
});

$(document).on('submit','#frmUserBasicInfoUpdate', function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserBasicInfoUpdate);
  PassData.append('sameAddressCheckbox', $('#sameAddressCheckbox').is(':checked') ? 1 : 0);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserBasicInfoUpdate,PassData); 
});

$(document).on('submit','#frmUserOtherInfoUpdate', function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserOtherInfoUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserOtherBasicInfoUpdate,PassData);
});

$(document).on('click','#chkByBirth', function(){
  byBirth();
});

$(document).on('click', '#chkByNaturalization', function(){
  byNaturalization();
});

$(document).on('change', '#CivilStatus', function(){
  Others();
});

$(document).on('input', '#Height', function () {
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)

  // Remove non-numeric characters
  value = value.replace(/[^0-9]/g, "");

  // Prevent the user from entering all zeros (e.g., "000")
  if (/^0+$/.test(value)) {
      value = ""; // Reset the value if it's all zeros
  } else {
      // Automatically add the decimal point after the first digit
      if (value.length > 1) {
          value = value[0] + '.' + value.slice(1); // Insert decimal after the first digit
      }

      // Limit to 2 decimal places
      const decimalIndex = value.indexOf('.');
      if (decimalIndex !== -1 && value.length > decimalIndex + 3) {
          value = value.substring(0, decimalIndex + 3); // Keep 2 digits after the decimal
      }
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('input', '#Weight', function () { 
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)

  // Remove all non-numeric characters except for a decimal point
  value = value.replace(/[^0-9.]/g, "");

  // Prevent entering leading zeros (except for '0.' for decimal values)
  if (value.startsWith("0") && value.length > 1 && value !== "0.") {
      value = value.substring(1); // Remove leading zero
  }

  // Prevent starting with a decimal point (e.g., ".5" is not allowed)
  if (value.startsWith(".")) {
      value = "0" + value; // Prepend 0 if the value starts with a decimal
  }

  // Limit digits before the decimal point to 3
  const decimalIndex = value.indexOf('.');
  if (decimalIndex !== -1) {
      // Limit digits before the decimal to 3
      let integerPart = value.substring(0, decimalIndex);
      if (integerPart.length > 3) {
          integerPart = integerPart.substring(0, 3); // Keep only 3 digits before the decimal
      }
      // Keep the decimal part intact (only 2 digits after the decimal)
      let decimalPart = value.substring(decimalIndex, decimalIndex + 3); // Ensure 2 digits after the decimal

      value = integerPart + decimalPart;
  } else {
      // If no decimal point, limit the integer part to 3 digits
      value = value.substring(0, 3);
  }

  // Ensure the weight is at least 10 kg (if it's below 10 kg, we won't update the input)
  if (parseFloat(value) < 10 && value !== "0.") {
      return; // Do nothing if the weight is below 10 kg
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('input', '#philhealthNo', function () {  //PHILHEALTH FORMAT XX-XXXXXXXXX-X
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)
  
  // Remove all non-numeric characters
  value = value.replace(/\D/g, "");

  // Add dashes after the 2nd and 11th digits
  if (value.length > 2) {
      value = value.substring(0, 2) + "-" + value.substring(2);
  }
  if (value.length > 12) {
      value = value.substring(0, 12) + "-" + value.substring(12);
  }

  // Limit the input to a maximum of 13 characters (XX-XXXXXXXXX-X)
  if (value.length > 14) {
      value = value.substring(0, 14);
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('input', '#sssNo', function () { //SSS FORMAT XX-XXXXXXX-X
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)

  // Remove all non-numeric characters
  value = value.replace(/\D/g, "");

  // Add dash after the 2nd digit
  if (value.length > 2) {
      value = value.substring(0, 2) + "-" + value.substring(2);
  }

  // Add dash after the 9th digit
  if (value.length > 10) {
      value = value.substring(0, 10) + "-" + value.substring(10);
  }

  // Limit the input to a maximum of 12 characters (XX-XXXXXXX-X)
  if (value.length > 12) {
      value = value.substring(0, 12);
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('input', '#pagibigNo', function () { //PAGIBIG FORMAT XXXX-XXXX-XXXX
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)

  // Remove all non-numeric characters
  value = value.replace(/\D/g, "");

  // Add dash after the 2nd digit
  if (value.length > 4) {
      value = value.substring(0, 4) + "-" + value.substring(4);
  }

  // Add dash after the 9th digit
  if (value.length > 9) {
      value = value.substring(0, 9) + "-" + value.substring(9);
  }

  // Limit the input to a maximum of 12 characters (XX-XXXXXXX-X)
  if (value.length > 14) {
      value = value.substring(0, 14);
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('input', '#tinNo', function () { //tin number format XXX-XXX-XXX
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)

  // Remove all non-numeric characters
  value = value.replace(/\D/g, "");

  // Add dash after the 2nd digit
  if (value.length > 3) {
      value = value.substring(0, 3) + "-" + value.substring(3);
  }

  // Add dash after the 9th digit
  if (value.length > 7) {
      value = value.substring(0, 7) + "-" + value.substring(7);
  }

  // Limit the input to a maximum of 12 characters (XX-XXXXXXX-X)
  if (value.length > 11) {
      value = value.substring(0, 11);
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('input', '#gsisNo', function () { //tin number format XXX-XXX-XXX
  let value = $(this).val() || ""; // Get the current input value (or fallback to empty)

  // Remove all non-numeric characters
  value = value.replace(/\D/g, "");

  // Limit the input to a maximum of 12 characters (XX-XXXXXXX-X)
  if (value.length > 10) {
      value = value.substring(0, 10);
  }

  // Update the input field with the formatted value
  $(this).val(value);
});

$(document).on('submit', '#frmUserFamilyBackgroundAdd', function(event){  //trigger submit family background insert
  event.preventDefault();
  var PassData = new FormData(frmUserFamilyBackgroundAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserFamilyBackgroundAdd,PassData);
});

$(document).on('change','#relation', function(){  //onchange function for selecting family member
  var selectRelation = $(this).val();
  FBMember(selectRelation);
});

$(document).on('click', '#btnUserFamilyBackgroundUpdate', function(){ //modal show for family background update
  var  getFBid = $(this).attr('value');
  btnFBUpdate(getFBid);
});

$(document).on('submit', '#frmUserFamilyBackgroundUpdate', function(event){   //trigger update family background
  event.preventDefault();
  var PassData = new FormData(frmUserFamilyBackgroundUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserFamilyBackgroundUpdate,PassData);
});

$(document).on('click', '#btnUserDeleteFamilyBackground', function(){ //delete family background details
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblFBMember';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: resetFormFamilyBackground,
    ActionAfter2: checkAlreadyEncode
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit', '#frmUserAcademicAdd', function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserAcademicAdd);
  PassData.append('ifGraduated', $('#ifGraduated').is(':checked') ? 1 : 0);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserAcadacemicAdd,PassData);
});

$(document).on('change','#acadEducLevel', function(){
  var selectLevelValue = $('#acadEducLevel').val();
EducLevel(selectLevelValue);
});

$(document).on('change','#acadPeriodTo', function(){
  PeriodTo();
});

$(document).on('change','#ifGraduated',function(){
if ($(this).is(':checked')) {
  $("#lblacadYearGraduated").attr('class','col-sm-12 requiredField');
  $('#acadYearGraduated').attr('required',true);
  $('#acadHighestLevel').val('GRADUATED');
  $('#acadHighestLevel').attr('readonly',true);
} else {
  $("#lblacadYearGraduated").attr('class','col-sm-12');
  $('#acadYearGraduated').attr('required',false);
  $('#acadHighestLevel').val('');
  $('#acadHighestLevel').attr('readonly',false);
}
});

$(document).on('click', '#btnUserAcadsUpdate', function(){
  var  getAcads = $(this).attr('value');
  btnAcadUpdate(getAcads);
}); 

$(document).on('submit','#frmUserAcadsUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserAcadsUpdate);
  PassData.append('UpdateifGraduated', $('#UpdateifGraduated').is(':checked') ? 1 : 0);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserAcadsUpdate,PassData);
});

$(document).on('click', '#btnUserAcadsDelete', function(){ //delete family background details
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblAcads';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: resetFrmEducBackground,
    ActionAfter2: checkAlreadyEncode
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('change','#eligibilityCredentials', function(){
  $('#eligibilityRating').attr('readonly',true);
  $('#eligibilityRating').attr('required',false);
  $('#lbleligibilityRating').attr('class','col-sm-12');
  $('#eligibilityNumber').attr('required',false);
  $('#eligibilityNumber').attr('readonly',true);
  $('#lbleligibilityNumber').attr('class','col-sm-12');
  $('#eligibilityValidityDate').attr('required',false);
  $('#eligibilityValidityDate').attr('readonly',true);
  $('#lbleligibilityValidityDate').attr('class','col-sm-12');
  var eligibilityValue = $(this).val();
  if(eligibilityValue ==1 || eligibilityValue ==2 || eligibilityValue ==3){
    $('#eligibilityRating').attr('readonly',false);
    $('#eligibilityRating').attr('required',true);
    $('#lbleligibilityRating').attr('class','col-sm-12 requiredField');
  }else if(eligibilityValue==10){
    $('#eligibilityRating').attr('readonly',false);
    $('#eligibilityRating').attr('required',true);
    $('#lbleligibilityRating').attr('class','col-sm-12 requiredField');    
    $('#eligibilityNumber').attr('required',true);  
    $('#eligibilityNumber').attr('readonly',false);
    $('#lbleligibilityNumber').attr('class','col-sm-12 requiredField');
    $('#eligibilityValidityDate').attr('required',true);
    $('#eligibilityValidityDate').attr('readonly',false);
    $('#lbleligibilityValidityDate').attr('class','col-sm-12 requiredField');
  }
});

$(document).on('submit','#frmUserEligibilitydAdd', function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserEligibilitydAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserEligibilitydAdd,PassData);
});

$(document).on('click','#btnUserAcadViewUploaded',function(){
  var uploadedAcadMOV = $(this).attr('value');
  btnAcadViewUploaded(uploadedAcadMOV)
});

$(document).on('click','#btnUserEligibilityViewUploaded',function(){
  var uploadedEligibilityMOV = $(this).attr('value');
  btnEligibilityViewUploaded(uploadedEligibilityMOV)
});

$(document).on('click','#btnUserEligibilityUpdate', function(){
  var  getEligibility = $(this).attr('value');
  btnEligibilityUpdate(getEligibility)
});

$(document).on('click', '#btnUserEligibilityDelete', function(){ //delete family background details
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblEligibility';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: '',
    ActionAfter2: ''
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit','#frmUserEligibilitydUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserEligibilitydUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserEligibilitydUpdate,PassData);
});

$(document).on('submit','#frmUserCareerdAdd',function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserCareerdAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserCareerdAdd,PassData);
});

$(document).on('click','#btnUserCareerUpdate',function(event){
  var getCareer =  $(this).attr('value');
  btnCareerUpdate(getCareer);
});

$(document).on('submit','#btnUserCareerViewUploaded',function(){
  var uploadedCareerMOV = $(this).attr('value');
  btnCareerViewUploaded(uploadedCareerMOV);
});

$(document).on('submit','#frmUserCareerdUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserCareerdUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserCareerUpdate,PassData);
});

$(document).on('click', '#btnUserCareerDelete', function(){ //delete family background details
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblcareer';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: '',
    ActionAfter2: ''
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit','#frmUserVoluntaryAdd',function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserVoluntaryAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserVoluntaryAdd,PassData);
});

$(document).on('click','#btnUserVoluntaryUpdate',function(event){
  var getVoluntary =  $(this).attr('value');
  btnVoluntaryUpdate(getVoluntary);
});

$(document).on('submit','#frmUserVoluntaryUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserVoluntaryUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserVoluntaryUpdate,PassData);
});

$(document).on('click', '#btnUserVoluntaryDelete', function(){ 
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblVoluntary';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: '',
    ActionAfter2: ''
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit','#frmUserTrainingAdd',function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserTrainingAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserTrainingAdd,PassData);
});

$(document).on('click','#btnUserTrainingUpdate',function(){
  var getTraining =  $(this).attr('value');
  btnTrainingUpdate(getTraining);
});

$(document).on('submit','#frmUserTrainingdUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserTrainingdUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserTrainingdUpdate,PassData);
});

$(document).on('click', '#btnUserTrainingDelete', function(){
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tbltraining';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: '',
    ActionAfter2: ''
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit','#frmUserSkillsAdd',function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserSkillsAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserSkillsAdd,PassData);
});

$(document).on('click','#btnUserSkillsUpdate',function(){
  var getSkills =  $(this).attr('value');
  btnSkillsUpdate(getSkills);
});

$(document).on('submit','#frmUserSkillsUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserSkillsUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserSkillsUpdate,PassData);
});

$(document).on('click', '#btnUserSkillsDelete', function(){
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblSkills';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: '',
    ActionAfter2: ''
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit','#frmUsernonAcademicAdd',function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUsernonAcademicAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UsernonAcademicAdd,PassData);
});

$(document).on('click','#btnUserNonAcademicUpdate',function(){
  var getNonAcademic =  $(this).attr('value');
  btnNonAcademicUpdate(getNonAcademic);
});

$(document).on('submit','#frmUserNonAcademicUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserNonAcademicUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserNonAcademicUpdate,PassData);
});

$(document).on('click', '#btnUserNonAcademicDelete', function(){
  const valueID = $(this).attr('data-valueID');
  const valueURL = $(this).attr('data-valueURL');
  var TableID = 'tblnonAcademic';
  var PassData = {
    valueID:valueID,
    valueURL:valueURL,
    TableID:TableID,
    ActionAfter1: '',
    ActionAfter2: ''
  };
  modalConfirmShow('Would you like to permanently delete this information? This action cannot be undone.',deleteData,PassData);
});

$(document).on('submit','#frmUserReferencesAdd',function(event){
  event.preventDefault();
  var PassData  = new FormData(frmUserReferencesAdd);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserReferencesAdd,PassData);
});

$(document).on('click','#btnUserReferencesUpdate',function(){
  var getRef =  $(this).attr('value');
  btnReferencesUpdate(getRef);
});

$(document).on('submit','#frmUserReferencesUpdate',function(event){
  event.preventDefault();
  var PassData = new FormData(frmUserReferencesUpdate);
  modalConfirmShow('Would you like to confirm and save the changes now?',UserReferencesUpdate,PassData);
});

function UserReferencesUpdate(formData){
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
		$(".loader-div").show();
    $.ajax({ //check Ref Number if existed 
      url:"checkExist.php",
      method:"POST",
      data: {RefMobNumber:UpdateRefTelNo},
      dataType: 'json',
      success:function(data){
        $(".loader-div").hide(); 
        const countRefMobile = data.countRefMobile;
        if (countRefMobile){
          $('#CheckUpdateReferencesMobile').html("Oops! It looks like this mobile number has already been assigned to another person. Please double-check and update if necessary.").css('color', 'red');
          $('#updateReferencesMobile').css('border-color','red');
        }else{
          $(".loader-div").show();
            $.ajax({
            url:"referencesUpdate.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              $(".loader-div").hide(); 
              $('#updateReferences').modal('hide');
              const msg = data.msg;
              const stat = data.status;
                if(stat === "success"){
                  modalSuccessShow(msg,triggerTableReload,'tblReferences');
                  $('#frmUserReferencesAdd')[0].reset();
                } else {
                  modalErrorShow(msg);
                }
              },
              processData: false,
              contentType: false
            });
        }
      },error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });
  }

}
  





  










  



























// event.preventDefault();
// var PassData = new FormData(frmOtherInfoUpdate);
// modalConfirmShow('Would you like to confirm and save the changes now?',UserOtherBasicInfoUpdate,PassData);























    
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

function careerPresentCheck(){
  var careerPresent = document.getElementById("careerPresent");
  if (careerPresent.checked ==true){
    $("#careerDateTo").val('');
    $("#careerDateTo").attr('required', false);
  }else{
    $("#careerDateTo").attr('required', 'required');
  }
}







function btnTrainingViewUploaded(uploadedTrainingMOV){
  $('#downloadDocs').attr('href','uploadedMOV/'+uploadedTrainingMOV)
  $('#ViewVerifiedMOV').attr('src','uploadedMOV/'+uploadedTrainingMOV);
  $('#ViewUploadedMOV').modal('show');
}






function openChangePassword(){
  $('#changePassword').modal('show');
}















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