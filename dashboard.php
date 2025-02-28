<!DOCTYPE html>
<html>
<head>
<?php 
$today = date('Y-m-d');
 session_start();
  	$_SESSION["token"] = bin2hex(random_bytes(32));
    $_SESSION["token-expire"] = time() + 5; // 1 hour = 3600 secs
 include "includes/session.php";
  ?>
  <style>
    /* Formatting search box */
    .search-box{
        width: 100%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        margin: 0px 14px 0px 14px;
        padding: 0px 27px 0px 0px;
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        max-height: 200px; /* Adjust the height to your preference */
        overflow-y: auto; /* Enable scrolling */
        width: 100%;
        /* border: 1px solid #CCCCCC; */
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0px;
        padding: 7px 10px;
        /* border: 1px solid #CCCCCC; */
        border-top: none;
        cursor: pointer;
        background: #f2f2f2;
    }
    .result p:hover{
        background: #CCCCCC;
    }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png">
  <title>Dashboard - Employee's Registration Module</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="includes/add.css?test=<?php echo time()?>">
  <link rel="stylesheet" href="includes/loader.css?test=<?php echo time()?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="loader-div">
    <img 
    class="loader-img" 
    src="images/ajax-loader.gif" 
    style="height: 50px;width: auto;" />
  </div>
  <style>
    .ui-datepicker-calendar {
    display: none;
    }​

    .requiredField{
      color:red;
      font-weight: bold;
      font-size: 18px;
    }

  </style>
<!-- Site wrapper -->
<div class="wrapper">
    <?php 
        include "includes/headerIn.php";
        include "includes/sideBar.php";
        include "includes/functions.php";
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span 
            class="info-box-icon bg-aqua">
              <i class="ion-ios-list-outline">
              </i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">
                Total Positions
              </span>
              <span 
              class="info-box-number" 
              id="totalPositionNumber">
              <!-- Total Number of Position -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">
              <i class="ion ion-ios-people">
              </i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">
                Filled
              </span>
              <span 
              class="info-box-number"
              id="filledPositionNumber"> 
              <!-- Number of Filled -->
              </span>
              <span 
              class="info-box-text"
              id="filledPositionPercent">
                <!-- Percent of Filled -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow">
              <i class="ion ion-ios-people-outline">
              </i>
            </span>
            <div class="info-box-content">
              <span 
              class="info-box-text">
                Unfilled
              </span>
              <span 
              class="info-box-number"
              id="unFilledPositionNumber">
                <!-- Number of Unfilled -->
              </span>
              <span 
              class="info-box-text"
              id="unFilledPositionPercent">
                <!-- Percent of Filled -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red">
              <i class="ion ion-ios-trash">
              </i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">
                Abolished
              </span>
              <span 
              class="info-box-number"
              id="abolishedPositionNumber">
               <!-- Number of Abolished Position -->
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "includes/footer.php";
?>
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
  
  <!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="validate.js"></script>
<script src="dist/js/demo.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<?php
include "modal/formModal.php";
include "modal/modalNotif.php";
?>
<script src="dashboard.js?test=<?php echo time()?>"></script>
<script src="panelScript.js?test=<?php echo time()?>"></script>
<script src="genFunction.js?test=<?php echo time()?>"></script>
<script src="modalNotif.js?test=<?php echo time()?>"></script>

</body>
</html>
