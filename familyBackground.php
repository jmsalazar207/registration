<div class="tab-pane" id="familyBackground">
    <div class="user-block">
        <form id="frmFamilyBackgroundAdd" name="frmFamilyBackgroundAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="relation" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Family Relation
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <select 
                                        class="form-control select2" 
                                        style="width: 100%;"  
                                        id="relation" 
                                        name="relation" 
                                        required
                                        tabindex="1"
                                        onchange="FBMember()"
                                        >
                                        <option name = "optNone" id="optNone" value="">SELECT FAMILY RELATION </option>
                                        <option name = "optSpouse" id="optSpouse" value="1">Spouse</option>
                                        <option name = "optChildren" id="optChildren" value="2">Children</option>
                                        <option name = "optFather" id="optFather" value="3">Father</option>
                                        <option name = "optMother" id="optMother" value="4">Mother</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="divRequiredFields">
                            <div class="col-md-6">
                                <label 
                                    for="FBSname" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Surname
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBSname" 
                                    name="FBSname"
                                    required
                                    tabindex="2"
                                    style="text-transform: uppercase;">
                                    <small id='CheckFBSname'></small>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="FBFname" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    First Name
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBFname" 
                                    name="FBFname"
                                    required
                                    tabindex="3"
                                    style="text-transform: uppercase;">
                                    <small id='CheckFBFname'></small>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="FBMname" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Middle Name
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBMname" 
                                    name="FBMname"
                                    tabindex="4"
                                    style="text-transform: uppercase;">
                                    <small id='CheckFBMname'></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label 
                                    for="FBExtName" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Extension Name
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    class="form-control select2" 
                                    id="FBExtName" 
                                    name="FBExtName"
                                    tabindex="5"
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
                                    for="FBDOB" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Birthday
                                </label>
                                <div class="col-sm-12">
                                    <input type="date" 
                                    class="form-control" 
                                    id="FBDOB" 
                                    name="FBDOB"
                                    required
                                    tabindex="6"
                                    style="width: 100%;"
                                    max="<?=$today?>">
                                    <small id='CheckFBDOB'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="divSpouseFields" hidden>
                            <div class="col-md-6">
                                <label 
                                    for="FBoccupation" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Occupation
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBoccupation" 
                                    name="FBoccupation"
                                    required
                                    tabindex="7"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="FBBusinessName" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Employeer / Business Name
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBBusinessName" 
                                    name="FBBusinessName"
                                    required
                                    tabindex="8"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="FBBusinessAddress" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Business Address
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBBusinessAddress" 
                                    name="FBBusinessAddress"
                                    required
                                    tabindex="9"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="FBTelephoneNo" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Telephone Number
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="FBTelephoneNo" 
                                    name="FBTelephoneNo"
                                    tabindex="10"
                                    onkeypress="return NumberOnly(event)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right"
                            tabindex="11"
                            >    
                            Insert
                        </button>
                    </div>
            </div>
        </form>
        <div class="box" style="border-width: 0%;" >
            <table id="tblFBMember" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Relation </th>
                          <th> Last Name </th>
                          <th> First Name </th>
                          <th> Middle Name </th>
                          <th> Extention Name </th>
                          <th> Birthday </th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
</div>
