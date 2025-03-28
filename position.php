<!DOCTYPE html>
<html>
<head>
<?php
$today = date('Y-m-d');
  session_start();
  $UL = $_SESSION['userLevel'];
  include "includes/getUserAccess.php";
  $current_page = basename($_SERVER['PHP_SELF']);
  $page = '/' . $current_page;
 
  if (!hasAccess($dbConn, $_SESSION['userID'], $page)) {
   http_response_code(403);
   die("403 Forbidden: You do not have access to this page.");
 }
	$_SESSION["token"] = bin2hex(random_bytes(32));
	$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
  include 'includes/session.php';
require_once('includes/init.php');
   include 'includes/functions.php'; 
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png">
  <script src="includes/scripts.js" async defer></script>
  <title>Position Management - Employee's Registration Module</title>
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
  <link rel="stylesheet" href="includes/add.css?test=<?php echo time()?>">
  <link rel="stylesheet" href="includes/loader.css?test=<?php echo time()?>">
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="loader-div">
    <img 
    class="loader-img" 
    src="images/ajax-loader.gif" 
    style="height: 50px;width: auto;" />
  </div>
    <div class="wrapper">
    <?php 
            include "includes/session.php";
            include "includes/headerIn.php";
            include "includes/sideBar.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="box">
                <div class="box-header">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="box-title">
                        Position Management Module
                      </h3>
                    </div>
                    &nbsp;
                    <div class="col-md-12">
                        <button type="submit" id="btnAdd" name="btnAdd" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNewPosition">
                          <span class="glyphicon glyphicon-plus"></span>
                            <span class="glyphicon-class">
                              Add New Position
                            </span>
                        </button>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="userManage" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                      <thead class="bg-primary">
                          <tr>
                              <th> Action </th> <!-- details on position history -->
                              <th> Item Code </th>
                              <th> Position </th>
                              <th> Status </th>
                              <th> Classification </th>
                              <th> Fund Source </th>
                              <th> Date Created </th>
                              <th> Salary Grade </th>
                              <th> Division </th>
                              <th> Unit </th>
                              <th> Area of Assignment</th>
                              <th> Filled By </th>
                              <th> Date Filled </th>
                          </tr>
                      </thead>
                  </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
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
  include "modal/modalNotif.php";
?>
<script src="panelScript.js?test=<?php echo time()?>"></script>
<script src="position.js?test=<?php echo time()?>"></script>
<script src="genFunction.js?test=<?php echo time()?>"></script>
<script src="modalNotif.js?test=<?php echo time()?>"></script>
<script>
  $(function () {
    $('#userManage').DataTable({ //retrieve data position
      ajax: {
          url: 'position_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 2, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "item_code"},
        { data: "position_name"},
        { data: "position_status_description"},
        { data: "classification_employment_name"},
        { data: "fund_source_name"},
        { data: "date_creation_position"},
        { data: "salary_history_id"},
        { data: "division_name"},
        { data: "unit_name"},
        { data: "area_assignment_name"},
        { data: "filled_by"},
        { data: "date_filled"}
      ],
      'columnDefs': [ 
        { "bSortable": false, "aTargets": [0] },
        { "bSortable": false, "aTargets": [11] },
        { "bSortable": false, "aTargets": [12] }
      ]

    });
    
  });
</script>

</body>
</html>
