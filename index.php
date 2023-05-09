<!DOCTYPE html>
<html>
<head>
<?php
include 'includes/conn_to_ctris.php';
include 'modal/registermodal.php';
   include 'includes/functions.php'; 
?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="includes/scripts.js" async defer></script>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/dtricon.jpg">
    <title>Registration Module</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="includes/add.css">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="" class="navbar-brand"><b>ICTMS - Registration Module</b></a>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <a href="index.php">
                  <span class="hidden-xs"></span>
                </a>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">
<!--CODE OF REGISTRATION HERE-->
            <!--Registration form-->
    <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Employee Information</h3>
            </div>
              <form class="form-horizontal" method="POST">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">LAST NAME</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="AddLastName" name="AddLastName" placeholder="LAST NAME" value="" style="text-transform: uppercase;" required="true" tabindex="1">
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Street</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="AddStreet" name="AddStreet" placeholder="Street" value="" style="text-transform: uppercase;" required="true" tabindex="9">
                        </div>
                        <label for="LastName" class="col-sm-3 control-label">House Number</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="AddHouseNumber" name="AddHouseNumber" placeholder="House #" value="" style="text-transform: uppercase;" required="true" tabindex="10">
                        </div>                        
                      </div>                      
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">FIRST NAME</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="AddFirstName" name="AddFirstName" placeholder="FIRST NAME" value="" style="text-transform: uppercase;" required="true" tabindex="2">
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Region</label>
                        <div class="col-sm-9">
                        <select class="form-control select2" id="AddRegion" name="AddRegion" required="true" tabindex="11">
                          <?php
                           echo fill_region($conn_ctris, null);
                           ?>
                        </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">MIDDLE NAME</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="AddMiddleName" name="AddMiddleName" placeholder="MIDDLE NAME" value="" style="text-transform: uppercase;" required="true" tabindex="3">
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Province</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddProvince" name="AddProvince" required="true" tabindex="12">
                            <option>SELECT REGION FIRST</option>
                          </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">EXT. NAME</label>
                        <div class="col-sm-9">
                                  <select class="form-control select2" id="AddextName" name="AddextName" tabindex="4">
                                    <option value="">--</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="Jr.">Jr</option>
                                    <option value="Sr.">Sr</option>
                                  </select>
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Municipality</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddCity" name="AddCity" required="true" tabindex="13">
                              <option>SELECT PROVINCE FIRST</option>
                          </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">MOBILE NUMBER</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="AddMobileNumber" name="AddMobileNumber" placeholder="MOBILE NUMBER" value="" style="text-transform: uppercase;" required="true" tabindex="5" onkeypress="return NumberOnly(event)">
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Barangay</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddBarangay" name="AddBarangay" required="true" tabindex="14">
                              <option>SELECT MUNICIPALITY FIRST</option>
                          </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>   
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Sex</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddSex" name="AddSex" tabindex="6">
                                    <option value="">--</option>
                                    <option value="1">MALE</option>
                                    <option value="2">FEMALE</option>
                          </select>
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Position</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddPosition" name="AddPosition" required="true" tabindex="15">
                            <?php
                           echo fill_position($conn_ctris, null);
                           ?>
                          </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Birthdate</label>
                        <div class="col-sm-9">
                              <div class="input-group date col-sm-12">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" class="form-control pull-right" name="AddBirthdate" id="AddBirthdate" required="true" tabindex="7">
                              </div>
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Division</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddDivision" name="AddDivision" required="true" tabindex="16">
                            <?php
                           echo fill_division($conn_ctris, null);
                           ?>
                          </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Email Address</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" id="AddEmail" name="AddEmail" placeholder="Email Address" tabindex="8">
                          </div> 
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Unit</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" id="AddUnit" name="AddUnit" required="true" tabindex="17">
                            <option>SELECT DIVISION FIRST</option>
                          </select>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                  <div class="box-header">
                    <h3 class="box-title">Login Credentials</h3>
                  </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="input-group col-sm-12">
                              <label class="col-sm-12"></label>
                                <input type="text" class="form-control col-sm-10" id="EmployeeNumber" name="EmployeeNumber" placeholder="Enter Employee Number" required="true">
                              <label for="DesiredPassword" class="col-sm-6" style="font-size: 15px;">Employee Number</label>
                            </div>                        
                            <div class="input-group has-feedback col-sm-12">
                                <input type="password" class="form-control col-sm-10" id="DesiredPassword" name="DesiredPassword" placeholder="Desired Password" required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                <span class="input-group-addon"><i class="fa fa-eye-slash toggle-DesiredPassword " toggle = "#DesiredPassword"  id="toggleDesiredPassword"></i></span>
                            </div>
                            <label for="DesiredPassword" class="col-sm-6" style="font-size: 15px;">Desired Password</label>
                            <div class="input-group has-feedback col-sm-12">
                                <input type="password" class="form-control col-sm-10" id="ConfirmPassword" name = "ConfirmPassword" placeholder="Confirm Password" required="true">
                                <span class="input-group-addon"><i class="fa fa-eye-slash toggle-ConfirmPassword " toggle = "#ConfirmPassword"  id="toggleConfirmPassword"></i></span>
                            </div>
                            <small id='checkmessage'></small>
                            <label for="ConfirmPassword" class="col-sm-12" style="font-size: 15px;">Confirm Password</label>                            
                        </div>
                        <div class="col-md-6">
                              <div class="col-sm-12" id="message">
                                <h4>Password must contain the following:</h4>
                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number</b></p>
                                <p id="special_char" class="invalid">A <b>special character</b></p>
                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                              </div>                                 
                        </div>                        
                      </div>                                                                                                                                       
                </div> 
                  <div class="box-footer">
                      <div class="col-sm-5">
                        <div class="g-recaptcha" data-sitekey="6Lev7iwhAAAAAIfzMgf0nI47mGKE9tGBnm-bq24r"></div>
                      </div>
                      <div class="col-sm-5">
                        <?php
                          if(isset($_SESSION['error'])){
                            echo "
                              <div class='callout callout-danger text-center mt20'>
                                <p>".$_SESSION['error']."</p> 
                              </div>
                            ";
                            unset($_SESSION['error']);
                          }
                        ?>                            
                      </div>
                        <div class="col-sm-1">
                          <!-- onclick="window.location.href = 'index.php';" -->
                          <!-- <button type="button" class="btn btn-default pull-right" data-toggle = "modal" href ="#AlreadyExist">Already Exist</button>
                          <button type="button" class="btn btn-default pull-right" data-toggle = "modal" href ="#SuccessRegister">Success</button>
                          <button type="button" class="btn btn-default pull-right" data-toggle = "modal" href ="#ErrorRegister">Error</button> -->
                        </div>                  
                        <div class="col-sm-1">
                          <button type="submit" class="btn btn-info pull-right" id="btn_sign_up" name="btn_sign_up">Register</button>
                        </div>
                  </div>
              </form>
          </div>
    </section> 
  
    <!--End Registration form-->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>All right reserved</b>
      </div>
      <strong>Copyright &copy; 2018 ICTMU
    </div>
    <!-- /.container -->
  </footer>
