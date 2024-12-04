<!DOCTYPE html>
<html>
<head>
<?php
  session_start();
  if (isset($_SESSION["userID"]) && $_SESSION["userID"]){
    header('location: homePage.php');
  }
	$_SESSION["token"] = bin2hex(random_bytes(32));
	$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
// include 'includes/conn_to_ctris.php';
require_once('includes/init.php');
   include 'includes/functions.php'; 
?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="includes/scripts.js" async defer></script>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png">
    <title>Registration Module</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
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
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" href="includes/add.css">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
     <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <style>
    .requiredField{
      color:red;
      font-weight: bold;
      font-size: 18px;
    }
  </style>
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php include 'includes/header.php';?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Main content -->
      <section class="content">
      <div class="register-box">
  	<div class="register-logo">
  		<b>Reset Password</b>
  	</div>
  	   <div class="register-box-body">
            <p class="register-box-msg">
              Reset Password
            </p>
    	    <form  
            id="frmReset" 
            autocomplete="off">
              <div class="form-group has-feedback">
                <div class="input-group col-sm-12">
                  <div class="input-group-addon">
                    <i>
                        <label 
                        style="font-size: 15px; margin:auto" 
                        for="03-">
                            03-
                        </label>
                    </i>
                  </div>
                  <input 
                  type="text" 
                  class="form-control" 
                  name="resetUsername" 
                  id="resetUsername" 
                  placeholder="Employee Number" 
                  value="" 
                  style="text-transform: uppercase;" 
                  required="true" 
                  onkeypress="return NumberOnly(event)" tabindex="1">
                  <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
                </div>
                <small id='checkResetUsername'></small>
              </div>
              <div class="input-group has-feedback"> 
                <input 
                type="password" 
                class="form-control" 
                name="resetPassword" 
                id = "resetPassword" 
                placeholder="Temporary Password" 
                required 
                tabindex="2">
                <span class="input-group-addon">
                    <i class="fa fa-eye-slash toggle-password " 
                    toggle = "#resetPassword"  
                    id="CurrentTogglepassword">
                    </i>
                </span>
              </div>
              <small id='checkResetTempPassword'></small>
              <br>
              <div class="input-group has-feedback">
                <input 
                type="password" 
                class="form-control password-field" 
                name="resetNewPassword" 
                id = "resetNewPassword" 
                placeholder="New Password" 
                required 
                tabindex="2"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                >
                <span class="input-group-addon">
                <i 
                class="fa fa-eye-slash toggle-password" 
                data-target="#resetNewPassword" 
                role="button" 
                aria-label="Toggle password visibility">
                </i>
                </span>
              </div>
              <!--start dropdown message for strong password -->
              <div class="card col-md-12">
                  <div class="col-sm-12" id="message">
                      <h4>Password must contain the following:</h4>
                      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                      <p id="number" class="invalid">A <b>number</b></p>
                      <p id="special_char" class="invalid">A <b>special character</b></p>
                      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>                                 
              </div> 
              <!--end dropdown message for strong password -->
              <br>
              <div class="input-group has-feedback">
                <input 
                type="password" 
                class="form-control confirm-password-field" 
                name="resetConfirmPassword" 
                id = "resetConfirmPassword" 
                placeholder="Confirm Password" 
                required 
                tabindex="2"
                >
                <span class="input-group-addon">
                <i 
                class="fa fa-eye-slash toggle-password" 
                data-target="#resetConfirmPassword" 
                role="button" 
                aria-label="Toggle password visibility">
                </i>
                </span>
              </div>
              <small id='CheckResetConfirmPassword'></small>
              <br>
              <div class="row">
                <div class="col-xs-12">
                    <div 
                    class="g-recaptcha" 
                    data-callback="recaptchaCallbackReset" 
                    data-expired-callback="recaptchaExpiredReset" 
                    data-sitekey="6LeTvywhAAAAAO3C0jpqGHBY-_CHkinekSrSzSlS">
                    </div>
                    <small id='CheckCaptchaResetmessage'></small>
                </div>
              </div>
              <div class="row">
                  <div class="col-xs-12">
                        <button 
                        type="submit"
                        id="btnReset" 
                        class="btn btn-primary  btn-block btn-flat" >
                            Reset Password
                        </button>
                  </div>
              </div><br>
          </form>
  	   </div>
</div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  
  
</div>

<!-- Start Scripts calling -->
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="resetScript.js?test=<?php echo time()?>"></script>
<!-- End Scripts calling -->
<script>
  sessionStorage.clear();
  $(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>
<?php
include 'modal/registermodal.php';
include 'modal/formModal.php';
?>
</body>
</html>
