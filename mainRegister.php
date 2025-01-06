<!DOCTYPE html>
<html>
<head>
<?php
$today = date('Y-m-d');
  session_start();
  if (isset($_SESSION["userID"]) && $_SESSION["userID"]){
    header('location: homePage.php');
  }
	$_SESSION["token"] = bin2hex(random_bytes(32));
	$_SESSION["token-expire"] = time() + 3600; // 1 hour = 3600 secs
// include 'includes/conn_to_ctris.php';
require_once('includes/init.php');
   include 'includes/functions.php'; 
?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="includes/scripts.js" async defer></script>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/logo.png">
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
  
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link rel="stylesheet" href="includes/add.css?test=<?php echo time()?>">
  <link rel="stylesheet" href="includes/loader.css?test=<?php echo time()?>">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
     <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="loader-div">
    <img 
    class="loader-img" 
    src="images/ajax-loader.gif" 
    style="height: 50px;width: auto;" />
  </div>
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
          <!-- search box -->
          <div class="box box-info" id="SearchContent">
            <div class="box-header with-border">
              <h3 class="box-title">Search Employee Number</h3>
            </div>
            <form 
            class="form-horizontal" 
            method="POST" 
            id="contentsearch" 
            autocomplete="off">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-2">
                  <label 
                  for="Search" 
                  class="col-sm-12">
                    Employee Number
                  </label>
                  </div>
                  <div class="col-md-7">
                    <div class="input-group col-sm-12">
                      <div class="input-group-addon">
                        <i>
                          <label 
                          style="font-size: 15px; margin:auto" 
                          for="03-">
                            03-
                          </label>
                        </i>
                      </div>
                      <input 
                      type="text" 
                      class="form-control" 
                      name="txtSearch" 
                      id="txtSearch" 
                      placeholder="Employee Number" 
                      value="" 
                      style="text-transform: uppercase;" 
                      required="true" 
                      onkeypress="return NumberOnly(event)" 
                      tabindex="1">
                    </div>
                    <small id='CheckIDmessage'></small>
                  </div>
                  <div class="col-md-3">
                  <button 
                  type="submit" 
                  class="form-control btn btn-info" 
                  id="btn_search" 
                  name="btn_search">
                    SEARCH 
                  <i class="fa fa-search"></i>
                  </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- End search box -->
           <!-- Tip box -->
          <div 
          id="ContentTip" 
          class="callout callout-info" 
          hidden>
              <h4>
                Notice!
              </h4>
            <p style="font-size: medium;">
              The entered employee number belongs to 
              <i 
              style="color:black; font-weight:500; font-size:large;" 
              id="FullName">
              </i>.
              If you encounter any issues with the provided number, please contact the HUMAN RESOURCE PLANNING AND PERFORMANCE MANAGEMENT SECTION clarification.
            </p>
          </div>
           <!-- End Tip box -->
          <div 
          class="box box-info" 
          id="RegisterContent" 
          hidden>
            <form 
            class="form-horizontal" 
            method="POST" 
            id="contentform" 
            autocomplete="off">
              <div class="box-body">
                <div class="box-header">
                    <h3 class="box-title">
                      Login Credentials
                    </h3>
                </div>
                    <div class="row">
                      <div class="card col-md-12">
                          <label 
                          for="EmployeeNumber" 
                          class="requiredField col-sm-6" 
                          style="font-size: 15px;">
                            Employee Number
                          </label>
                            <div class="input-group col-sm-12">
                                <input 
                                type="text" 
                                class="form-control col-sm-10" 
                                id="EmployeeNumber" 
                                name="EmployeeNumber" 
                                placeholder="Enter Employee Number" 
                                readonly>
                            </div>                        
                          <label 
                          for="DesiredPassword" 
                          class="requiredField col-sm-6" 
                          style="font-size: 15px;">
                            Desired Password
                          </label>
                            <div class="input-group has-feedback col-sm-12">
                                <input 
                                type="password" 
                                class="form-control col-sm-10 password-field" 
                                id="DesiredPassword" 
                                name="DesiredPassword" 
                                placeholder="Desired Password" 
                                required="true" 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                tabindex="1"
                                >
                                <span class="input-group-addon">
                                <i 
                                class="fa fa-eye-slash toggle-password" 
                                data-target="#DesiredPassword" 
                                role="button" 
                                aria-label="Toggle password visibility">
                                </i>
                                </span>
                            </div>
                            <label 
                            for="ConfirmPassword" 
                            class="requiredField col-sm-12" 
                            style="font-size: 15px;">
                              Confirm Password
                            </label>                            
                              <div class="input-group has-feedback col-sm-12">
                                  <input 
                                  type="password" 
                                  class="form-control col-sm-10 confirm-password-field" 
                                  id="ConfirmPassword" 
                                  name = "ConfirmPassword" 
                                  placeholder="Confirm Password" 
                                  required="true" 
                                  tabindex="2">
                                  <span 
                                  class="input-group-addon">
                                  <i 
                                  class="fa fa-eye-slash toggle-password" 
                                  data-target="#ConfirmPassword" 
                                  role="button" 
                                  aria-label="Toggle password visibility">
                                  </i>
                                  </span>
                              </div>
                          <small id='checkmessage'></small>
                      </div>
                      <div class="card col-md-12">
                            <div 
                            class="col-sm-12" 
                            id="message">
                              <h4>
                                Password must contain the following:
                              </h4>
                              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                              <p id="number" class="invalid">A <b>number</b></p>
                              <p id="special_char" class="invalid">A <b>special character</b></p>
                              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>                                 
                      </div> 
                    </div>        
                    <div class="row"> <!--row1-->
                      <div class="card col-md-6"> <!--Card1-->
                          <div class="form-group">
                              <input 
                              type="hidden" 
                              name="token" 
                              value="<?=$_SESSION["token"]?>"> 
                              <label 
                              for="AddFirstName" 
                              class="requiredField col-sm-12" 
                              style="font-size: 15px;">
                                First Name
                              </label>
                                <div class="col-sm-12">
                                  <input 
                                  type="text" 
                                  class="form-control" 
                                  id="AddFirstName" 
                                  name="AddFirstName" 
                                  placeholder="FIRST NAME" 
                                  value="" 
                                  style="text-transform: uppercase;" 
                                  required="true" 
                                  tabindex="3"
                                  readonly>
                                  <small id='CheckFNamemessage'></small>
                                </div>
                                
                          </div>
                          <div class="form-group">
                            <label 
                            for="AddMiddleName" 
                            class="col-sm-12" 
                            style="font-size: 15px;">
                              Middle Name
                            </label>
                              <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddMiddleName" 
                                name="AddMiddleName" 
                                placeholder="MIDDLE NAME" 
                                value="" 
                                style="text-transform: uppercase;" 
                                tabindex="4"
                                readonly>
                                <small id='CheckMNamemessage'></small>
                              </div>
                          </div>
                          <div class="form-group">
                            <label 
                            for="AddLastName" 
                            class="requiredField col-sm-12" 
                            style="font-size: 15px;">
                              Last Name
                            </label>
                              <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddLastName" 
                                name="AddLastName" 
                                placeholder="LAST NAME" 
                                value="" 
                                style="text-transform: uppercase;" 
                                required="true" 
                                tabindex="5"
                                readonly>
                                <small id='CheckLNamemessage'></small>
                              </div>
                          </div>
                          <div class="form-group">
                            <label 
                            for="AddextName" 
                            class="col-md-12" 
                            style="font-size: 15px;">
                              Ext. Name
                            </label>
                            <div class="col-sm-12">
                            <input 
                            type="hidden" 
                            class="form-control" 
                            id="HiddenAddextName" 
                            name="HiddenAddextName" 
                            placeholder="Extension" 
                            value="" 
                            style="text-transform: uppercase;">
                              <select 
                              disabled
                              class="form-control select2"
                              style="width: 100%;"  
                              id="AddextName" 
                              name="AddextName" 
                              tabindex="6">
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
                          <div class="form-group">
                            <label 
                            for="AddSex" 
                            class="requiredField col-sm-12" 
                            style="font-size: 15px;">
                              Sex
                            </label>
                              <div class="col-sm-12">
                                <select 
                                class="form-control select2" 
                                style="width: 100%;" 
                                id="AddSex" 
                                name="AddSex" 
                                tabindex="7" 
                                required>
                                      <option value="">--</option>
                                      <option value="0">MALE</option>
                                      <option value="1">FEMALE</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label 
                            for="AddBirthdate" 
                            class="requiredField col-sm-12" 
                            style="font-size: 15px;">
                              Birthday
                            </label>
                              <div class="col-sm-12">
                                <div class="input-group date col-sm-12">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input 
                                  type="date" 
                                  class="form-control pull-right" 
                                  name="AddBirthdate" 
                                  id="AddBirthdate" 
                                  required="true" 
                                  tabindex="8"
                                  max="<?=$today?>">
                                </div>
                                <small id='CheckBdaymessage'></small>
                              </div>
                          </div>
                          <div class="form-group">
                            <label 
                            for="AddEmail" 
                            class="requiredField col-sm-12" 
                            style="font-size: 15px;">
                              Email Address
                            </label>
                              <div class="col-sm-12">
                                <input 
                                type="email" 
                                class="form-control" 
                                id="AddEmail" 
                                name="AddEmail" 
                                placeholder="Email Address" 
                                tabindex="9" 
                                required>
                                <small id='CheckEmailNomessage'></small>
                              </div>
                          </div>
                          <div class="form-group">
                            <label 
                            for="AddMobileNumber" 
                            class="requiredField col-sm-12" 
                            style="font-size: 15px;">
                              Mobile Number
                            </label>
                              <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddMobileNumber" 
                                name="AddMobileNumber" 
                                placeholder="MOBILE NUMBER" 
                                value="" style="text-transform: uppercase;" 
                                required="true" 
                                tabindex="10" 
                                onkeypress="return NumberOnly(event)">
                                <small id='CheckMobileNomessage'></small>
                              </div>
                          </div>                                
                      </div> <!--End Card1-->
                        <div class="card col-md-6"> <!--Card2-->
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                  <label 
                                  for="AddHouseNumber" 
                                  class="col-sm-12" 
                                  style="font-size: 15px;">
                                    House Number
                                  </label>
                                    <div class="col-sm-12">
                                      <input 
                                      type="text" 
                                      class="form-control" 
                                      id="AddHouseNumber" 
                                      name="AddHouseNumber" 
                                      placeholder="House #" 
                                      value="" 
                                      style="text-transform: uppercase;" 
                                      onkeypress="return NumberOnly(event)" 
                                      tabindex="11">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <label 
                                  for="AddStreet" 
                                  class="col-sm-12" 
                                  style="font-size: 15px;">
                                    Street
                                  </label>
                                    <div class="col-sm-12">
                                      <input 
                                      type="text" 
                                      class="form-control" 
                                      id="AddStreet" 
                                      name="AddStreet" 
                                      placeholder="Street" 
                                      value="" 
                                      style="text-transform: uppercase;" 
                                      tabindex="12">
                                      <small id='CheckStreetmessage'></small>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label 
                              for="AddRegion" 
                              class="requiredField col-sm-12" 
                              style="font-size: 15px;">
                                Region
                              </label>
                                <div class="col-sm-12">
                                  <select 
                                  class="form-control select2" 
                                  style="width: 100%;"  
                                  id="AddRegion" 
                                  name="AddRegion" 
                                  required="true" 
                                  tabindex="13">
                                    <?php
                                    echo fill_region($dbConn, null);
                                    ?>
                                  </select>
                                </div>
                          </div>
                          <div class="form-group">
                              <label 
                              for="AddProvince" 
                              class="requiredField col-sm-12" 
                              style="font-size: 15px;">
                                Province
                              </label>
                                <div class="col-sm-12">
                                  <select 
                                  class="form-control select2" 
                                  style="width: 100%;"  
                                  id="AddProvince" 
                                  name="AddProvince" 
                                  required="true" 
                                  tabindex="14">
                                    <option>SELECT REGION FIRST</option>
                                  </select>
                                </div>
                          </div>
                          <div class="form-group">
                              <label 
                              for="AddCity" 
                              class="requiredField col-sm-12" 
                              style="font-size: 15px;">
                                City
                              </label>
                                <div class="col-sm-12">
                                  <select 
                                  class="form-control select2" 
                                  style="width: 100%;" 
                                  id="AddCity" 
                                  name="AddCity" 
                                  required="true" 
                                  tabindex="15">
                                    <option>SELECT PROVINCE FIRST</option>
                                  </select>
                                </div>
                          </div> 
                          <div class="form-group">
                              <label 
                              for="AddBarangay" 
                              class="requiredField col-sm-12" 
                              style="font-size: 15px;">
                                Barangay
                              </label>
                                <div class="col-sm-12">
                                  <select 
                                  class="form-control select2"
                                  style="width: 100%;"  
                                  id="AddBarangay" 
                                  name="AddBarangay" 
                                  required="true" 
                                  tabindex="16">
                                    <option>SELECT MUNICIPALITY FIRST</option>
                                  </select> 
                                </div>
                          </div>
                          <div class="form-group" id="selectUpload">
                              <label 
                              for="AddFile" 
                              class="requiredField col-sm-12" 
                              style="font-size: 15px;">
                                Upload any Government Issued ID
                              </label>
                                <div class="col-sm-12">
                                <input 
                                type="file" 
                                class="form-control" 
                                id="AddFile" 
                                name="AddFile" 
                                value="" 
                                required="true" 
                                onchange="validateFileType()" 
                                tabindex="20" 
                                accept="image/jpeg, image/png">
                                <small id='CheckImagemessage'></small>
                                </div>
                          </div>  
                        </div> <!--Card2-->
                    </div> <!--End Row1--> 
                    <small id='CheckDataConsentmessage'></small>
                    <div 
                    class="col-md-12" 
                    style="background-color: #eee; padding:3px; border-radius:8px">
                      <div 
                      class="form-check checkbox-lg" 
                      style="margin:10px;font-size: 15px;" 
                      id="ContentdataConsent" >
                        <label class="requiredField" for="dataConsent"><strong>Data Privacy Consent and Acknowledgment: </strong></label> 
                        <h5 style="text-align:justify; font-weight: 900;font-size: 15px">
                        <input type="checkbox" name="dataConsent" id="dataConsent" class="form-check-input">
                        I, hereby acknowledge and consent to the collection, processing, and storage of my personal information and
                        sensitive personal information by the Department of Social Welfare and Development (DSWD) FO3, in accordance
                        with the RA 10173 or the Data Privacy Act of 2012 and existing DSWD Data Privacy Policies. I understand that
                        the information provided on this platform may include, but is not limited to, personal details, contact information,
                        birthdate, sex, and relevant data necessary for the processing of my records in the DSWD for the purposes of
                        financial claims and other personnel/administrative transactions.
                        </h5>
                        <h5 style="text-align:justify; font-weight: 900;font-size: 15px"> 
                        I declare under oath that I have personally accomplished this registration form which is a true, correct and 
                        complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. 
                        I authorize the agency head/authorized representative to verify/validate the contents stated herein.          
                        I  agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.
                        </h5>
                        <h5 style="text-align:justify; font-weight: 900;font-size: 15px">By submitting on this platform, I affirm that I have read and understood the terms outlined herein and voluntarily
                            agree to the collection and processing of my personal information.</h5>
                      </div>
                    </div>
              </div> 
              <div class="box-footer">
                  <div class="col-sm-10">
                    <div 
                    class="g-recaptcha" 
                    data-callback="onCaptchaSuccess" 
                    data-expired-callback="onCaptchaExpired"
                    data-sitekey="6LeTvywhAAAAAO3C0jpqGHBY-_CHkinekSrSzSlS"></div>
                    <small id='CheckCaptchamessage'></small>
                  </div>  
                  <div class="col-sm-2">
                    <input 
                    type="submit" 
                    class="btn btn-info pull-right btn-block" 
                    id="btnSubmit" 
                    name="btnSubmit"
                    disabled>
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
<script src="genFunction.js?test=<?php echo time()?>"></script>
<script src="pluginscript.js?test=<?php echo time()?>"></script>
<script src="modalNotif.js?test=<?php echo time()?>"></script>
<?php
include 'modal/modalNotif.php';
?>
</body>
</html>