</div>
<script type="text/javascript">
  function NumberOnly(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
</script>

<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<?php
if(isset($_POST['btn_sign_up']))
{
 /* $_SESSION['form_data'] = $_POST;*/
/*CODE*/  
        if(empty($_POST['g-recaptcha-response']))
        {
          $_SESSION['error'] = 'Please verify you are not a robot';
        }

    else
    {
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
      {
        $secret = "6Lev7iwhAAAAAO6bDFL_AcOEBv_TiqdhPT40HPQd";
        $response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      
        $data=json_decode($response);
        if ($data -> success)
        {
            $Add_LastName = strtoupper($_POST['AddLastName']);
            $Add_FirstName = strtoupper($_POST['AddFirstName']);
            $Add_MiddleName = strtoupper($_POST['AddMiddleName']);
            $Add_ExtName = strtoupper($_POST['AddextName']);
            $Add_Mobile_Number = $_POST['AddMobileNumber'];
            $Add_Sex = $_POST['AddSex'];
            $Add_Birthday = $_POST['AddBirthdate'];
            $Add_Email_Address = $_POST['AddEmail'];

            $Add_Street = strtoupper($_POST['AddStreet']);
            $Add_House_Number = strtoupper($_POST['AddHouseNumber']);
            $Add_Region = $_POST['AddRegion'];
            $Add_Province = $_POST['AddProvince'];
            $Add_Municipality = $_POST['AddCity'];
            $Add_Brgy = $_POST['AddBarangay'];
            $Add_Position = $_POST['AddPosition'];
            $Add_Division = $_POST['AddDivision'];
            $Add_Unit = $_POST['AddUnit'];

            $Add_Employee_Number = $_POST['EmployeeNumber'];
            $Add_Password = md5($_POST['ConfirmPassword']);
            
            $Register_Sql = $conn_ctris -> query("SELECT * FROM userprofile WHERE empno = '$Add_Employee_Number'") or die(mysqli_error());
           /* echo $Add_Employee_Number;
            die();*/
              $Add_New_Query = $Register_Sql -> num_rows;
              if($Add_New_Query ==1)
                {
                  echo "
                        <script type='text/javascript'>
                        $(document).ready(function(){
                        $('#AlreadyExist').modal('show');
                        });
                        </script>
                        ";
                }
                  else
                {

                  $InsertQuery = $conn_ctris -> query(
                  "INSERT INTO userprofile(fname,mname,sname,ename,mobile,sex,birthdate,eaddress,street,numAdd,region,province,city,barangay,position,division,unit,empno,password,date_registered,approved,user_level,isLog,last_update)           
                  VALUES('$Add_FirstName','$Add_MiddleName','$Add_LastName','$Add_ExtName','$Add_Mobile_Number','$Add_Sex','$Add_Birthday','$Add_Email_Address','$Add_Street','$Add_House_Number','$Add_Region','$Add_Province','$Add_Municipality','$Add_Brgy','$Add_Position','$Add_Division','$Add_Unit','$Add_Employee_Number','$Add_Password',now(),0,0,0,now());"
                                                    );
                  if($InsertQuery){
                  echo "
                        <script type='text/javascript'>
                        $(document).ready(function(){
                        $('#SuccessRegister').modal('show');
                        });
                        </script>
                        ";
                  }
                  else 
                  {
                  echo "
                        <script type='text/javascript'>
                        $(document).ready(function(){
                        $('#ErrorRegister').modal('show');
                        });
                        </script>
                        ";
                  }
                  
                }                

        }
      }
      else
        {
          $_SESSION['error'] = 'Invalid Captcha';
        }

    }
}



?>
<script type="text/javascript">
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

       
</script>
<script>
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
</script>
<script>
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
</script>
<script>
  $(".toggle-DesiredPassword").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>
<script>
  $(".toggle-ConfirmPassword").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>
<script>
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
  })
</script>
</body>
</html>
