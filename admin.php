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
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" type = "text/css" href ="css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="includes/add.css">
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


                <div class="box-body table-responsive no-padding">
                  <table id="table_employees" class="table table-bordered">
                    <thead class="bg-primary">
                      <tr>
                        <th style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th> EmpID </th>
                        <th> Lastname </th>
                        <th> Firstname </th>
                        <th> Middlename </th>
                        <th> Position </th>
                        <th> Division </th>
                        <th> Unit </th>
                      </tr>
                    </thead>
                    
                    <tfoot>
                      <tr>
                        <th style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th> EmpID. </th>
                        <th> Lastname </th>
                        <th> Firstname </th>
                        <th> Middlename </th>
                        <th> Position </th>  
                        <th> Division </th>
                        <th> Unit </th>                            
                      </tr>
                    </tfoot>
                  </table>
                </div>  

              </div>
            </form>
          </div>
        
    </section> 

      </section>
    </div>
  </div>
  <?php 
  include 'includes/footer.php';
  ?>
  
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script>
  	$('#table_employees').DataTable({
      ajax: {
          url: 'admin_ajax.php',
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
        { data: "fname"},
        { data: "sname"},
        { data: "mname"},
        { data: "position"},
        { data: "divison"},
        { data: "unit"}
      ],
      'columnDefs': [ 
        { "bSortable": false, "aTargets": [0] }
      ]
    });


    $('#table_employees tbody').on('click', '.reset', function (){
      var empno = $(this).attr('value');
      $.ajax({
        url:"reset.php",
        method:"POST",
        data: {empno:empno},
        success:function(data){
          if(data){
            alert("Password successfull reset to default password'");
          }else{
            alert("Failed to reset password!");
          }
        },
      })
    });

</script>

</body>
</html>
