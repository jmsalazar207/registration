<div class="tab-pane" id="career">
    <div class="user-block">
        <form id="frmUserCareerdAdd" name="frmUserCareerdAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-6">
                                    <input type="hidden"
                                    name="encodedCareerCount"
                                    id="encodedCareerCount"
                                    > 
                                <label 
                                    for="careerDateFrom" 
                                    class="col-sm-12 requiredField" 
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
                                    id="careerDateFrom" 
                                    name="careerDateFrom"
                                    required
                                    tabindex="1"
                                    max="<?=$today?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="careerDateTo" 
                                    class="col-sm-3 requiredField" 
                                    style="font-size: 15px;">
                                    Date To
                                </label>
                                <label for=""
                                    id="labelCareerPresent"
                                    name = "labelCareerPresent"
                                    class="col-sm-3" 
                                    style="font-size: 15px;">
                                    <input 
                                    type="checkbox"
                                    name="careerPresent" 
                                    id="careerPresent"
                                    onclick="careerPresentCheck()"
                                    >
                                    PRESENT
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="careerDateTo" 
                                    name="careerDateTo"
                                    required
                                    tabindex="2"
                                    max="<?=$today?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="careerPosition" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Position Title
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="careerPosition" 
                                    name="careerPosition"
                                    required
                                    tabindex="3"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="careerOrganization" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Organization
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="careerOrganization" 
                                    name="careerOrganization"
                                    required
                                    tabindex="4"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label 
                                    for="careerSalary" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Monthly Salary  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="careerSalary" 
                                    name="careerSalary"
                                    required
                                    tabindex="5"
                                    onkeypress="return NumberOnly(event)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label 
                                    for="careerCompensention" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Compensention Level
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="text"
                                    class="form-control" 
                                    id="careerCompensention" 
                                    name="careerCompensention"
                                    tabindex="6"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label 
                                    for="careerStatusAppointment" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Status of Appointment
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="careerStatusAppointment" 
                                    name="careerStatusAppointment"
                                    tabindex="7"
                                    required
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="careerGovtService" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Government Service
                                </label>
                                <div class="col-md-12">
                                    <select 
                                    class="form-control select2" 
                                    style="width: 100%;"  
                                    id="careerGovt" 
                                    name="careerGovt" 
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
                            <div class="col-md-6">
                                <label 
                                    for="careerMOV" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Upload MOV  
                                </label>
                                <div class="col-sm-12">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="careerMOV" 
                                    name="careerMOV" 
                                    value="" 
                                    required="true" 
                                    tabindex="9"
                                    accept="application/pdf"
                                    onchange="validateFileTypeCareer()">
                                <small id='CheckcareerMOV'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right"
                            tabindex="10"
                            >
                            Add
                        </button>
                    </div>
            </div>
        </form>
        <div class="box" style="border-width: 0%;" >
            <table id="tblcareer" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Period </th>
                          <th> Position Title </th>
                          <th> Organization </th>
                          <th> Monthly Salary </th>
                          <th> Compensention Level </th>
                          <th> Status of Appointment </th>
                          <th> Gov't Service </th>
                          <th> Upload Status </th>
                          <th> Upload Remarks </th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
</div>
