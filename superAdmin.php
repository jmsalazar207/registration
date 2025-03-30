<!DOCTYPE html>
<html>
<head>
<?php
  session_start();
  $UL = $_SESSION['userLevel'];
  include "includes/getUserAccess.php";
  $current_page = basename($_SERVER['PHP_SELF']);
  $page = '/' . $current_page;
  
  if (!isset($_SESSION['userID'])) {
     header("Location: includes/logout.php"); // Redirect to logout (or login)
     exit();
 }
  if (!hasAccess($dbConn, emp_no: $_SESSION['userID'], page_url: $page)) {
   http_response_code(403);
   die("403 Forbidden: You do not have access to this page.");
 }
	$_SESSION["token"] = bin2hex(random_bytes(32));
	$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
  include 'includes/session.php';
// include 'includes/conn_to_ctris.php';
require_once('includes/init.php');
   include 'includes/functions.php'; 
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png">
  <script src="includes/scripts.js" async defer></script>
  <title>Super Admin - Employee's Registration Module</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->

</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">
    <?php 
            include "includes/session.php";
            include "includes/headerIn.php";
            include "includes/sideBar.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="box box-info" id="SearchContent">
            <div class="box-header with-border">
            <h3 class="box-title">Search Employee Number</h3>
            </div>
            <form class="form-horizontal" method="POST" id="contentsearch" autocomplete="off">
            <div class="box-body">
                <div class="box-body table-responsive no-padding">
                    <table id="table_employees" class="table table-bordered" style="text-align:center; width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th> EmpID </th>
                                <th> Full Name </th>
                                <th> Address </th>
                                <th> Position </th>
                                <th> Division </th>
                                <th> Unit </th>
                                <th> Date Registered </th>
                                <th> Account Status </th>
                                <th> User Level </th>
                            </tr>
                        </thead>
                    </table>
                </div> 
            </div>
            </form>
        </div>
      </section>
        </div>
        <!-- /.content-wrapper -->
        <?php
          include "includes/footer.php";
        ?>
    <!-- Add the sidebar's background. This div must be placedimmediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- page script -->
<?php
  include "modal/formModal.php";
?>
<script src="panelScript.js?test=<?php echo time()?>"></script>
<script src="superAdmin.js?test=<?php echo time()?>"></script>
<script>
  	$('#table_employees').DataTable({
      ajax: {
          url: 'superAdmin_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "empno"},
        { data: "fullname"},
        { data: "address"},
        { data: "position"},
        { data: "division"},
        { data: "unit"},
        { data: "date_registered"},
        { data: "account_status_name"},
        { data: "description"}
      ],
      'columnDefs': [ 
        { "bSortable": false, "aTargets": [0] }
      ]
    });
    // $('#table_employees tbody').on('click', '.reset', function (){
    //   var empno = $(this).attr('value');
    //   $.ajax({
    //     url:"reset.php",
    //     method:"POST",
    //     data: {empno:empno},
    //     success:function(data){
    //       if(data){
    //         alert("Password successfull reset to default password'");
    //       }else{
    //         alert("Failed to reset password!");
    //       }
    //     },
    //   })
    // });

</script>

</body>
</html>
