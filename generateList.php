<!DOCTYPE html>
<html>
<head>
<?php
  session_start();
  $UL = $_SESSION['userLevel'];
	$_SESSION["token"] = bin2hex(random_bytes(32));
	$_SESSION["token-expire"] = time() + 3600;
require_once('includes/init.php');
   include 'includes/functions.php'; 
   include "includes/checkAccess.php";
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png">
  <script src="includes/scripts.js" async defer></script>
  <title>Generate List - Employee's Registration Module</title>
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
                        Registered Employees
                      </h3>
                    </div>
                    &nbsp;
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-sm"  id="downloadforPayrollList" title="Download list for payroll preparation">
                          <span class="glyphicon glyphicon-download-alt"></span>
                          <span class="glyphicon-class">
                            For Payroll
                          </span>
                        </a>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <table id="tblFMDGenerateList" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="bg-primary">
                        <tr>
                          <th> Employee Number </th>
                          <th> First Name </th>
                          <th> Middle Name </th>
                          <th> Last Name </th>
                          <th> Ext. Name </th>
                          <th> Mobile </th>
                          <th> Email Address </th>
                          <th> Position </th>
                          <th> Division </th>
                          <th> Unit </th>
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
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- page script -->
<?php
  include "modal/formModal.php";
  include "modal/modalNotif.php";
?>
<script src="panelScript.js?test=<?php echo time()?>"></script>
<script src="genFunction.js?test=<?php echo time()?>"></script>
<script src="modalNotif.js?test=<?php echo time()?>"></script>
<script>
  $(function () {
    $(document).on('click', '#downloadforPayrollList', function(e) {   //unlock account action
    e.preventDefault();
    PassData = '';
    modalConfirmShow('Would you like to download the list for payroll preparation?',downloadforPayrollList,PassData);
  });
  
  function downloadforPayrollList(){
   
    $(".loader-div").show();
    $.ajax({
      url: 'generateListPayroll.php',
      type: 'GET', 
      success: function(response) {
        // Hide loader
        $(".loader-div").hide();

        // Parse the JSON response
        const data = JSON.parse(response);

        // Trigger the download by creating an invisible link
        var link = document.createElement('a');
        link.href = data.downloadUrl; // The file URL returned from the server
        link.download = ''; // The file will be downloaded with the name from the server
        link.click(); // Trigger the download
      },
      error: function(xhr, status, error) {
        modalErrorShow("The system encountered an error. Please contact support.");
        $(".loader-div").hide();
      }
    });

  }
    $('#tblFMDGenerateList').DataTable({
      ajax: {
          url: 'generateList_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 5, "desc" ]],
      columns: [
        { data: "empno"},
        { data: "fname"},
        { data: "mname"},
        { data: "sname"},
        { data: "ename"},
        { data: "mobile"},
        { data: "eaddress"},
        { data: "position_name"},
        { data: "division_name"},
        { data: "unit_name"}
      ],
    });
  })
</script>

</body>
</html>
