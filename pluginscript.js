function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
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
  });

  function modalCloseConfirm(){
    $('#confirm_edit').modal('hide');
  };  
  //for Residential
//Kapag meg select Region
  jQuery(document).ready(function() {
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

$( document ).ready(function() {
    $("#ConfirmPassword").keyup(checkPasswordMatch);
  });
  function checkPasswordMatch() {
        var DesiredPassword = $("#DesiredPassword").val();
        var confirmPassword = $("#ConfirmPassword").val();
        if (DesiredPassword != confirmPassword){
            $("#checkmessage").html("Passwords does not match!").css('color', 'red');
            $("#btn_sign_up").attr('disabled', true);
        }else{
            $("#checkmessage").html("Passwords match.").css('color', 'green');
            $("#btn_sign_up").attr('disabled', false);
        }
        if(DesiredPassword=='' || DesiredPassword == '') $("#checkmessage").html("");
    }
    var myInput = document.getElementById("DesiredPassword");
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
    $(".toggle-DesiredPassword").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
      $(".toggle-ConfirmPassword").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

      var empno = '';
      $("#contentsearch").on("submit",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url:"search.php",
          method:"POST",
          dataType: "json",
          data:formData,
          success:function(data){
            empno = data.empno;
            if(data.count == 0){
              $('#WarningMessage').text('New employee number detected! Would you like to register?');
              $('#RegisterConfirm').modal('show');
            }else{
              //Here modal for confirming password
              $("#SearchEmpno").val(empno);
              $('#UpdateMessage').text('This Employee Number is already registered. Please type in your password to continue. Thank you.');
              $('#UpdateConfirm').modal('show'); 
            }
          },
          processData: false,
          contentType: false
        }); 
      });

      //Here
      $("#contentcheck").on("submit",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url:"checkpassword.php",
          method:"POST",
          dataType: "json",
          data:formData,
          success:function(data){
            empno = data.empno;
            if(data.count == 0){
              $('#ErrorPassword').modal('show');
            }else{
              var password = data.password;
              UpdateYes(password);
            }
          },
          processData: false,
          contentType: false
        }); 
      });
      function RegisterYes(){
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
        $('#processType').val('Register');
        $('#RegisterContent').show();
        $('#SearchContent').hide();
        $("#EmployeeNumber").val(empno);
      };

      function UpdateYes(password){
        $.ajax({
          url:"includes/functions.php",
          method:"POST",
          data:{empno:empno},
          success:function(data){
            UpdateInfo = JSON.parse(data);
            $("#AddLastName").val(UpdateInfo["sname"]);
            $("#AddFirstName").val(UpdateInfo["fname"]);
            $("#AddMiddleName").val(UpdateInfo["mname"]);
            $("#AddMobileNumber").val(UpdateInfo["mobile"]);
            $("#AddSex").val(UpdateInfo["sex"]).trigger('change');
            $("#AddextName").val(UpdateInfo["ename"]).trigger('change');
            $("#AddBirthdate").val(UpdateInfo["birthdate"]);
            $("#AddEmail").val(UpdateInfo["eaddress"]);
            $("#AddStreet").val(UpdateInfo["street"]);
            $("#AddHouseNumber").val(UpdateInfo["numAdd"]);
            $("#EmployeeNumber").val(UpdateInfo["empno"]);
            //md5 in jquery
            $("#DesiredPassword").val(password);
            var update_region_id = UpdateInfo["region"];
            $.ajax({
                url:"includes/functions.php",
                method:"POST",
                data:{update_region_id:update_region_id},
                success:function(data){
                    $('#AddRegion').html(data);
                }
            });
            var update_province_id = UpdateInfo["province"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_province_id:update_province_id,Where_region_ID:update_region_id},
              success:function(data){
                  $('#AddProvince').html(data);
              }
          });
            var update_city_id = UpdateInfo["city"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_city_id:update_city_id,Where_province_ID:update_province_id},
              success:function(data){
                  $('#AddCity').html(data);
              }
          });
            var update_barangay_id = UpdateInfo["barangay"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_barangay_id:update_barangay_id,Where_city_ID:update_city_id},
              success:function(data){
                  $('#AddBarangay').html(data);
              }
          });
            var update_position_id = UpdateInfo["position"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_position_id:update_position_id},
              success:function(data){
                  $('#AddPosition').html(data);
              }
          });
            var update_division_id = UpdateInfo["division"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_division_id:update_division_id},
              success:function(data){
                  $('#AddDivision').html(data);
              }
          });
            var update_unit_id = UpdateInfo["unit"];
            $.ajax({
              url:"includes/functions.php",
              method:"POST",
              data:{update_unit_id:update_unit_id,Where_division_ID:update_division_id},
              success:function(data){
                  $('#AddUnit').html(data);
              }
          });
          }
        });
        $('#UpdateConfirm').modal('hide');
        $('#btnSubmit').val('Update');
        $('#processType').val('Update');
        $('#RegisterContent').show();
        $('#SearchContent').hide();
      };



      //January 16, 2024
      $("#contentform").on("submit",function(event){
        event.preventDefault();
        const mobile_no = $('#AddMobileNumber').val();

        if((mobile_no.length != 11) || ((mobile_no.slice(0, 2)) !== "09")){
          $('#alertMessage').text('The mobile number should adhere to the format starting with "09" and must consist of precisely 11 digits.');
          $('#modalAlert').modal('show');
        }else if(!$("#dataConsent").is(":checked")){
          $('#alertMessage').text('You need to agree to our data privacy notice to continue.');
          $('#modalAlert').modal('show');
        }else{
          var formData = new FormData(this);
          $.ajax({
            url:"addnew.php",
            method:"POST",
            dataType: "json",
            data:formData,
            success:function(data){
              const msg = data.msg;
              const stat = data.status;
              if(stat == "success"){
                $('#alertMessageSuccess').text(msg);
                $('#modalAlertSuccess').modal('show');
              }else{
                $('#alertMessage').text(msg);
                $('#modalAlert').modal('show'); 
              }
            },
            processData: false,
            contentType: false
          }); 
        }

      });