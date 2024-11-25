        <div class="modal fade" id="addNewPosition"> <!--Adding of new position-->
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="positionContentAdd" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Position</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionName" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Position Name
                                        </label>
                                        <div class="col-sm-12">
                                            <select 
                                            class="form-control select2" 
                                            style="width: 100%;"
                                            id="addPositionName" 
                                            name="addPositionName"
                                            required
                                            tabindex="1">
                                                <?php
                                                    echo fill_position_name($dbConn,null);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionClassification" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Employment Classification
                                        </label>
                                        <div class="col-sm-12">
                                            <select
                                            type="select" 
                                            class="form-control select2"
                                            style="width: 100%;" 
                                            id="addPositionClassification" 
                                            name="addPositionClassification"
                                            required
                                            tabindex="2"
                                            onchange="onChangeClassEmployment()">
                                                <?php
                                                    echo fill_employment($dbConn,null);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionSalaryGrade" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Salary Grade
                                        </label>
                                        <div class="col-sm-12">
                                            <select
                                            type="select" 
                                            class="form-control select2"
                                            style="width: 100%;" 
                                            id="addPositionSalaryGrade" 
                                            name="addPositionSalaryGrade"
                                            required
                                            tabindex="3">
                                                <?php
                                                    echo fill_salary_grade($dbConn,null);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionFundSource" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Fund Source
                                        </label>
                                        <div class="col-sm-12">
                                            <select
                                            type="select" 
                                            class="form-control select2"
                                            style="width: 100%;" 
                                            id="addPositionFundSource" 
                                            name="addPositionFundSource"
                                            required
                                            tabindex="4">
                                                <?php
                                                    echo fill_fund_source($dbConn,null);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionDateCreated" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Date Created
                                        </label>
                                        <div class="col-sm-12">
                                            <input
                                            type="date" 
                                            class="form-control"
                                            style="width: 100%;" 
                                            id="addPositionDateCreated" 
                                            name="addPositionDateCreated"
                                            required
                                            max = "<?=$today?>"
                                            tabindex="5">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionDivision" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Division
                                        </label>
                                        <div class="col-sm-12">
                                            <select
                                            type="select" 
                                            class="form-control select2"
                                            style="width: 100%;" 
                                            id="addPositionDivision" 
                                            name="addPositionDivision"
                                            required
                                            tabindex="6">
                                                <?php
                                                    echo fill_division($dbConn, null);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionUnit" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Section / Unit
                                        </label>
                                        <div class="col-sm-12">
                                            <select
                                            type="select" 
                                            class="form-control select2"
                                            style="width: 100%;" 
                                            id="addPositionUnit" 
                                            name="addPositionUnit"
                                            required
                                            tabindex="7">
                                                <option>SELECT DIVISION FIRST</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addPositionItemCode" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Item Code
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                            <input 
                                            class="form-control" 
                                            id="addPositionItemCode" 
                                            name="addPositionItemCode"
                                            required
                                            readonly>
                                            <small id='CheckPositionItemCode'></small>
                                            <input 
                                            type="hidden" 
                                            name="addPositionItemCodeFormat" 
                                            id="addPositionItemCodeFormat"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal"
                            tabindex="11">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary"
                            tabindex="10">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="addNewPositionName"> <!--Add new position NAME-->
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="positionNameAdd" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Position Name</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addLPNPositionName" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Position Name
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                            <input 
                                            class="form-control" 
                                            id="addLPNPositionName" 
                                            name="addLPNPositionName"
                                            required
                                            tabindex="1"
                                            style="text-transform: uppercase;"
                                            >
                                            <small id='CheckaddLPNPositionName'></small>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="addLPNPositionInitial" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Position Initial
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="addLPNPositionInitial" 
                                            name="addLPNPositionInitial"
                                            required
                                            tabindex="2"
                                            style="text-transform: uppercase;">
                                            <small id='CheckaddLPNPositionInitial'></small>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal"
                            tabindex="10">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary"
                            tabindex="9">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="UpdatePositionName"> <!--Add new position NAME-->
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="positionNameUpdate" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            name="btnDeletePositionName"
                            id="btnDeletePositionName"
                            class="btn btn-danger btn-sm pull-right"
                            onclick="btnCheckDeletePositionName()"
                            >
                            Delete
                        </button>
                        <h4 class="modal-title">Update Position Name</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="updateLPNPositionName" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Position Name
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>">
                                            <input 
                                            type="hidden" 
                                            name="posNameID"
                                            id="posNameID" >  
                                            <input 
                                            class="form-control" 
                                            id="updateLPNPositionName" 
                                            name="updateLPNPositionName"
                                            required
                                            tabindex="1"
                                            style="text-transform: uppercase;" >
                                            <small id='CheckupdateLPNPositionName'></small>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="updateLPNPositionInitial" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Position Initial
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateLPNPositionInitial" 
                                            name="updateLPNPositionInitial"
                                            required
                                            tabindex="2"
                                            style="text-transform: uppercase;">
                                            <small id='CheckupdateLPNPositionInitial'></small>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal"
                            tabindex="10">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary"
                            tabindex="9">
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- modal for add user -->
<div class="modal fade" id="AdminAddNewUser">
    <div class="modal-dialog">
      <div class="modal-content">
          <form 
              method="POST" 
              id="frmAdminAddNewUser" 
              autocomplete="off">
              <div class="modal-header">
                  <button 
                      type="button" 
                      class="close" 
                      data-dismiss="modal" 
                      aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add New User</h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="card col-md-12">
                          <div class="col-md-12">
                              <label 
                                  for="txtAddEmpno" 
                                  class="col-sm-12 requiredField">
                                  Select Mode
                              </label>
                              <div class="input-group col-sm-12">
                                  <select 
                                      class="form-control select2"
                                      style="width: 100%;"  
                                      id="txtSelectMode" 
                                      name="txtSelectMode" 
                                      tabindex="1"
                                      required>
                                          <option value="1" selected>Auto Generate</option>
                                          <option value="2">Manual Entry</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <label 
                                  for="txtAddEmpno" 
                                  class="col-sm-12 requiredField">
                                  Employee Number
                              </label>
                              <div class="input-group col-sm-12">
                                  <div class="input-group-addon">
                                      <i>
                                      <label 
                                          style="font-size: 15px; margin:auto" 
                                          for="03-">03-</label>
                                      </i>
                                  </div>
                                  <input 
                                      type="hidden" 
                                      name="token" 
                                      value="<?=$_SESSION["token"]?>"> 
                                  <input 
                                    type="text" 
                                    class="form-control" 
                                    name="txtAddEmpno" 
                                    id="txtAddEmpno" 
                                    placeholder="Employee Number" 
                                    value="" 
                                    readonly
                                    required
                                    style="text-transform: uppercase;" 
                                    onkeypress="return NumberOnly(event)" 
                                    tabindex="1">
                              </div>
                              <small id='checkTxtAddEmpno'></small>
                          </div>
                          <br>
                          <div class="col-md-12">
                              <label 
                                  for="txtAddFName" 
                                  class="col-sm-12 requiredField">
                                  First Name
                              </label>
                              <div class="input-group col-sm-12">
                                  <input 
                                      type="text" 
                                      class="form-control" 
                                      name="txtAddFName" 
                                      id="txtAddFName" 
                                      placeholder="First Name" 
                                      value="" 
                                      style="text-transform: uppercase;" 
                                      required="true" 
                                      tabindex="2">
                              </div>
                              <small id='checkTxtAddFName'></small>
                          </div>
                          <br>
                          <div class="col-md-12">
                              <label 
                                  for="txtAddMName" 
                                  class="col-sm-12 ">
                                  Middle Name
                              </label>
                              <div class="input-group col-sm-12">
                                  <input 
                                      type="text" 
                                      class="form-control" 
                                      name="txtAddMName" 
                                      id="txtAddMName" 
                                      placeholder="Middle Name" 
                                      value="" 
                                      style="text-transform: uppercase;" 
                                      tabindex="3">
                              </div>
                              <small id='checkTxtAddMName'></small>
                          </div>
                          <br>
                          <div class="col-md-12">
                              <label 
                                  for="txtAddLName" 
                                  class="col-sm-12 requiredField">
                                  Last Name
                              </label>
                              <div class="input-group col-sm-12">
                                  <input 
                                      type="text" 
                                      class="form-control" 
                                      name="txtAddLName" 
                                      id="txtAddLName" 
                                      placeholder="Last Name" 
                                      value="" 
                                      style="text-transform: uppercase;" 
                                      required="true" 
                                      tabindex="4">
                              </div>
                              <small id='checkTxtAddLName'></small>
                          </div>
                          <br>
                          <div class="col-md-12">
                              <label 
                                  for="txtAddExtName" 
                                  class="col-sm-12">
                                  Ext Name
                              </label>
                              <div class="input-group col-sm-12">
                                  <select 
                                      class="form-control select2"
                                      style="width: 100%;"  
                                      id="txtAddExtName" 
                                      name="txtAddExtName" 
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
                              <small id='checkTxtAddExtName'></small>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button 
                      type="button" 
                      class="btn btn-default pull-left" 
                      data-dismiss="modal">
                      Close
                  </button>
                  <button 
                      type="button"
                      id="btnAddNewUser"
                      name="btnAddNewUser" 
                      class="btn btn-primary">
                      Add
                  </button>
              </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

        <!-- modal update info  -->
        <div class="modal fade" id="formAdminUserUpdate">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li id="TabUpdateOverview"
                        class="active">
                        <a 
                            href="#UserInfoOverView" 
                            data-toggle="tab">
                             Overview
                        </a>
                    </li>
                  <li id="TabUpdatePersonalInformation"
                  class="">
                    <a 
                      href="#AdminUpdateUserInfo" 
                      data-toggle="tab">
                      Update Personal Information
                    </a>
                  </li>
                  <li id="TabUpdateItemCode"
                  >
                    <a 
                      href="#AdminUpdateUserItemCode" 
                      data-toggle="tab">
                      Update Item Code
                    </a>
                  </li>
                </ul>
                <div class="tab-content" style = "background-color:white;">
                  <?php
                    include "tabUpdateUserInfo.php";
                    include "tabOverViewUserInfo.php";
                    include "tabUpdateItemCode.php"
                  ?>
                </div>
              </div>
            </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modalUpdate -->
    <!-- Approve modal -->
            <div class="modal fade" id="formApprove">
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="contentApprove" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Validate Account</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="col-md-12">
                                    <label 
                                        for="txtEmpno" 
                                        class="col-sm-12">
                                        Employee Number
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtValidateEmpno" 
                                            id="txtValidateEmpno" 
                                            placeholder="Employee Number" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="1"
                                            readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtValidateFullName" 
                                        class="col-sm-12">
                                        Full Name
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtValidateFullName" 
                                            id="txtValidateFullName" 
                                            placeholder="Full Name" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="2"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label 
                                        for="validateUploadedID" 
                                        class="col-sm-12">
                                        Uploaded ID
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <div class="card" style="border: grey;" >

                                        </div>
                                        <img 
                                            class="img-responsive" 
                                            src="" 
                                            alt="No photo available" 
                                            id="validateUploadedID" 
                                            name="validateUploadedID" 
                                            style="width: auto; height:auto;" >
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal">
                            Close
                        </button>
                        <button 
                            type="button" 
                            class="btn btn-danger"
                            id="btnDisapproveRegistration"
                            name="btnDisapproveRegistration" >
                            Disapprove
                        </button>
                        <button 
                            type="button" 
                            class="btn btn-primary"
                            id="btnApproveRegistration"
                            name="btnApproveRegistration">
                            Approve
                        </button>
                        
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modalUpdate -->
    <!-- End Approve modal -->
        <!-- modal update info  -->
        <div class="modal fade" id="addDivision">
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="contentDivision" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Division Information</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="col-md-12">
                                    <label 
                                        for="txtDivName" 
                                        class="col-sm-12">
                                        Division Name
                                    </label>
                                    <div class="col-sm-12">
                                        <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtDivName" 
                                            id="txtDivName" 
                                            placeholder="Division Name" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="1">
                                    </div>
                                    <small id='checktxtDivName'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtFName" 
                                        class="col-sm-12">
                                        Division Name Code
                                    </label>
                                    <div class="col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtDivNameCode" 
                                            id="txtDivNameCode" 
                                            placeholder="Division Name Code" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="2">
                                    </div>
                                    <small id='checktxtDivNameCode'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtCluster" 
                                        class="col-sm-12">
                                        Cluster
                                    </label>
                                    <div class="col-sm-12">
                                        <select 
                                            class="form-control select2"
                                            style="width: 100%;"  
                                            id="txtCluster" 
                                            name="txtCluster" 
                                            tabindex="6"
                                            required = "true">
                                                <?php
                                                    echo fill_cluster($dbConn, null);
                                                ?>
                                        </select>
                                    </div>
                                    <small id='checktxtCluster'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modalDivision -->
        
        <!-- modal Notif -->
        <div class="modal fade" id="modalNotif">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                  <span 
                    aria-hidden="true">
                    &times;
                  </span>
                </button>
                <h4 
                    class="modal-title" 
                    id="modalNotif-header" >
                </h4>
              </div>
              <div class="modal-body">
                <p id="modalNotif-message" ></p>
              </div>
              <div class="modal-footer">
                <button 
                    type="button" 
                    class="btn btn-default" 
                    onclick="javascript:window.location.reload();" 
                    data-dismiss="modal">
                    Ok
                </button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

                <!-- modal update info  -->
        <div class="modal fade" id="frmUserLevel">
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="contentUserLevel" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Set User Level</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="col-md-12">
                                    <label 
                                        for="txtUlEmpno" 
                                        class="col-sm-12">
                                        Employee Number
                                    </label>
                                    <div class=" col-sm-12">
                                        <input 
                                            type="hidden" 
                                            name="token"
                                            id="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtUlEmpno" 
                                            id="txtUlEmpno" 
                                            placeholder="Employee Number" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="1"
                                            readonly = "true">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label 
                                        for="txtEmpno" 
                                        class="col-sm-12">
                                        Full Name
                                    </label>
                                    <div class="col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtUlFullName" 
                                            id="txtUlFullName" 
                                            placeholder="Full Name" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="2"
                                            readonly = "true">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label 
                                        for="txtULUserLevel" 
                                        class="col-sm-12">
                                        User Level
                                    </label>
                                    <div class="col-sm-12">
                                        <select 
                                            class="form-control select2"
                                            style="width: 100%;"  
                                            id="txtULUserLevel" 
                                            name="txtULUserLevel" 
                                            tabindex="6"
                                            required = "true">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="VerifyCareerUpload">
           <div class="modal-dialog" style="width:auto; height:auto;" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Verify Career Details</h4>
                    </div>
                    <form id="frmCareerdVerify" name="frmCareerdVerify" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6" style="width: 750px; height:auto;" >
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerDateFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date From
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input 
                                                type="hidden"
                                                name="VerifycareerID"
                                                id="VerifycareerID">
                                                <input 
                                                readonly
                                                type="date"
                                                class="form-control" 
                                                id="VerifycareerDateFrom" 
                                                name="VerifycareerDateFrom"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerDateTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date To
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                type="date"
                                                class="form-control" 
                                                id="VerifycareerDateTo" 
                                                name="VerifycareerDateTo"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerPosition" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Position Title
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifycareerPosition" 
                                                name="VerifycareerPosition"
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerOrganization" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Organization
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifycareerOrganization" 
                                                name="VerifycareerOrganization"
                                                required
                                                tabindex="3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerSalary" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Monthly Salary  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifycareerSalary" 
                                                name="VerifycareerSalary"
                                                required
                                                tabindex="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerCompensention" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Compensention Level
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                type="text"
                                                class="form-control" 
                                                id="VerifycareerCompensention" 
                                                name="VerifycareerCompensention"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerStatusAppointment" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Status of Appointment
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifycareerStatusAppointment" 
                                                name="VerifycareerStatusAppointment"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifycareerGovtService" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Government Service
                                            </label>
                                            <div class="col-md-12">
                                                <select 
                                                class="form-control select2" 
                                                style="width: 100%;"  
                                                id="VerifycareerGovtService" 
                                                name="VerifycareerGovtService" 
                                                required
                                                tabindex="1"
                                                >
                                                    <option 
                                                    name = "" 
                                                    id="" 
                                                    value="">
                                                        SELECT ONE 
                                                    </option>
                                                    <option 
                                                    name = "" 
                                                    id="" 
                                                    value="1">
                                                        YES
                                                    </option>
                                                    <option 
                                                    name = "" 
                                                    id="" 
                                                    value="2">
                                                        NO
                                                    </option>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyUploadedCareerMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Uploaded MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <iframe 
                                                id="VerifyUploadedCareerMOV" 
                                                name="VerifyUploadedCareerMOV" 
                                                src="" 
                                                width="100%"
                                                height="600px"
                                                frameborder="0" >
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyCareerRemarks" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Verification Remarks  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="VerifyCareerRemarks" 
                                                name="VerifyCareerRemarks"
                                                style="text-transform: uppercase;"
                                                tabindex=""
                                                required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button 
                                    type="button" 
                                    class="btn btn-default pull-left" 
                                    data-dismiss="modal">
                                    Close
                                </button>
                                <button 
                                    type="submit" 
                                    class="btn btn-danger">
                                    Disapprove
                                </button>
                                <button 
                                    type="button" 
                                    name ="btnApproveCareerUpload"
                                    id="btnApproveCareerUpload"
                                    class="btn btn-primary">
                                    Approve
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
           </div> 
        </div>
        <div class="modal fade" id="updateCareer">
           <div class="modal-dialog" style="width: auto; height:auto;" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Update Career Details</h4>
                    </div>
                    <form id="frmCareerdUpdate" name="frmCareerdUpdate" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6" style="width:750px; height:auto">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerDateFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date From
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input 
                                                type="hidden"
                                                name="careerID"
                                                id="careerID">
                                                <input type="hidden"
                                                name="currentCareerFileName"
                                                id="currentCareerFileName">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="UpdatecareerDateFrom" 
                                                name="UpdatecareerDateFrom"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerDateTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date To
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="UpdatecareerDateTo" 
                                                name="UpdatecareerDateTo"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerPosition" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Position Title
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdatecareerPosition" 
                                                name="UpdatecareerPosition"
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerOrganization" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Organization
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdatecareerOrganization" 
                                                name="UpdatecareerOrganization"
                                                required
                                                tabindex="3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerSalary" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Monthly Salary  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdatecareerSalary" 
                                                name="UpdatecareerSalary"
                                                required
                                                tabindex="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerCompensention" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Compensention Level
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="UpdatecareerCompensention" 
                                                name="UpdatecareerCompensention"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerStatusAppointment" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Status of Appointment
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdatecareerStatusAppointment" 
                                                name="UpdatecareerStatusAppointment"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerGovtService" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Government Service
                                            </label>
                                            <div class="col-md-12">
                                                <select 
                                                class="form-control select2" 
                                                style="width: 100%;"  
                                                id="UpdatecareerGovtService" 
                                                name="UpdatecareerGovtService" 
                                                required
                                                tabindex="1"
                                                >
                                                    <option 
                                                    name = "" 
                                                    id="" 
                                                    value="">
                                                        SELECT ONE 
                                                    </option>
                                                    <option 
                                                    name = "" 
                                                    id="" 
                                                    value="1">
                                                        YES
                                                    </option>
                                                    <option 
                                                    name = "" 
                                                    id="" 
                                                    value="2">
                                                        NO
                                                    </option>
                                                </select>                                                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatecareerMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Re-upload MOV  
                                            </label>
                                            <div class="col-sm-12">
                                            <input 
                                                type="file" 
                                                class="form-control" 
                                                id="UpdatecareerMOV" 
                                                name="UpdatecareerMOV" 
                                                value="" 
                                                tabindex="9"
                                                accept="application/pdf"
                                                onchange="validateUpdateFileTypeCareer()">
                                            <small id='CheckUpdatecareerMOV'></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UploadedCareerMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Uploaded MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <iframe 
                                                id="UploadedCareerMOV" 
                                                name="UploadedCareerMOV" 
                                                src="" 
                                                width="100%"
                                                height="600px"
                                                frameborder="0" >
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="box-footer" style="border:0cm;">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary btn-md pull-right">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
           </div> 
        </div>
        <div class="modal fade" id="updateVoluntary" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Update Career Details</h4>
                    </div>
                    <form id="frmVoluntaryUpdate" name="frmVoluntaryUpdate" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatevoluntaryNAO" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Name & Address of Organization
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input type="hidden"
                                                name="voluntaryID"
                                                id="voluntaryID">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="UpdatevoluntaryNAO" 
                                                name="UpdatevoluntaryNAO"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label 
                                                for="UpdatevoluntaryDateFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date From
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="UpdatevoluntaryDateFrom" 
                                                name="UpdatevoluntaryDateFrom"
                                                tabindex="2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label 
                                                for="UpdatevoluntaryDateTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date To
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="UpdatevoluntaryDateTo" 
                                                name="UpdatevoluntaryDateTo"
                                                tabindex="2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label 
                                                for="UpdatevoluntaryTotalHrs" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Total Hours
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdatevoluntaryTotalHrs" 
                                                name="UpdatevoluntaryTotalHrs"
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdatevoluntaryPosition" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Position/Nature of Work
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdatevoluntaryPosition" 
                                                name="UpdatevoluntaryPosition"
                                                required
                                                tabindex="3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="box-footer" style="border:0cm;">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary btn-md pull-right">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </form>
                </div> 
            </div>   
        </div>
        <!-- /.modalUpdate -->
        <div class="modal fade" id = "updateAcads">
            <div class="modal-dialog" style="width:auto; height:auto;" >
                <div class="modal-content">
                    <form id="contentUpdateAcads" name="contentUpdateAcads" autocomplete="off" >
                        <div class="modal-header">
                            <button 
                                type="button" 
                                class="close" 
                                data-dismiss="modal" 
                                aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                            </button>
                            <h4 class="modal-title">Update Academic Details</h4>
                        </div>
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6" style="height: auto; width:750px">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadEducLevel" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Education Level
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input  
                                                type="text"
                                                name="acadsId"
                                                id="acadsId"
                                                hidden>
                                                <input type="hidden"
                                                name="currentAcadsFileName"
                                                id="currentAcadsFileName">
                                                <input 
                                                type="hidden" 
                                                name="UpdateacadEducLevelValue" 
                                                id="UpdateacadEducLevelValue">
                                                <select 
                                                    class="form-control select2" 
                                                    style="width: 100%;"  
                                                    id="UpdateacadEducLevel" 
                                                    name="UpdateacadEducLevel" 
                                                    required
                                                    tabindex="1"
                                                    disabled
                                                    >
                                                    <option name = "UpdateoptNone" id="UpdateoptNone" value="" readonly>SELECT EDUCATIONAL LEVEL </option>
                                                    <option name = "UpdateoptElementary" id="UpdateoptElementary" value="1">Elementary</option>
                                                    <option name = "UpdateoptSecondary" id="UpdateoptSecondary" value="2">Secondary</option>
                                                    <option name = "UpdateoptCollage" id="UpdateoptCollage" value="3">College</option>
                                                    <option name = "UpdateoptVocational" id="UpdateoptVocational" value="4">Vocational / Trade Course</option>
                                                    <option name = "UpdateoptGraduate" id="UpdateoptGraduate" value="5">Graduate Studies</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="divRequiredFields">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadNameSchool" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Name of School
                                            </label>
                                            <div class="col-sm-12">
                                                <select 
                                                class="form-control select2"
                                                style="width: 100%;"
                                                name="UpdateacadNameSchool" 
                                                id="UpdateacadNameSchool"
                                                tabindex="2"
                                                required
                                                >
                                                    <option value="">SELECT ONE</option>
                                                </select>
                                                    <small id='CheckacadNameSchool'></small>
                                            </div>
                                                <div class="col-md-12 search-box">
                                                    <input 
                                                    type="text" 
                                                    id="txtUpdateFilter" 
                                                    name="txtUpdateFilter" 
                                                    autocomplete="off" 
                                                    placeholder="Search school..." 
                                                    hidden/>
                                                    <input 
                                                    type="text" 
                                                    id="txtUpdateID" 
                                                    name="txtUpdateID" 
                                                    hidden/>
                                                    <div class="result text-start"></div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadDegree" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Basic Education / Degree / Course  
                                            </label>
                                            <div class="col-sm-12">
                                                <select 
                                                class="form-control select2"
                                                style="width: 100%;"
                                                name="UpdateacadDegree" 
                                                id="UpdateacadDegree"
                                                tabindex="3"
                                                required
                                                >
                                                    <option value="">SELECT ONE</option>
                                                </select>
                                                <small id='CheckacadDegree'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadPeriodFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                From (YYYY)
                                            </label>
                                            <div class="col-sm-12">
                                            <select 
                                            name="UpdateacadPeriodFrom" 
                                            id="UpdateacadPeriodFrom" 
                                            class="form-control select2"
                                            style="width: 100%;"  
                                            tabindex="4"
                                            >
                                            </select>
                                                <small id='CheckacadPeriodFrom'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadPeriodTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                To (YYYY)
                                            </label>
                                            <div class="col-sm-12">
                                            <select 
                                                name="UpdateacadPeriodTo"
                                                id="UpdateacadPeriodTo" 
                                                class="form-control select2"
                                                style="width: 100%;"  
                                                tabindex="5"
                                                onchange="PeriodTo()";
                                                >
                                            </select>
                                                <small id='CheckUpdateacadPeriodTo'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadHighestLevel" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Highest Level/Units Earned  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="UpdateacadHighestLevel" 
                                                name="UpdateacadHighestLevel"
                                                required
                                                tabindex="">
                                                <small id='CheckacadHighestLevel'></small>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadYearGraduated" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Year Graduated (YYYY) 
                                            </label>
                                            <div class="col-sm-12">
                                                <select 
                                                name="UpdateacadYearGraduated" 
                                                id="UpdateacadYearGraduated" 
                                                class="form-control select2"
                                                style="width: 100%;"  
                                                tabindex="7"
                                                >
                                                </select>
                                                <small id='CheckUpdateacadYearGraduated'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateacadHonors" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Honors Received  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="UpdateacadHonors" 
                                                name="UpdateacadHonors"
                                                tabindex="">
                                                <small id='CheckacadHonors'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12" id="divReuploadMOV" name = "divReuploadMOV" >
                                            <label 
                                                for="UpdateacadMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Re-upload MOV  
                                            </label>
                                            <div class="col-sm-12">
                                            <input 
                                                type="file" 
                                                class="form-control" 
                                                id="UpdateacadMOV" 
                                                name="UpdateacadMOV" 
                                                value="" 
                                                tabindex="9"
                                                accept="application/pdf"
                                                onchange="validateUpdateFileTypeAcademic()">
                                            <small id='CheckUpdateacadMOV'></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="card col-md-6 card-bordered" id="divDisplayMOV" name = "divDisplayMOV" >
                                    <div class="form-group" id="divUploadedMOV" name = "divUploadedMOV" >
                                            <div class="col-md-12">
                                                <label 
                                                    for="UploadedMOV" 
                                                    class="col-sm-12" 
                                                    style="font-size: 15px;">
                                                    Uploaded MOV  
                                                </label>
                                                <div class="col-sm-12">
                                                    <iframe 
                                                    id="UploadedMOV" 
                                                    name="UploadedMOV" 
                                                    src="" 
                                                    width="100%"
                                                    height="600px"
                                                    >
                                                    
                                                    </iframe>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button 
                                    type="button" 
                                    class="btn btn-default pull-left" 
                                    data-dismiss="modal">
                                    Close
                                </button>
                                <button 
                                    type="submit" 
                                    class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="VerifyEligibilityUpload">
            <div class="modal-dialog"  style="width:auto; height:auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Verify Uploaded Eligibility</h4>
                    </div>
                <form id="frmEligibilitydVerify" name="frmEligibilitydVerify" autocomplete="off" >
                    <div class="box" style="border:0cm" >
                        <div class="box-body row">
                            <div class="card col-md-6" style="height: auto; width:750px">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyeligibilityCredentials" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Credentials
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                            <input
                                            type="hidden"
                                            name="VerifyEligibilityid"
                                            id="VerifyEligibilityid"
                                            >
                                            <input 
                                            class="form-control" 
                                            id="VerifyeligibilityCredentials" 
                                            name="VerifyeligibilityCredentials"
                                            readonly
                                            tabindex="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyeligibilityRating" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Rating
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="VerifyeligibilityRating" 
                                            name="VerifyeligibilityRating"
                                            tabindex="2"
                                            readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyeligibilityExamDate" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Date of Examination
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="date"
                                            class="form-control" 
                                            id="VerifyeligibilityExamDate" 
                                            name="VerifyeligibilityExamDate"
                                            tabindex="3"
                                            readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyeligibilityPlaceExamination" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Place of Examination  
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="text"
                                            class="form-control" 
                                            id="VerifyeligibilityPlaceExamination" 
                                            name="VerifyeligibilityPlaceExamination"
                                            readonly
                                            tabindex="4">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyeligibilityNumber" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            License Number  
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="text"
                                            class="form-control" 
                                            id="VerifyeligibilityNumber" 
                                            name="VerifyeligibilityNumber"
                                            readonly
                                            tabindex="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyeligibilityValidityDate" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Date of Validity  
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="date"
                                            class="form-control" 
                                            id="VerifyeligibilityValidityDate" 
                                            name="VerifyeligibilityValidityDate"
                                            readonly
                                            tabindex="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyEligibilityMOV" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Uploaded MOV  
                                        </label>
                                        <div class="col-sm-12">
                                            <iframe  
                                            id="VerifyUploadedEligibilityMOV" 
                                            name="VerifyUploadedEligibilityMOV" 
                                            src="" 
                                            width="100%"
                                            height="600px"
                                            frameborder="0">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="VerifyEligibilityRemarks" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Verification Remarks  
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            type="text"
                                            class="form-control" 
                                            id="VerifyEligibilityRemarks" 
                                            name="VerifyEligibilityRemarks"
                                            style="text-transform: uppercase;"
                                            tabindex=""
                                            required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button 
                                type="button" 
                                class="btn btn-default pull-left" 
                                data-dismiss="modal">
                                Close
                            </button>
                            <button 
                                type="submit" 
                                class="btn btn-danger">
                                Disapprove
                            </button>
                            <button 
                                type="button" 
                                name ="btnApproveEligibilityUpload"
                                id="btnApproveEligibilityUpload"
                                class="btn btn-primary">
                                Approve
                            </button>
                        </div>
                    </div>
                 </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "VerifyAcadsUpload">
            <div class="modal-dialog"  style="width:auto; height:auto;" >
                <div class="modal-content">
                    <form id="contentVerifyAcadsUpload" name="contentVerifyAcadsUpload" autocomplete="off" >
                        <div class="modal-header">
                            <button 
                                type="button" 
                                class="close" 
                                data-dismiss="modal" 
                                aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                            </button>
                            <h4 class="modal-title">Verify Uploaded Academic MOV </h4>
                        </div>
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6"  style="height: auto; width:750px">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadEducLevel" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Education Level
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input
                                                type="hidden"
                                                name="VerifyacadsId"
                                                id="VerifyacadsId"
                                                >
                                                <select 
                                                    class="form-control select2" 
                                                    style="width: 100%;"  
                                                    id="VerifyacadEducLevel" 
                                                    name="VerifyacadEducLevel" 
                                                    required
                                                    tabindex="1"
                                                    disabled
                                                    >
                                                    <option name = "UpdateoptNone" id="UpdateoptNone" value="" readonly>SELECT EDUCATIONAL LEVEL </option>
                                                    <option name = "UpdateoptElementary" id="UpdateoptElementary" value="1">Elementary</option>
                                                    <option name = "UpdateoptSecondary" id="UpdateoptSecondary" value="2">Secondary</option>
                                                    <option name = "UpdateoptCollage" id="UpdateoptCollage" value="3">College</option>
                                                    <option name = "UpdateoptVocational" id="UpdateoptVocational" value="4">Vocational / Trade Course</option>
                                                    <option name = "UpdateoptGraduate" id="UpdateoptGraduate" value="5">Graduate Studies</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadNameSchool" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Name of School
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="VerifyacadNameSchool" 
                                                name="VerifyacadNameSchool"
                                                readonly
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadDegree" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Basic Education / Degree / Course  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="VerifyacadDegree" 
                                                name="VerifyacadDegree"
                                                readonly
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadPeriodFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                From (YYYY)
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="number"
                                                class="form-control" 
                                                id="VerifyacadPeriodFrom" 
                                                name="VerifyacadPeriodFrom"
                                                required
                                                min="1900" 
                                                max="2100"
                                                readonly
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadPeriodTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                To (YYYY)
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="number"
                                                class="form-control" 
                                                id="VerifyacadPeriodTo" 
                                                name="VerifyacadPeriodTo"
                                                required
                                                min="1900" 
                                                max="2100"
                                                readonly
                                                tabindex="2">
                                                <small id='CheckacadPeriodTo'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadHighestLevel" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Highest Level/Units Earned  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="VerifyacadHighestLevel" 
                                                name="VerifyacadHighestLevel"
                                                readonly
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadYearGraduated" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Year Graduated (YYYY) 
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="number"
                                                class="form-control" 
                                                id="VerifyacadYearGraduated" 
                                                name="VerifyacadYearGraduated"
                                                readonly
                                                min="1900" 
                                                max="2100"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadHonors" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Honors Received  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="VerifyacadHonors" 
                                                name="VerifyacadHonors"
                                                tabindex=""
                                                readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyUploadedMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Uploaded MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <iframe  
                                                id="VerifyUploadedMOV" 
                                                name="VerifyUploadedMOV" 
                                                src="" 
                                                width="100%"
                                                height="600px"
                                                frameborder="0">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyacadRemarks" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Verification Remarks  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="VerifyacadRemarks" 
                                                name="VerifyacadRemarks"
                                                style="text-transform: uppercase;"
                                                tabindex=""
                                                required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button 
                                    type="button" 
                                    class="btn btn-default pull-left" 
                                    data-dismiss="modal">
                                    Close
                                </button>
                                <button 
                                    type="submit" 
                                    class="btn btn-danger">
                                    Disapprove
                                </button>
                                <button 
                                    type="button" 
                                    name ="btnApproveEducUpload"
                                    id="btnApproveEducUpload"
                                    class="btn btn-primary">
                                    Approve
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="VerifyTrainingUpload">
            <div class="modal-dialog" style="width: auto; height:auto;" >
                <div class="modal-content">
                    <form id="frmTrainingdVerify" name="frmTrainingdVerify" autocomplete="off" >
                        <div class="modal-header">
                            <button 
                                type="button" 
                                class="close" 
                                data-dismiss="modal" 
                                aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                            </button>
                            <h4 class="modal-title">Verify Training Information</h4>
                        </div>
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6" style="width: 750px; height: auto;" >
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifytrainingTitle" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Title of LDI
                                            </label>
                                            <div class="col-sm-12">
                                                <input
                                                type="hidden"
                                                name="VerifyTrainingID"
                                                id="VerifyTrainingID"
                                                >
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifytrainingTitle" 
                                                name="VerifytrainingTitle"
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifytrainingDateFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date From
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input
                                                readonly 
                                                type="date"
                                                class="form-control" 
                                                id="VerifytrainingDateFrom" 
                                                name="VerifytrainingDateFrom"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifytrainingDateTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date To
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                type="date"
                                                class="form-control" 
                                                id="VerifytrainingDateTo" 
                                                name="VerifytrainingDateTo"
                                                required
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifytrainingHours" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Total Number Of Hours  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifytrainingHours" 
                                                name="VerifytrainingHours"
                                                required
                                                tabindex="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifytrainingType" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Type of LDI
                                            </label>
                                            <div class="col-sm-12">
                                                <select 
                                                disabled
                                                type="text"
                                                class="form-control select2" 
                                                style="width: 100%;"
                                                id="VerifytrainingType" 
                                                name="VerifytrainingType"
                                                tabindex="">
                                                    <option 
                                                    name ="VerifyoptNone" 
                                                    id = "VerifyoptNone" 
                                                    value="">
                                                        --
                                                    </option>
                                                    <option 
                                                    name ="VerifyoptManagerial" 
                                                    id = "VerifyoptManagerial" 
                                                    value="1">
                                                        Managerial
                                                    </option>
                                                    <option 
                                                    name ="VerifyoptSupervisory" 
                                                    id = "VerifyoptSupervisory" 
                                                    value="2">
                                                        Supervisory
                                                    </option>
                                                    <option 
                                                    name ="VerifyoptTechnical" 
                                                    id = "VerifyoptTechnical" 
                                                    value="3">
                                                        Technical
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifytrainingConductedBy" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Conducted / Sponsored by
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                readonly
                                                class="form-control" 
                                                id="VerifytrainingConductedBy" 
                                                name="VerifytrainingConductedBy"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- here -->
                                </div>
                                <div class="card col-md-6">
                                <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UploadedTrainingMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Uploaded MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <iframe 
                                                name = "VerifyUploadedTrainingMOV"
                                                id="VerifyUploadedTrainingMOV"
                                                src="" 
                                                width="100%"
                                                height="600px"
                                                frameborder="0"
                                                scrolling="no" >
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="VerifyTrainingRemarks" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Verification Remarks  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="VerifyTrainingRemarks" 
                                                name="VerifyTrainingRemarks"
                                                style="text-transform: uppercase;"
                                                tabindex=""
                                                required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button 
                                    type="button" 
                                    class="btn btn-default pull-left" 
                                    data-dismiss="modal">
                                    Close
                                </button>
                                <button 
                                    type="submit" 
                                    class="btn btn-danger">
                                    Disapprove
                                </button>
                                <button 
                                    type="button" 
                                    name ="btnApproveTrainingUpload"
                                    id="btnApproveTrainingUpload"
                                    class="btn btn-primary">
                                    Approve
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="updateTraining">
            <div class="modal-dialog" style="width:auto; height:auto;" >
                <div class="modal-content">
                    <form id="frmTrainingdUpdate" name="frmTrainingdUpdate" autocomplete="off" >
                        <div class="modal-header">
                            <button 
                                type="button" 
                                class="close" 
                                data-dismiss="modal" 
                                aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                            </button>
                            <h4 class="modal-title">Training Information</h4>
                        </div>
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6" style="width: 750px; height:auto;" >
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updatetrainingTitle" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Title of LDI
                                            </label>
                                            <div class="col-sm-12">
                                                <input
                                                type="hidden"
                                                name="TrainingID"
                                                id="TrainingID"
                                                >
                                                <input type="hidden"
                                                name="currentTrainingFileName"
                                                id="currentTrainingFileName">
                                                <input 
                                                class="form-control" 
                                                id="updatetrainingTitle" 
                                                name="updatetrainingTitle"
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updatetrainingDateFrom" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date From
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="updatetrainingDateFrom" 
                                                name="updatetrainingDateFrom"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updatetrainingDateTo" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date To
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="updatetrainingDateTo" 
                                                name="updatetrainingDateTo"
                                                required
                                                tabindex="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updatetrainingHours" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Total Number Of Hours  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="updatetrainingHours" 
                                                name="updatetrainingHours"
                                                required
                                                tabindex="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updatetrainingType" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Type of LDI
                                            </label>
                                            <div class="col-sm-12">
                                                <select 
                                                type="text"
                                                class="form-control select2" 
                                                style="width: 100%;"
                                                id="updatetrainingType" 
                                                name="updatetrainingType"
                                                tabindex="">
                                                    <option 
                                                    name ="updateoptNone" 
                                                    id = "updateoptNone" 
                                                    value="">
                                                        --
                                                    </option>
                                                    <option 
                                                    name ="updateoptManagerial" 
                                                    id = "updateoptManagerial" 
                                                    value="1">
                                                        Managerial
                                                    </option>
                                                    <option 
                                                    name ="updateoptSupervisory" 
                                                    id = "updateoptSupervisory" 
                                                    value="2">
                                                        Supervisory
                                                    </option>
                                                    <option 
                                                    name ="updateoptTechnical" 
                                                    id = "updateoptTechnical" 
                                                    value="3">
                                                        Technical
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updatetrainingConductedBy" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Conducted / Sponsored by
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="updatetrainingConductedBy" 
                                                name="updatetrainingConductedBy"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                            for="UpdateTrainingMOV" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Re-upload MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                    type="file" 
                                                    class="form-control" 
                                                    id="UpdateTrainingMOV" 
                                                    name="UpdateTrainingMOV" 
                                                    value="" 
                                                    tabindex="9"
                                                    accept="application/pdf"
                                                    onchange="validateUpdateFileTypeTraining()">
                                                <small id='CheckUpdateTrainingMOV'></small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- here -->
                                </div>
                                <div class="card col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UploadedTrainingMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Uploaded MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <iframe 
                                                name = "UploadedTrainingMOV"
                                                id="UploadedTrainingMOV"
                                                src="" 
                                                width="100%"
                                                height="600px"
                                                frameborder="0"
                                                scrolling="no" >
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="box-footer" style="border:0cm;">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary btn-md pull-right">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!-- modal update info  -->
         <div class="modal fade" id="updateFB">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="contentUpdateFB" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Family Background Information</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label 
                                            for="Updaterelation" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Family Relation
                                        </label>
                                        <div class="col-sm-12">
                                            <input
                                            type="text"
                                            name="FBid"
                                            id="FBid"
                                            hidden>
                                            <input 
                                            type="hidden" 
                                            name="token" 
                                            value="<?=$_SESSION["token"]?>"> 
                                            <select 
                                                class="form-control select2" 
                                                style="width: 100%;"  
                                                id="updaterelation" 
                                                name="updaterelation" 
                                                required
                                                tabindex="6"
                                                >
                                                <option name = "updateoptNone" id="updateoptNone" value="">SELECT FAMILY RELATION </option>
                                                <option name = "updateoptSpouse" id="updateoptSpouse" value="1">Spouse</option>
                                                <option name = "updateoptChildren" id="updateoptChildren" value="2">Children</option>
                                                <option name = "updateoptFather" id="updateoptFather" value="3">Father</option>
                                                <option name = "updateoptMother" id="updateoptMother" value="4">Mother</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="divRequiredFields">
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBSname" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Surname
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBSname" 
                                            name="updateFBSname"
                                            required
                                            tabindex="2"
                                            style="text-transform: uppercase;">
                                            <small id='CheckupdateFBSname'></small>
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBFname" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            First Name
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBFname" 
                                            name="updateFBFname"
                                            required
                                            tabindex="2"
                                            style="text-transform: uppercase;">
                                            <small id='CheckupdateFBFname'></small>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBMname" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Middle Name
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBMname" 
                                            name="updateFBMname"
                                            tabindex="2"
                                            style="text-transform: uppercase;">
                                            <small id='CheckupdateFBMname'></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label 
                                            for="updateFBExtName" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Extension Name
                                        </label>
                                        <div class="col-sm-12">
                                            <select 
                                            class="form-control select2" 
                                            id="updateFBExtName" 
                                            name="updateFBExtName"
                                            tabindex="2"
                                            style="width: 100%;">
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
                                    <div class="col-md-3">
                                        <label 
                                            for="updateFBDOB" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Birthday
                                        </label>
                                        <div class="col-sm-12">
                                            <input type="date" 
                                            class="form-control" 
                                            id="updateFBDOB" 
                                            name="updateFBDOB"
                                            required
                                            tabindex="2"
                                            style="width: 100%;"
                                            max="<?=$today?>">
                                            <small id='updateCheckFBDOB'></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="divupdateSpouseFields" hidden>
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBoccupation" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Occupation
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBoccupation" 
                                            name="updateFBoccupation"
                                            required
                                            tabindex="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBBusinessName" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Employeer / Business Name
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBBusinessName" 
                                            name="updateFBBusinessName"
                                            required
                                            tabindex="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBBusinessAddress" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Business Address
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBBusinessAddress" 
                                            name="updateFBBusinessAddress"
                                            required
                                            tabindex="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label 
                                            for="updateFBTelephoneNo" 
                                            class="col-sm-12" 
                                            style="font-size: 15px;">
                                            Telephone Number
                                        </label>
                                        <div class="col-sm-12">
                                            <input 
                                            class="form-control" 
                                            id="updateFBTelephoneNo" 
                                            name="updateFBTelephoneNo"
                                            tabindex="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="updateEligibility">
            <div class="modal-dialog" style="width:auto; height:auto;">
                <div class="modal-content">
                        <div class="modal-header">
                            <button 
                                type="button" 
                                class="close" 
                                data-dismiss="modal" 
                                aria-label="Close">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                            </button>
                            <h4 class="modal-title">Eligibility</h4>
                        </div>
                    <form id="frmEligibilitydUpdate" name="frmEligibilitydUpdate" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-6" style="height: auto; width:750px"> 
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateeligibilityCredentials" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Credentials
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input
                                                type="text"
                                                name="Eligibilityid"
                                                id="Eligibilityid"
                                                hidden>
                                                <input type="hidden"
                                                name="currentEligibilityFileName"
                                                id="currentEligibilityFileName">
                                                <select 
                                                class="form-control select2"
                                                style="width: 100%;"
                                                name="UpdateeligibilityCredentials" 
                                                id="UpdateeligibilityCredentials"
                                                tabindex="1"
                                                >
                                                    <option value="">
                                                        SELECT ONE
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateeligibilityRating" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Rating
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="UpdateeligibilityRating" 
                                                name="UpdateeligibilityRating"
                                                tabindex="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateeligibilityExamDate" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date of Examination
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="UpdateeligibilityExamDate" 
                                                name="UpdateeligibilityExamDate"
                                                required
                                                tabindex="3"
                                                max="<?=$today?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateeligibilityPlaceExamination" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Place of Examination  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="UpdateeligibilityPlaceExamination" 
                                                name="UpdateeligibilityPlaceExamination"
                                                required
                                                tabindex="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateeligibilityNumber" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                License Number  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="text"
                                                class="form-control" 
                                                id="UpdateeligibilityNumber" 
                                                name="UpdateeligibilityNumber"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateeligibilityValidityDate" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Date of Validity  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                type="date"
                                                class="form-control" 
                                                id="UpdateeligibilityValidityDate" 
                                                name="UpdateeligibilityValidityDate"
                                                tabindex="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UpdateEligibilityMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Re-upload MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                    type="file" 
                                                    class="form-control" 
                                                    id="UpdateEligibilityMOV" 
                                                    name="UpdateEligibilityMOV" 
                                                    value="" 
                                                    tabindex="9"
                                                    accept="application/pdf"
                                                    onchange="validateUpdateFileTypeEligibility()">
                                                <small id='CheckUpdateEligibilityMOV'></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="UploadedEligibilityMOV" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Uploaded MOV  
                                            </label>
                                            <div class="col-sm-12">
                                                <iframe 
                                                name = "UploadedEligibilityMOV"
                                                id="UploadedEligibilityMOV"
                                                src="" 
                                                width="100%"
                                                height="600px"
                                                frameborder="0"
                                                scrolling="no" >
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer" style="border:0cm;">
                            <button 
                                type="submit" 
                                class="btn btn-primary btn-md pull-right">
                                Update
                            </button>
                        </div>
                </div>
                 </form>
            </div>
        </div>
        </div>
        <div class="modal fade" id="ViewUploadedMOV" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div>
                        <iframe 
                        name = "ViewVerifiedMOV"
                        id="ViewVerifiedMOV"
                        src="" 
                        width="100%"
                        height="600px"
                        frameborder="0"
                        scrolling="no" >
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. -->
        <div class="modal fade" id="updateSkills" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Special Skills and Hobbies Information</h4>
                    </div>
                    <form id="frmSkillsUpdate" name="frmSkillsUpdate" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updateskillsTitle" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Special Skills and Hobbies
                                            </label>
                                            <div class="col-sm-12">
                                                <input
                                                type="hidden"
                                                name="SkillsID"
                                                id="SkillsID">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input 
                                                class="form-control" 
                                                id="updateskillsTitle" 
                                                name="updateskillsTitle"
                                                tabindex="2"
                                                style="text-transform: uppercase;">
                                                <small id="CheckUpdateSkills"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="box-footer" style="border:0cm;">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary btn-md pull-right">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
        <div class="modal fade" id="updateReferences" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">References</h4>
                    </div>
                    <form id="frmReferencesUpdate" name="frmReferencesUpdate" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updateReferencesName" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Name
                                            </label>
                                            <div class="col-sm-12">
                                                <input
                                                type="hidden"
                                                name="ReferencesID"
                                                id="ReferencesID">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input 
                                                class="form-control" 
                                                id="updateReferencesName" 
                                                name="updateReferencesName"
                                                tabindex="1"
                                                style="text-transform: uppercase;"
                                                required>
                                                <small id="CheckUpdateReferencesName"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updateReferencesAddress" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Address
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="updateReferencesAddress" 
                                                name="updateReferencesAddress"
                                                tabindex="2"
                                                style="text-transform: uppercase;"
                                                required>
                                                <small id="CheckUpdateReferencesAddress"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updateReferencesMobile" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Address
                                            </label>
                                            <div class="col-sm-12">
                                                <input 
                                                class="form-control" 
                                                id="updateReferencesMobile" 
                                                name="updateReferencesMobile"
                                                tabindex="3"
                                                style="text-transform: uppercase;"
                                                onkeypress="return NumberOnly(event)"
                                                required>
                                                <small id="CheckUpdateReferencesMobile"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="box-footer" style="border:0cm;">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary btn-md pull-right">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
        <div class="modal fade" id="updateNonAcademic" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        
                        <h4 class="modal-title">Non-Academic Distinctions / Recognition Information</h4>
                    </div>
                    <form id="frmNonAcademicUpdate" name="frmNonAcademicUpdate" autocomplete="off" >
                        <div class="box" style="border:0cm" >
                            <div class="box-body row">
                                <div class="card col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label 
                                                for="updateNonAcademicTitle" 
                                                class="col-sm-12" 
                                                style="font-size: 15px;">
                                                Non-Academic Distinctions / Recognition
                                            </label>
                                            <div class="col-sm-12">
                                                <input
                                                type="hidden"
                                                name="NonAcademicID"
                                                id="NonAcademicID">
                                                <input 
                                                type="hidden" 
                                                name="token" 
                                                value="<?=$_SESSION["token"]?>"> 
                                                <input 
                                                class="form-control" 
                                                id="updateNonAcademicTitle" 
                                                name="updateNonAcademicTitle"
                                                tabindex="1"
                                                style="text-transform: uppercase;">
                                                <small id='CheckUpdateNonAcademic'></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="box-footer" style="border:0cm;">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary btn-md pull-right">
                                        Update
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
        <div class="modal fade" id="formAddHistory">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li id="tabOverviewPositionHistory"
                                    class="active">
                                    <a 
                                        href="#UpdatePositionDetails" 
                                        data-toggle="tab">
                                        Transfer Area of Assignment
                                    </a>
                                </li>
                                <li id="tabOverviewPositionHistory"
                                    class="">
                                    <a 
                                        href="#OverviewPositionHistory" 
                                        data-toggle="tab">
                                        Position History
                                    </a>
                                </li>
                                <li id="tabAddPositionHistory"
                                    class="">
                                    <a 
                                        href="#AddPositionHistory" 
                                        data-toggle="tab">
                                        Add History
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" style = "background-color:white;">
                                <?php
                                    include "tabPositionAddHistory.php";
                                    include "tabPositionOverviewHistory.php";
                                    include "tabPositionDetails.php";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "changePassword">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                        </button>
                        <h4 class="modal-title">Change Password</h4>
                    </div>
                    <form id="frmProfileChangePass" name="frmProfileChangePass" autocomplete="off" >
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label 
                                        for="OldPassword" 
                                        class="col-sm-12" 
                                        style="font-size: 15px;">
                                        Old Password
                                        <span 
                                            class="requiredField">
                                        </span>
                                    </label>
                                    <div class="col-sm-12">
                                        <input 
                                        type="hidden" 
                                        name="token" 
                                        value="<?=$_SESSION["token"]?>"> 
                                        <div class="input-group has-feedback col-sm-12">
                                        <input type="hidden"
                                        name="sessionID"
                                        id="sessionID"
                                        value="<?=$_SESSION['userID']?>";
                                        >
                                            <input 
                                                type="password" 
                                                class="form-control col-sm-10" 
                                                id="OldPassword" 
                                                name="OldPassword" 
                                                placeholder="Old Password" 
                                                required="true" 
                                                tabindex="1">
                                                <span class="input-group-addon">
                                                    <i 
                                                        class="fa fa-eye-slash toggle-OldPassword " 
                                                        toggle = "#OldPassword"  
                                                        id="toggleOldPassword">
                                                    </i>
                                            </span>
                                        </div>
                                        <small id="checkOldPassword"></small>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <label 
                                        for="NewPassword" 
                                        class="col-sm-12" 
                                        style="font-size: 15px;">
                                        New Password
                                        <span 
                                            class="requiredField">
                                        </span>
                                    </label>
                                    <div class="col-sm-12">
                                        <div class="input-group has-feedback col-sm-12">
                                            <input 
                                                type="password" 
                                                class="form-control col-sm-10" 
                                                id="NewPassword" 
                                                name="NewPassword" 
                                                placeholder="New Password" 
                                                required="true" 
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                                tabindex="1"
                                                onkeyup="StrongPassword()"
                                                onfocus="showMessage()"
                                                onblur="hideMessage()">
                                                <span class="input-group-addon">
                                                    <i 
                                                        class="fa fa-eye-slash toggle-NewPassword " 
                                                        toggle = "#NewPassword"  
                                                        id="toggleNewPassword">
                                                    </i>
                                            </span>
                                        </div>
                                        <small id="checkNewPassword"></small>
                                    </div>
                                    <div class="card col-md-12">
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
                                <div class="col-md-12">
                                    <label 
                                        for="ConfirmPassword" 
                                        class="col-sm-12" 
                                        style="font-size: 15px;">
                                        Confirm Password
                                        <span 
                                            class="requiredField">
                                        </span>
                                    </label>
                                    <div class="col-sm-12">
                                        <div class="input-group has-feedback col-sm-12">
                                            <input 
                                                type="password" 
                                                class="form-control col-sm-10" 
                                                id="ConfirmPassword" 
                                                name="ConfirmPassword" 
                                                placeholder="Confirm Password" 
                                                required="true" 
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                                tabindex="2"
                                                onkeyup="checkPasswordMatch()">
                                                <span class="input-group-addon">
                                                    <i 
                                                        class="fa fa-eye-slash toggle-NewPassword " 
                                                        toggle = "#ConfirmPassword"  
                                                        id="toggleConfirmPassword">
                                                    </i>
                                            </span>
                                        </div>
                                        <small id='checkmessage'></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button 
                                    type="submit"
                                    id="btnChangePassword" 
                                    name="btnChangePassword"
                                    class="btn btn-primary btn-md pull-right">
                                    Change Password
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalConfirmDelete"> 
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="frmConfirmDelete" 
                    autocomplete="off">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">User confirmation needed</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="row">
                                <input 
                                type="hidden" 
                                name="token" 
                                value="<?=$_SESSION["token"]?>">
                                <input
                                type="hidden"
                                name="DeleteID"
                                id="DeleteID">
                                <input
                                type="hidden"
                                name="DeletePHP"
                                id="DeletePHP">
                                <p style="text-align:center; font-size:18px; font-style:italic;">
                                    Are you sure you want to remove this information?
                                </p>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button 
                            type="button" 
                            class="btn btn-default pull-left" 
                            data-dismiss="modal"
                            tabindex="10">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-danger"
                            tabindex="9">
                            Yes
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
