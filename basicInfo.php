<div class="tab-pane" id="basicInfo">
    <div class="user-block">
        <form id="frmUserBasicInfoUpdate" name="frmUserBasicInfoUpdate" autocomplete="off" method="POST">
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label 
                                for="AddFullName" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Full Name
                            </label>
                            <div class="col-sm-12">
                                <input
                                type="hidden"
                                class="form-control" 
                                id="AddEmpNo" 
                                name="AddEmpNo" 
                                value="<?=$_SESSION["userID"]?>"
                                >
                                <input 
                                    type="text"
                                    class="form-control" 
                                    id="AddFullName" 
                                    name="AddFullName" 
                                    placeholder="Full Name" 
                                    value="" 
                                    tabindex=""
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;" >
                        <div class="col-md-6">
                            <label 
                                for="AddSex" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Sex
                            </label>
                            <div class="col-sm-12">
                                <input 
                                    type="text"
                                    class="form-control" 
                                    id="AddSex" 
                                    name="AddSex" 
                                    placeholder="Sex" 
                                    value="" 
                                    tabindex=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label 
                                for="AddDOB" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Birthday
                            </label>
                            <div class="col-sm-12">
                                <input 
                                    type="text"
                                    class="form-control" 
                                    id="AddDOB" 
                                    name="AddDOB" 
                                    placeholder="Birthday" 
                                    value="" 
                                    tabindex=""
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group col-md-12">
                        <input 
                        type="checkbox" 
                        id="sameAddressCheckbox" 
                        name="sameAddressCheckbox" 
                        style="margin-left: 15px;"> 
                        <label 
                        for="sameAddressCheckbox" 
                        style="margin-left: 5px;">
                            Use the same address.
                        </label>
                    </div>
                    <div class="card col-md-6"> <!-- card for residential -->
                        <div class="form-group col-md-12">
                            <h4 style="font-weight: bolder;" >
                                Residential Address
                            </h4>
                        </div>
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
                                        type="hidden" 
                                        name="token" 
                                        value="<?=$_SESSION["token"]?>"> 
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="AddHouseNumber" 
                                            name="AddHouseNumber" 
                                            placeholder="House #" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            onkeypress="return NumberOnly(event)" 
                                            tabindex="1">
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
                                            tabindex="2">
                                        <small id='CheckAddStreet'></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddSubd" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Subdivision/Village
                            </label>
                            <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddSubd" 
                                name="AddSubd" 
                                placeholder="Subdivision/Village" 
                                value="" 
                                style="text-transform: uppercase;" 
                                tabindex="3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddRegion" 
                                class="col-sm-12 requiredField" 
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
                                    tabindex="4">
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddProvince" 
                                class="col-sm-12 requiredField" 
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
                                        tabindex="5">
                                            <option>
                                                SELECT REGION FIRST
                                            </option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddCity" 
                                class="col-sm-12 requiredField"  
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
                                        tabindex="6">
                                            <option>
                                                SELECT PROVINCE FIRST
                                            </option>
                                    </select>
                                </div>
                        </div> 
                        <div class="form-group">
                            <label 
                                for="AddBarangay" 
                                class="col-sm-12 requiredField" 
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
                                        tabindex="7">
                                            <option>
                                                SELECT MUNICIPALITY FIRST
                                            </option>
                                    </select> 
                                </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddZipCode" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Zip Code
                            </label>
                            <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddZipCode" 
                                name="AddZipCode" 
                                placeholder="Zip Code" 
                                value="" 
                                style="text-transform: uppercase;" 
                                tabindex="8"
                                onkeypress="return NumberOnly(event)"
                                required>
                            </div>
                        </div>
                    </div> <!-- end card for residential -->

                    <div class="card col-md-6"> <!-- card for permanent -->
                        <div class="form-group col-md-12">
                            <h4 style="font-weight: bolder;" >
                                Permanent Address
                            </h4>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label 
                                        for="AddPermanentHouseNumber" 
                                        class="col-sm-12" 
                                        style="font-size: 15px;">
                                        House Number
                                    </label>
                                    <div class="col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="AddPermanentHouseNumber" 
                                            name="AddPermanentHouseNumber" 
                                            placeholder="House #" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            onkeypress="return NumberOnly(event)" 
                                            tabindex="9">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label 
                                        for="AddPermanentStreet" 
                                        class="col-sm-12" 
                                        style="font-size: 15px;">
                                        Street
                                    </label>
                                    <div class="col-sm-12">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="AddPermanentStreet" 
                                            name="AddPermanentStreet" 
                                            placeholder="Street" 
                                            value="" 
                                            style="text-transform: uppercase;" 
                                            tabindex="10">
                                        <small id='CheckAddPermanentStreet'></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddPermanentSubd" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Subdivision/Village
                            </label>
                            <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddPermanentSubd" 
                                name="AddPermanentSubd" 
                                placeholder="Subdivision/Village" 
                                value="" 
                                style="text-transform: uppercase;" 
                                tabindex="11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddPermanentRegion" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Region
                            </label>
                            <div class="col-sm-12">
                                <select 
                                    class="form-control select2" 
                                    style="width: 100%;"  
                                    id="AddPermanentRegion" 
                                    name="AddPermanentRegion" 
                                    required="true" 
                                    tabindex="12">
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddPermanentProvince" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Province
                            </label>
                                <div class="col-sm-12">
                                    <select 
                                        class="form-control select2" 
                                        style="width: 100%;"  
                                        id="AddPermanentProvince" 
                                        name="AddPermanentProvince" 
                                        required="true" 
                                        tabindex="13">
                                            <option>
                                                SELECT REGION FIRST
                                            </option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddPermanentCity" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                City
                            </label>
                                <div class="col-sm-12">
                                    <select 
                                        class="form-control select2" 
                                        style="width: 100%;" 
                                        id="AddPermanentCity" 
                                        name="AddPermanentCity" 
                                        required="true" 
                                        tabindex="14">
                                            <option>
                                                SELECT PROVINCE FIRST
                                            </option>
                                    </select>
                                </div>
                        </div> 
                        <div class="form-group">
                            <label 
                                for="AddPermanentBarangay" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Barangay
                            </label>
                                <div class="col-sm-12">
                                    <select 
                                        class="form-control select2"
                                        style="width: 100%;"  
                                        id="AddPermanentBarangay" 
                                        name="AddPermanentBarangay" 
                                        required="true" 
                                        tabindex="15"
                                        style="pointer-events: none;">
                                            <option>
                                                SELECT MUNICIPALITY FIRST
                                            </option>
                                    </select> 
                                </div>
                        </div>
                        <div class="form-group">
                            <label 
                                for="AddPermanentZipCode" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                Zip Code
                            </label>
                            <div class="col-sm-12">
                                <input 
                                type="text" 
                                class="form-control" 
                                id="AddPermanentZipCode" 
                                name="AddPermanentZipCode" 
                                placeholder="Zip Code" 
                                value="" 
                                style="text-transform: uppercase;" 
                                tabindex="16"
                                onkeypress="return NumberOnly(event)"
                                required>
                            </div>
                        </div>
                    </div> <!-- end card for permanent -->
                    <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="AddMobileNo" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Mobile Number
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="AddMobileNo" 
                                        name="AddMobileNo" 
                                        placeholder="MOBILE NUMBER" 
                                        value="" 
                                        style="text-transform: uppercase;" 
                                        tabindex="16"
                                        required
                                        onkeypress="return NumberOnly(event)">
                                        
                                    <small id='CheckAddMobileNo'></small>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="AddTelephoneNo" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Telephone Number
                                    <span class="requiredField"></span>
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="AddTelephoneNo" 
                                        name="AddTelephoneNo" 
                                        placeholder="TELEPHONE NUMBER" 
                                        value="" 
                                        style="text-transform: uppercase;" 
                                        tabindex="18"
                                        onkeypress="return NumberOnly(event)">
                                        
                                    <small id='CheckAddMobileNo'></small>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="AddEmail" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Email Address
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                        type="email"
                                        class="form-control" 
                                        id="AddEmail" 
                                        name="AddEmail" 
                                        placeholder="EMAIL ADDRESS" 
                                        value="" 
                                        tabindex="19"
                                        required>
                                    <small id='CheckAddEmail'></small>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="box-footer" style="border:0cm;">
                    <button 
                        type="submit"
                        id="btnUserBasicInfoUpdate"
                        name="btnUserBasicInfoUpdate" 
                        class="btn btn-primary btn-md pull-right">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>