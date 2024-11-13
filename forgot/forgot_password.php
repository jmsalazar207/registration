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
require_once('../includes/init.php');
   include '../includes/functions.php'; 
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="../includes/scripts.js" async defer></script>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../images/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration Module</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../includes/loader.css">
  <link rel="stylesheet" href="../includes/add.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
        <div class="loader-div">
          <img 
          class="loader-img" 
          src="../images/ajax-loader.gif" 
          style="height: 50px;width: auto;" />
        </div> 
        <div class="login-box">
          <div class="login-logo">
            <b>Forgot Password</b>
          </div>
          <div class="login-box-body">
                <p class="login-box-msg">
                  Enter your Credentials
                </p>
              <form method="POST" id="frmForgot" name="frmForgot" autocomplete="off">
                  <div class="form-group has-feedback">
                    <label for="empno">Employee Number</label>
                    <div class="input-group col-sm-12">
                      <div class="input-group-addon">
                        <i>
                          <label style="font-size: 15px; margin:auto" for="03-">03-</label>
                        </i>
                      </div>
                      <input 
                      type="text" 
                      class="form-control" 
                      name="empno" id="empno" 
                      placeholder="Employee Number" 
                      value="" 
                      required="true" 
                      onkeypress="return NumberOnly(event)" tabindex="1">
                    </div>
                    <small id="checkForgotUsername"></small>
                  </div>
                  <div class="form-group has-feedback">
                  <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id = "email" placeholder="Email Address" required tabindex="2">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <small id="checkForgotEmail"></small>
                  </div><br>
                  <div class="row">
                    <div class="col-xs-12">
                        <div class="g-recaptcha" data-callback="recaptchaCallbackForgot" data-expired-callback="recaptchaExpiredForgot" data-sitekey="6LeTvywhAAAAAO3C0jpqGHBY-_CHkinekSrSzSlS">
                        </div>
                        <small id='CheckCaptchaForgotmessage'></small>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                      <!-- <button type="submit" class="form-control btn btn-info" id="btn_search" name="btn_search"> -->
                            <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary  btn-block btn-sm" >SUBMIT</button>
                      </div>
                  </div><br>
              </form>
                <div class="row">
                  <div class="col-12 text-center"> <!-- Updated column class and added center alignment -->
                    <label>
                      <a href="../index.php" style="text-align:justify; display: inline-block;">
                        Back to Login
                      </a>
                    </label>
                  </div>
              </div>

          </div>
        </div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script src="resetScript.js?test=<?php echo time()?>"></script>
<?php
//include '../modal/registermodal.php';
include '../modal/formModal.php';
?>
</body>
</html>
