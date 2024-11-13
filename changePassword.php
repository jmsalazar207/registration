<div class="tab-pane" id="changePassword">
    <div class="user-block">
        <h4 class="col-md-12">
            Change Password
        </h4>
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
                                    tabindex="1">
                                    <span class="input-group-addon">
                                        <i 
                                            class="fa fa-eye-slash toggle-NewPassword " 
                                            toggle = "#NewPassword"  
                                            id="toggleNewPassword">
                                        </i>
                                  </span>
                            </div>
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
                                    tabindex="1">
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
            <div class="footer">
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