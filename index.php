<!DOCTYPE html>
<html>
<head>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script src="includes/scripts.js" async defer></script>
          <?php
          
          ?>
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
 
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
     <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="includes/add.css">
</head>
<?php
 session_start();
 $_SESSION["token"] = bin2hex(random_bytes(32));
 $_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
// include 'includes/conn_to_ctris.php';
include 'modal/registermodal.php';
 require_once('includes/init.php');
 include 'includes/functions.php'; 
?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php include 'includes/header.php';?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container" style="width: 80%;">
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
          <!-- Content for form -->
            <div class="box box-primary" id="RegisterContent" hidden>
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="myTab">
                      <li class="active"><a href="#personal" data-toggle="tab">Personal Information</a></li>
                      <!-- <li><a href="#family" data-toggle="tab">Family Background</a></li>
                      <li><a href="#education" data-toggle="tab">Educational Background</a></li>
                      <li><a href="#eligibility" data-toggle="tab">Civil Service Eligibilty</a></li>
                      <li><a href="#experience" data-toggle="tab">Work Experience</a></li>
                      <li><a href="#voluntary" data-toggle="tab">Voluntary Work or Involvement</a></li>
                      <li><a href="#learning" data-toggle="tab">Learning and Development</a></li>
                      <li><a href="#other1" data-toggle="tab">Other Information 1</a></li>
                      <li><a href="#other2" data-toggle="tab">Other Information 2</a></li>
                      <li><a href="#references" data-toggle="tab">References</a></li> -->
                        <!-- <a href="#print_preview" data-toggle="modal" class="btn btn-success btn-sm "> Print Preview</a> -->
                    </ul>

                    <div class="tab-content">
                        <!-- PERSONAL -->
                        <div class="active tab-pane" id="personal">
                          <?php require_once('epds_personal_info.php')?>
                        </div>
                        	<!-- Family -->
                          <div class="tab-pane" id="family">
                          <?php require_once('epds_family.php'); ?>
                        </div>
                        <!-- Educational -->
                        <div class="tab-pane" id="education">
                          <?php require_once('epds_education.php'); ?>
                        </div>
                        <!-- Eligibility -->
                        <div class="tab-pane" id="eligibility">
                          <?php require_once('epds_eligibility.php'); ?>
                        </div> 
                         <!-- Experience -->
                         <div class="tab-pane" id="experience">
                          <?php require_once('epds_experience.php'); ?>
                        </div>  
                        <!-- Voluntary Work or Involvement -->
                        <div class="tab-pane" id="voluntary">
                          <?php require_once('epds_voluntary.php'); ?>
                        </div>
                        
                        <!-- Learning and Development -->
                        <div class="tab-pane" id="learning">
                          <?php require_once('epds_learning.php'); ?>
                        </div>
                      
                        <!-- Other Information 1 -->
                        <div class="tab-pane" id="other1">
                          <?php require_once('epds_other1.php'); ?>
                        </div>
                        
                        <!-- Other Information 2 -->
                        <div class="tab-pane" id="other2">
                          <?php require_once('epds_other2.php'); ?>
                        </div>
                        
                        <!-- References -->
                        <div class="tab-pane" id="references">
                          <?php require_once('epds_reference.php'); ?>
                        </div> 
                    </div>

                  </div>
                                              
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
if(isset($_SESSION['update'])){
  if($_SESSION['update'] == 'success'){
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#SuccessUpdate').modal('show');
    });
    </script>";
  }elseif($_SESSION['update'] == 'error'){
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#ErrorUpdate').modal('show');
    });
    </script>";
  }
  unset($_SESSION['update']);
}
?>
</body>
</html>
