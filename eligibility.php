<div class="tab-pane" id="eligibility">
    <div class="user-block">
        <form id="frmEligibilitydAdd" name="frmEligibilitydAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="eligibilityCredentials" 
                                    class="col-sm-12"   
                                    style="font-size: 15px;">
                                    Credentials
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input type="hidden"
                                    name="encodedEligibilityCount"
                                    id="encodedEligibilityCount"
                                    >
                                    <select 
                                    class="form-control select2"
                                    style="width: 100%;"
                                    name="eligibilityCredentials" 
                                    id="eligibilityCredentials"
                                    tabindex="1"
                                    required
                                    >
                                        <option value="">
                                            SELECT ONE
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="eligibilityRating" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Rating
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="eligibilityRating" 
                                    name="eligibilityRating"
                                    tabindex="2"
                                    onkeypress="filterNumbersAndDots(event)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="eligibilityExamDate" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date of Examination
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="eligibilityExamDate" 
                                    name="eligibilityExamDate"
                                    required
                                    tabindex="3"
                                    max="<?=$today?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="eligibilityPlaceExamination" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Place of Examination  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="text"
                                    class="form-control" 
                                    id="eligibilityPlaceExamination" 
                                    name="eligibilityPlaceExamination"
                                    required
                                    tabindex="4"
                                    style="text-transform: uppercase;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label 
                                    for="eligibilityNumber" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    License Number  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="text"
                                    class="form-control" 
                                    id="eligibilityNumber" 
                                    name="eligibilityNumber"
                                    tabindex="5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label 
                                    for="eligibilityValidityDate" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date of Validity  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="eligibilityValidityDate" 
                                    name="eligibilityValidityDate"
                                    tabindex="6">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label 
                                    for="eligibilityUploadMOV" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Upload MOV  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        id="eligibilityMOV" 
                                        name="eligibilityMOV" 
                                        value="" 
                                        required="true" 
                                        tabindex="7"
                                        accept="application/pdf"
                                        onchange="validateFileTypeEligibility()">
                                        <small id='CheckEligibilityMOV'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right"
                            tabindex="7"
                            >
                            Insert
                        </button>
                    </div>
            </div>
        </form>
        <div class="box" style="border-width: 0%;" >
            <table id="tblEligibility" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Credentials </th>
                          <th> Rating </th>
                          <th> Date of Examination </th>
                          <th> Place of Examination </th>
                          <th> License Number </th>
                          <th> Date of Validity </th>
                          <th> Upload Status </th>
                          <th> Upload Remarks </th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
</div>
