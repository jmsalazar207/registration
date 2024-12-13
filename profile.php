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
  <title>Home Page - Employee's Registration Module</title>
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
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <img 
                            class="profile-user-img img-responsive img-circle" 
                            name = "profilePic" 
                            id="profilePic" 
                            src="uploadedProfile/profile.jpg" 
                            alt="User profile picture"
                        >
                        <h2
                            class="profile-username text-center" 
                            name = "profileFullName" 
                            id ="profileFullName"
                        >
                            Full Name
                        </h2>
                        <h5 
                            class="text-center" 
                            name = "profilePosition" 
                            id="profilePosition"
                        >
                            Position
                        </h5>
                        <p 
                            class="text-muted text-center" 
                            name = "profileDivision" 
                            id="profileDivision"
                            style="margin-bottom:0%;"
                        >
                            Division
                        </p>
                        <p 
                            class="text-muted text-center" 
                            name = "profileUnit" 
                            id="profileUnit"
                            style="margin-bottom:0%;"
                        >
                            Unit
                        </p>
                        <div class = "col-md-12">
                          <button
                          class="btn btn-info btn-sm btn-block" 
                          id="openChangePassword"
                          name="openChangePassword"
                          >
                            Change Password
                          </button>
                     </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li 
                    class="active">
                    <a 
                      href="#overView" 
                      data-toggle="tab">
                      Overview
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#basicInfo" 
                      data-toggle="tab">
                      Basic Information
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#otherInfo" 
                      data-toggle="tab">
                      Other Information
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#familyBackground" 
                      data-toggle="tab">
                      Family Background
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#academic" 
                      data-toggle="tab">
                      Educational Background
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#eligibility" 
                      data-toggle="tab">
                      Eligibility
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#career" 
                      data-toggle="tab">
                      Work Experience
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#voluntaryWork" 
                      data-toggle="tab">
                      Voluntary Work
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#training" 
                      data-toggle="tab">
                      Trainings
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#skills" 
                      data-toggle="tab">
                      Special Skills and Hobbies
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#nonAcademic" 
                      data-toggle="tab">
                      Non-Academic Distinctions / Recognition
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#references" 
                      data-toggle="tab">
                      References
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#GovernID" 
                      data-toggle="tab">
                      Government Issued ID
                    </a>
                  </li>
                  <li>
                    <a 
                      href="#otherinfo2" 
                      data-toggle="tab">
                      Other Information (Part 2)
                    </a>
                  </li>
                </ul>
                <div class="tab-content" style = "background-color:white;">
                  <?php
                    include "overView.php";
                    include "basicInfo.php";
                    include "otherInfo.php";
                    include "familyBackground.php";
                    include "academic.php";
                    include "eligibility.php";
                    include "career.php";
                    include "voluntaryWork.php";
                    include "training.php";
                    include "skills.php";
                    include "non-academic.php";
                    include "references.php";
                    include "governID.php";
                    include "otherinfo2.php";
                  ?>
                </div>
              </div>
            </div>
        </div>

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

<script>
  $(function () {
    tables['tblReferences'] =  $('#tblReferences').DataTable({
      ajax: {
          url: 'references_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "ref_name"},
        { data: "ref_address"},
        { data: "ref_mobile"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tblSkills'] =  $('#tblSkills').DataTable({
      ajax: {
          url: 'skills_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "skills_title"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tblnonAcademic'] =  $('#tblnonAcademic').DataTable({
      ajax: {
          url: 'non-academic_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "non_academic_title"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tbltraining'] = $('#tbltraining').DataTable({
      ajax: {
          url: 'training_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "training_title"},
        { data: "training_period"},
        { data: "training_hours"},
        { data: "training_type"},
        { data: "training_conducted_by"},
        { data: "training_status"},
        { data: "training_remarks"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tblVoluntary'] = $('#tblVoluntary').DataTable({
      ajax: {
          url: 'voluntaryWork_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "vw_name_address"},
        { data: "period"},
        { data: "vw_no_hrs"},
        { data: "vw_position"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tblcareer'] = $('#tblcareer').DataTable({
      ajax: {
          url: 'career_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "period"},
        { data: "career_position_title"},
        { data: "career_organization"},
        { data: "career_salary"},
        { data: "career_compensention_level"},
        { data: "career_status_appointment"},
        { data: "career_govt_service"},
        { data: "career_status"},
        { data: "career_remarks"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tblEligibility'] = $('#tblEligibility').DataTable({
      ajax: {
          url: 'eligibility_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "elibility_title"},
        { data: "eligibility_rating"},
        { data: "eligibility_exam_date"},
        { data: "eligibility_exam_place"},
        { data: "eligibility_license"},
        { data: "eligibility_validity_date"},
        { data: "eligibility_status"},
        { data: "eligibility_remarks"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table
    tables['tblAcads'] = $('#tblAcads').DataTable({
      ajax: {
          url: 'academic_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "acad_level"},
        { data: "acad_school"},
        { data: "acad_degree"},
        { data: "acad_period"},
        { data: "acad_highest_level"},
        { data: "acad_year_graduated"},
        { data: "acad_honors"},
        { data: "acad_status"},
        { data: "acad_remarks"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table

    tables['tblFBMember'] = $('#tblFBMember').DataTable({
      ajax: {
          url: 'familyBackground_ajax.php',
          type: 'POST',
          'data': function(data){
          }
        },
      serverSide: true,
      stateSave: true,
      "order": [[ 1, "desc" ]],
      columns: [
        { data: "Action"},
        { data: "relation"},
        { data: "surname"},
        { data: "firstname"},
        { data: "middlename"},
        { data: "extname"},
        { data: "birthday"}
      ],
      'columnDefs': [ 
         { "bSortable": false, "aTargets": [0] }
      ]
    }); //end table familybackground

  });
</script>
<?php
include "modal/formModal.php";
include "modal/modalNotif.php";
?>
<script src="profileScript.js?test=<?php echo time()?>"></script>
<script src="panelScript.js?test=<?php echo time()?>"></script>
<script src="genFunction.js?test=<?php echo time()?>"></script>
<script src="modalNotif.js?test=<?php echo time()?>"></script>

</body>
</html>
