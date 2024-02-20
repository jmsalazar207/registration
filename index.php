<!DOCTYPE html>
<html>
<head>
<?php
  session_start();
	$_SESSION["token"] = bin2hex(random_bytes(32));
	$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
// include 'includes/conn_to_ctris.php';
require_once('includes/init.php');
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
      <div class="login-box">
  	<div class="login-logo">
  		<b>ERM</b>
  	</div>
  	   <div class="login-box-body">
            <p class="login-box-msg">
              Login
            </p>
    	    <form method="POST" id="contentLogin" autocomplete="off">
              <div class="form-group has-feedback">
                <div class="input-group col-sm-12">
                  <div class="input-group-addon">
                    <i>
                      <label style="font-size: 15px; margin:auto" for="03-">03-</label>
                    </i>
                  </div>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Employee Number" value="" style="text-transform: uppercase;" required="true" onkeypress="return NumberOnly(event)" tabindex="1">
                </div>
              </div>

              <div class="input-group has-feedback">
                <input type="password" class="form-control" name="password" id = "password" placeholder="Password" required>
                <span class="input-group-addon"><i class="fa fa-eye-slash toggle-password " toggle = "#password"  id="togglepassword"></i></span>
              </div><br>
              <div class="row">
                <div class="col-xs-12">
                    <div class="g-recaptcha" data-callback="recaptchaCallbackLogin" data-expired-callback="recaptchaExpiredLogin" data-sitekey="6LeTvywhAAAAAO3C0jpqGHBY-_CHkinekSrSzSlS">
                    </div>
                    <small id='CheckCaptchaLoginmessage'></small>
                </div>
              </div>
              <div class="row">
                  <div class="col-xs-12">
                  <!-- <button type="submit" class="form-control btn btn-info" id="btn_search" name="btn_search"> -->
                        <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary  btn-block btn-flat" >Login</button>
                  </div>
              </div><br>
          </form>
                <div class="row">
                  <div class="col-xs-12">
                    <label>Don't have account? <a href="mainRegister.php">Click here to register</a></label>
                  </div>
                </div>
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
<script src="loginscript.js"></script>
<!-- End Scripts calling -->
<script>
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
</body>
</html>
