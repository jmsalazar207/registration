<div class="tab-pane" id="otherInfo">
    <div class="user-block">
        <form id="frmUserOtherInfoUpdate" name="frmUserOtherInfoUpdate" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label 
                                for="Citizenship" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Citizenship
                            </label>
                            <div class="col-sm-12">
                                <input 
                                type="hidden" 
                                name="token" 
                                value="<?=$_SESSION["token"]?>"> 
                                <input 
                                type="checkbox"
                                name="chkFilipino"
                                id="chkFilipino"
                                tabindex="1"
                                required> 
                                FILIPINO
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label 
                                for="DualCitizenship" 
                                class="col-sm-12"
                                style="font-size: 15px;">
                                Dual Citizenship
                            </label>
                            <div class="col-md-6">
                            <input 
                                type="checkbox"
                                name="chkByBirth"
                                id="chkByBirth"
                                tabindex="2"> 
                                By Birth
                            </div>
                            <div class="col-md-6">
                            <input 
                                type="checkbox"
                                name="chkByNaturalization"
                                id="chkByNaturalization"
                                tabindex="3"> 
                                By Naturalization 
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <label 
                                for="DualCitizenCountry" 
                                class="col-sm-12"
                                id="lblDualCitizenCountry" 
                                name="lblDualCitizenCountry"
                                style="font-size: 15px;">
                                Select Country
                            </label>
                            <div class="col-sm-12">
                                <select 
                                    class="form-control select2" 
                                    style="width: 100%;"  
                                    id="DualCitizenCountry" 
                                    name="DualCitizenCountry" 
                                    tabindex="4"
                                    disabled
                                    required>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label 
                                for="PlaceOfBirth" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Place of Birth
                            </label>
                            <div class="col-sm-12">
                                <select 
                                class="form-control select2" 
                                style="width: 100%;"  
                                id="PlaceOfBirth" 
                                name="PlaceOfBirth" 
                                required="true" 
                                tabindex="5">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label 
                                for="CivilStatus" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Civil Status
                            </label>
                            <div class="col-sm-12">
                                <select 
                                    class="form-control select2" 
                                    style="width: 100%;"  
                                    id="CivilStatus" 
                                    name="CivilStatus" 
                                    required
                                    tabindex="6">
                                    <option name = "optNone" id="optNone" value="">SELECT CIVIL STATUS </option>
                                    <option name = "optSingle" id="optSingle" value="1">Single</option>
                                    <option name = "optWidowed" id="optWidowed" value="2">Widowed</option>
                                    <option name = "optMarried" id="optMarried" value="3">Married</option>
                                    <option name = "optSeperated" id="optSeperated" value="4">Seperated</option>
                                    <option name = "optOthers" id="optOthers" value="5">Other/s</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label 
                                for="OthersCivilStatus" 
                                class="col-sm-12" 
                                style="font-size: 15px;"
                                id="lblOthersCivilStatus"
                                name="lblOthersCivilStatus" >
                                Other/s
                            </label>
                            <div class="col-sm-12">
                                <input 
                                    class="form-control" 
                                    id="OthersCivilStatus" 
                                    name="OthersCivilStatus"
                                    disabled
                                    required
                                    tabindex="7"
                                    style="text-transform: uppercase;">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label 
                                for="Height" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Height (m)
                            </label>
                            <div class="col-sm-12">
                                <input 
                                    class="form-control" 
                                    id="Height" 
                                    name="Height"
                                    required
                                    tabindex="8">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label 
                                for="Weight" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Weight (kg)
                            </label>
                            <div class="col-sm-12">
                                <input 
                                class="form-control" 
                                id="Weight" 
                                name="Weight"
                                required
                                tabindex="9">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label 
                                for="BloodType" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Blood Type
                            </label>
                            <div class="col-sm-12">
                                <select 
                                    class="form-control select2"
                                    style="width: 100%;" 
                                    id="BloodType" 
                                    name="BloodType"
                                    tabindex="10">
                                        <?php 
                                            echo fill_blood_type($dbConn,null);
                                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label 
                                for="gsisNo" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                GSIS ID Number
                            </label>
                            <div class="col-sm-12">
                                <input 
                                class="form-control" 
                                id="gsisNo" 
                                name="gsisNo"
                                tabindex="11">
                                <small id='CheckGSIS'></small>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <label 
                                for="pagibigNo" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                PAG-IBIG ID Number
                            </label>
                            <div class="col-sm-12">
                                <input 
                                class="form-control" 
                                id="pagibigNo" 
                                name="pagibigNo"
                                tabindex="12"
                                required>
                                <small id='CheckPAGIBIG'></small>
                            </div>
                           
                        </div>
                        <div class="col-md-4">
                            <label 
                                for="philhealthNo" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                PHILHEALTH ID Number
                            </label>
                            <div class="col-sm-12">
                                <input 
                                class="form-control" 
                                id="philhealthNo" 
                                name="philhealthNo"
                                tabindex="13"
                                required>
                                <small id='CheckPHILHEALTH'></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label 
                                for="sssNo" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                SSS ID Number
                            </label>
                            <div class="col-sm-12">
                                <input 
                                    class="form-control" 
                                    id="sssNo" 
                                    name="sssNo"
                                    tabindex="14"
                                    >
                                    <small id='CheckSSS'></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label 
                                for="tinNo" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                TIN ID Number
                            </label>
                            <div class="col-sm-12">
                                <input 
                                    class="form-control" 
                                    id="tinNo" 
                                    name="tinNo"
                                    tabindex="15"
                                    required>
                                    <small id='CheckTIN'></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="border:0cm;">
                    <button 
                        type="submit" 
                        id="btnUserUpdateOtherBasicInfo"
                        name="btnUserUpdateOtherBasicInfo"
                        class="btn btn-primary btn-md pull-right">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>