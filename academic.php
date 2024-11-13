<div class="tab-pane" id="academic">
    <div class="user-block">
        <form id="frmAcademicAdd" name="frmAcademicAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="acadEducLevel" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Education Level
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>">
                                    <input type="hidden"
                                    name="encodedCount"
                                    id="encodedCount"
                                    > 
                                    <select 
                                        class="form-control select2" 
                                        style="width: 100%;"  
                                        id="acadEducLevel" 
                                        name="acadEducLevel" 
                                        required
                                        tabindex="1"
                                        onchange="EducLevel()"
                                        >
                                        <option name = "optNone" id="optNone" value="">SELECT EDUCATIONAL LEVEL </option>
                                        <option name = "optElementary" id="optElementary" value="1">Elementary</option>
                                        <option name = "optSecondary" id="optSecondary" value="2">Secondary</option>
                                        <option name = "optCollage" id="optCollage" value="3">College</option>
                                        <option name = "optVocational" id="optVocational" value="4">Vocational / Trade Course</option>
                                        <option name = "optGraduate" id="optGraduate" value="5">Graduate Studies</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="divRequiredFields">
                            <div class="col-md-12">
                                <label 
                                    for="acadNameSchool" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Name of School
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    class="form-control select2"
                                    style="width: 100%;"
                                    name="acadNameSchool" 
                                    id="acadNameSchool"
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
                                    id="txtFilter" 
                                    name="txtFilter" 
                                    autocomplete="off" 
                                    placeholder="Search school..." 
                                    hidden/>
                                    <input 
                                    type="text" 
                                    id="txtID" 
                                    name="txtID" 
                                    hidden/>
                                    <div class="result text-start"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="acadDegree" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Basic Education / Degree / Course  
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    class="form-control select2"
                                    style="width: 100%;"
                                    name="acadDegree" 
                                    id="acadDegree"
                                    tabindex="3"
                                    required
                                    >
                                    <option value="">SELECT EDUCATIONAL LEVEL FIRST</option>
                                    </select>
                                    <small id='CheckacadDegree'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="acadPeriodFrom" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    From (YYYY)
                                </label>
                                <div class="col-sm-12">
                                <select 
                                name="acadPeriodFrom" 
                                id="acadPeriodFrom" 
                                class="form-control select2"
                                style="width: 100%;"  
                                tabindex="4"
                                >
                                </select>
                                <small id='CheckacadPeriodFrom'></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="acadPeriodTo" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    To (YYYY)
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    name="acadPeriodTo"
                                    id="acadPeriodTo" 
                                    class="form-control select2"
                                    style="width: 100%;"  
                                    tabindex="5"
                                    onchange="PeriodTo()";
                                    >
                                    </select>
                                    <small id='CheckacadPeriodTo'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="acadHighestLevel" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Highest Level/Units Earned  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="text"
                                    class="form-control" 
                                    id="acadHighestLevel" 
                                    name="acadHighestLevel"
                                    required
                                    tabindex="6"
                                    style="text-transform: uppercase;">
                                    <small id='CheckacadHighestLevel'></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="acadYearGraduated" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Year Graduated (YYYY) 
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    name="acadYearGraduated" 
                                    id="acadYearGraduated" 
                                    class="form-control select2"
                                    style="width: 100%;"  
                                    tabindex="7"
                                    >
                                    </select>
                                    <small id='CheckacadYearGraduated'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="acadHonors" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Honors Received  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="text"
                                    class="form-control" 
                                    id="acadHonors" 
                                    name="acadHonors"
                                    tabindex="8"
                                    style="text-transform: uppercase;">
                                    <small id='CheckacadHonors'></small>
                                </div>
                            </div>
                            <div class="col-md-6" id = "divAcadMOV" name = "divAcadMOV" hidden>
                                <label 
                                    for="acadMOV" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Upload MOV  
                                </label>
                                <div class="col-sm-12">
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="acadMOV" 
                                    name="acadMOV" 
                                    value="" 
                                    required="true" 
                                    tabindex="9"
                                    accept="application/pdf"
                                    onchange="validateFileTypeAcademic()">
                                <small id='CheckacadMOV'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right"
                            tabindex="9"
                            >
                            Insert
                        </button>
                    </div>
            </div>
        </form>
        <div class="box" style="border-width: 0%;" >
            <table id="tblAcads" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Educational Level </th>
                          <th> School </th>
                          <th> Stream </th>
                          <th> Period </th>
                          <th> Credentials </th>
                          <th> Year Graduated </th>
                          <th> Honors Received </th>
                          <th> Upload Status </th>
                          <th> Upload Remarks </th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
</div>
