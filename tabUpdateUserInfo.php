<div class="tab-pane" id="AdminUpdateUserInfo" >
    <div class="user-block">
        <form 
        method="POST" 
        id="contentAdminUpdatePersonalInfo" 
        autocomplete="off">
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="col-md-12">
                        <label 
                            for="txtEmpno" 
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
                    <div class="col-md-12">
                        <label 
                            for="txtFName" 
                            class="col-sm-12 requiredField">
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
                    <div class="col-md-12">
                        <label 
                            for="txtLName" 
                            class="col-sm-12 requiredField">
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
                                tabindex="5">
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
                    <div class="col-md-12" id="divSex" >
                        <label 
                            for="txtSex" 
                            class="col-sm-12 requiredField">
                            Sex
                        </label>
                        <div class="input-group col-sm-12">
                            <select 
                                class="form-control select2"
                                style="width: 100%;"  
                                id="txtSex" 
                                name="txtSex" 
                                tabindex="6"
                                required>
                                    <option value="">--</option>
                                    <option value="0">MALE</option>
                                    <option value="1">FEMALE</option>
                            </select>
                        </div>
                        <small id='checkTxtExtName'></small>
                    </div>
                    <div class="col-md-12" id="divBirthdate">
                        <label 
                            for="txtBirthdate" 
                            class="col-sm-12 requiredField">
                            Birthday
                        </label>
                        <div class="input-group col-sm-12">
                            <input 
                                type="date" 
                                class="form-control" 
                                name="txtBirthdate" 
                                id="txtBirthdate" 
                                required="true" 
                                tabindex="7"
                                max ="<?=$today?>">
                        </div>
                        <small id='checktxtBirthdate'></small>
                    </div>
                    <div class="col-md-12" id="divEmailAddress">
                        <label 
                            for="txtEmailAddress" 
                            class="col-sm-12 requiredField">
                            Email Address
                        </label>
                        <div class="input-group col-sm-12">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="txtEmailAddress" 
                                id="txtEmailAddress" 
                                placeholder="Email Address" 
                                value="" 
                                required="true" 
                                tabindex="8">
                        </div>
                        <small id='checktxtEmailAddress'></small>
                    </div>
                    <div class="col-md-12" id="divMobileNumber" >
                        <label 
                            for="txtMobileNumber" 
                            class="col-sm-12 requiredField">
                            Mobile Number
                        </label>
                        <div class="input-group col-sm-12">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="txtMobileNumber" 
                                id="txtMobileNumber" 
                                placeholder="Mobile Number" 
                                value="" 
                                style="text-transform: uppercase;" 
                                required="true" 
                                tabindex="9"
                                onkeypress="return NumberOnly(event)">
                        </div>
                        <small id='checktxtMobileNumber'></small>
                    </div>
                    <div class="col-md-12" id="divRegion" >
                        <label 
                            for="txtRegion" 
                            class="col-sm-12 requiredField">
                            Region
                        </label>
                        <div class="input-group col-sm-12">
                            <select 
                                class="form-control select2"
                                style="width: 100%;"  
                                id="txtRegion" 
                                name="txtRegion" 
                                tabindex="10"
                                required>
                                <?php
                                    echo fill_region($dbConn, null);
                                ?>
                            </select>
                        </div>
                        <small id='checktxtRegion'></small>
                    </div>
                    <div class="col-md-12" id="divProvince" >
                        <label 
                            for="txtProvince" 
                            class="col-sm-12 requiredField">
                            Province
                        </label>
                        <div class="input-group col-sm-12">
                            <select 
                                class="form-control select2"
                                style="width: 100%;"  
                                id="txtProvince" 
                                name="txtProvince" 
                                tabindex="11"
                                required>
                            </select>
                        </div>
                        <small id='checktxtProvince'></small>
                    </div>
                    <div class="col-md-12" id="divCity" >
                        <label 
                            for="txtCity" 
                            class="col-sm-12 requiredField">
                            City
                        </label>
                        <div class="input-group col-sm-12">
                            <select 
                                class="form-control select2"
                                style="width: 100%;"  
                                id="txtCity" 
                                name="txtCity" 
                                tabindex="12"
                                required>
                            </select>
                        </div>
                        <small id='checktxtCity'></small>
                    </div>
                    <div class="col-md-12" id="divBrgy" >
                        <label 
                            for="txtBrgy" 
                            class="col-sm-12 requiredField">
                            Barangay
                        </label>
                        <div class="input-group col-sm-12">
                            <select 
                                class="form-control select2"
                                style="width: 100%;"  
                                id="txtBrgy" 
                                name="txtBrgy" 
                                tabindex="13"
                                required>
                            </select>
                        </div>
                        <small id='checktxtBrgy'></small>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button 
                    type="button" 
                    class="btn btn-default pull-left" 
                    data-dismiss="modal">
                    Close
                </button>
                <button 
                    type="submit" 
                    id="btnUpdatePersonalInfo"
                    name="btnUpdatePersonalInfo"
                    class="btn btn-primary btn-md pull-right">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>