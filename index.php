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
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php include 'includes/header.php';?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">
<!--CODE OF REGISTRATION HERE-->
            <!--Registration form-->
    <section class="content">
          <div class="box box-info" id="SearchContent">
            <div class="box-header with-border">
              <h3 class="box-title">Search Employee Number</h3>
            </div>
            <form class="form-horizontal" method="POST" id="contentsearch">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="Search" class="col-sm-3 control-label">Employee Number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="txtSearch" id="txtSearch" placeholder="Employee Number" value="" style="text-transform: uppercase;" required="true" tabindex="1">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <button type="submit" class="form-control btn btn-info" id="btn_search" name="btn_search">
                    SEARCH 
                  <i class="fa fa-search"></i>
                  </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="box box-info" id="RegisterContent" hidden>
            <div class="box-header with-border">
              <h3 class="box-title">Employee Information</h3>
            </div>
              <form class="form-horizontal" method="POST" action="addnew.php">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
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
                        <select class="form-control select2" style="width: 100%;"  id="AddRegion" name="AddRegion" required="true" tabindex="11">
                          <?php
                           echo fill_region($dbConn, null);
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
                          <select class="form-control select2" style="width: 100%;"  id="AddProvince" name="AddProvince" required="true" tabindex="12">
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
                                  <select class="form-control select2"style="width: 100%;"  id="AddextName" name="AddextName" tabindex="4">
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
                          <select class="form-control select2" style="width: 100%;" id="AddCity" name="AddCity" required="true" tabindex="13">
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
                          <select class="form-control select2"style="width: 100%;"  id="AddBarangay" name="AddBarangay" required="true" tabindex="14">
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
                          <select class="form-control select2" style="width: 100%;" id="AddSex" name="AddSex" tabindex="6">
                                    <option value="">--</option>
                                    <option value="0">MALE</option>
                                    <option value="1">FEMALE</option>
                          </select>
                        </div>
                      </div>                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="LastName" class="col-sm-3 control-label">Position</label>
                        <div class="col-sm-9">
                          <select class="form-control select2"style="width: 100%;"  id="AddPosition" name="AddPosition" required="true" tabindex="15">
                            <?php
                           echo fill_position($dbConn, null);
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
                          <select class="form-control select2"style="width: 100%;"  id="AddDivision" name="AddDivision" required="true" tabindex="16">
                            <?php
                           echo fill_division($dbConn, null);
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
                          <select class="form-control select2"style="width: 100%;"  id="AddUnit" name="AddUnit" required="true" tabindex="17">
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
  <?php 
  include 'includes/footer.php';
  ?>
  
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
<script src="pluginscript.js"></script>
<!-- End Scripts calling -->
<?php
if(isset($_SESSION['insert'])){
  if($_SESSION['insert'] == 'success'){
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#SuccessRegister').modal('show');
    });
    </script>";
  }elseif($_SESSION['insert'] == 'error'){
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#ErrorRegister').modal('show');
    });
    </script>";
  }elseif($_SESSION['insert'] == 'exists'){
    echo "
    <script type='text/javascript'>
    $(document).ready(function(){
    $('#AlreadyExist').modal('show');
    });
    </script>";
  }
  unset($_SESSION['insert']);
}
?>
</body>
</html>
