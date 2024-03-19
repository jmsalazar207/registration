      <!-- modal for add user -->
      <div class="modal fade" id="addNewUser">
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="contentAdd" 
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
                                        class="col-sm-12">
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
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            onkeypress="return NumberOnly(event)" 
                                            tabindex="1">
                                    </div>
                                    <small id='checkTxtAddEmpno'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtAddFName" 
                                        class="col-sm-12">
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
                                        class="col-sm-12">
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
                                        class="col-sm-12">
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
                            type="submit" 
                            class="btn btn-primary">
                            Save changes
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
        <div class="modal fade" id="formUser">
          <div class="modal-dialog">
            <div class="modal-content">
                <form 
                    method="POST" 
                    id="contentUpdate" 
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
                        <h4 class="modal-title">Update User Information</h4>
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
                                            type="hidden" 
                                            class="form-control" 
                                            name="txtOldEmpno" 
                                            id="txtOldEmpno" 
                                            >

                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtEmpno" 
                                            id="txtEmpno" 
                                            placeholder="Employee Number" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            onkeypress="return NumberOnly(event)" 
                                            tabindex="1">
                                    </div>
                                    <small id='checkTxtEmpno'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtFName" 
                                        class="col-sm-12">
                                        First Name
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtFName" 
                                            id="txtFName" 
                                            placeholder="First Name" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="2">
                                    </div>
                                    <small id='checkTxtFName'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtMName" 
                                        class="col-sm-12">
                                        Middle Name
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtMName"
                                            id="txtMName" 
                                            placeholder="Middle Name" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            tabindex="3">
                                    </div>
                                    <small id='checkTxtMName'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtLName" 
                                        class="col-sm-12">
                                        Last Name
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="txtLName" 
                                            id="txtLName" 
                                            placeholder="Last Name" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            required="true" 
                                            tabindex="4">
                                    </div>
                                    <small id='checkTxtLName'></small>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label 
                                        for="txtExtName" 
                                        class="col-sm-12">
                                        Ext Name
                                    </label>
                                    <div class="input-group col-sm-12">
                                        <select 
                                            class="form-control select2"
                                            style="width: 100%;"  
                                            id="txtExtName" 
                                            name="txtExtName" 
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
                                    <small id='checkTxtExtName'></small>
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
        <!-- /.modalUpdate -->


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