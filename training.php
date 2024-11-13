<div class="tab-pane" id="training">
    <div class="user-block">
        <form id="frmTrainingAdd" name="frmTrainingAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="trainingTitle" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Title of LDI
                                </label>
                                <div class="col-sm-12">
                                    <input type="hidden"
                                    name="encodedTrainingCount"
                                    id="encodedTrainingCount"
                                    >
                                    <input 
                                    class="form-control" 
                                    id="trainingTitle" 
                                    name="trainingTitle"
                                    tabindex="2"
                                    style="text-transform: uppercase;" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="trainingDateFrom" 
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
                                    id="trainingDateFrom" 
                                    name="trainingDateFrom"
                                    required
                                    tabindex="1"
                                    max="<?=$today?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="trainingDateTo" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date To
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="trainingDateTo" 
                                    name="trainingDateTo"
                                    required
                                    tabindex="1"
                                    max="<?=$today?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="trainingHours" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Total Number Of Hours  
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="trainingHours" 
                                    name="trainingHours"
                                    required
                                    tabindex="4"
                                    onkeypress="return NumberOnly(event)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="trainingType" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Type of LDI
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    type="text"
                                    class="form-control select2" 
                                    style="width: 100%;"
                                    id="trainingType" 
                                    name="trainingType"
                                    tabindex="">
                                        <option 
                                        name ="optNone" 
                                        id = "optNone" 
                                        value="">
                                            --
                                        </option>
                                        <option 
                                        name ="optManagerial" 
                                        id = "optManagerial" 
                                        value="1">
                                            Managerial
                                        </option>
                                        <option 
                                        name ="optSupervisory" 
                                        id = "optSupervisory" 
                                        value="2">
                                            Supervisory
                                        </option>
                                        <option 
                                        name ="optTechnical" 
                                        id = "optTechnical" 
                                        value="3">
                                            Technical
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label 
                                    for="trainingConductedBy" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Conducted / Sponsored by
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="trainingConductedBy" 
                                    name="trainingConductedBy"
                                    tabindex=""
                                    style="text-transform: uppercase;" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label 
                                    for="trainingUploadMOV" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Upload MOV
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="file"
                                    class="form-control" 
                                    id="trainingUploadMOV" 
                                    name="trainingUploadMOV"
                                    tabindex=""
                                    required
                                    accept="application/pdf"
                                    style="text-transform: uppercase;"
                                    onchange="validateFileTypeTraining()">
                                    <small id='CheckTrainingMOV'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right">
                            Insert
                        </button>
                    </div>
            </div>
        </form>
        <div class="box" style="border-width: 0%;" >
            <table id="tbltraining" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Title of LDI </th>
                          <th> Period </th>
                          <th> Total Hours </th>
                          <th> Type of LDI </th>
                          <th> Conducted /Sponsored By </th>
                          <th> Upload Status </th>
                          <th> Upload Remarks </th>
                    </thead>
            </table>
        </div>
    </div>
</div>
