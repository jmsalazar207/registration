<div class="tab-pane" id="GovernID">
    <div class="user-block">
        <form id="frmGovernID" name="frmGovernID" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="GovernIDTitle" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Government Issued ID
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input type="hidden"
                                    name="GovernID"
                                    id="GovernId"
                                    >
                                    <input 
                                    class="form-control" 
                                    id="GovernIDTitle" 
                                    name="GovernIDTitle"
                                    tabindex="1"
                                    required
                                    style="text-transform: uppercase;" >
                                    <small id='checkGovernIDTitle'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="GovernIDNo" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    ID/License/Passport No.
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="GovernIDNo" 
                                    name="GovernIDNo"
                                    tabindex="2"
                                    required
                                    style="text-transform: uppercase;" >
                                    <small id='checkGovernIDNo'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="GovernIDDateIssue" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date of Issuance:
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="GovernIDDateIssue" 
                                    name="GovernIDDateIssue"
                                    tabindex="2"
                                    required
                                    max="<?=$today?>"
                                    style="text-transform: uppercase;" >
                                    <small id='checkGovernIDDateIssue'></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="GovernIDPlaceIssue" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Place of Issuance:
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                        class="form-control select2" 
                                        style="width: 100%;"  
                                        id="GovernIDPlaceIssue" 
                                        name="GovernIDPlaceIssue" 
                                        required="true" 
                                        tabindex="4">
                                            <option>
                                                SELECT PROVINCE
                                            </option>
                                    </select>
                                <small id='checkGovernIDPlaceIssue'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right">
                            Submit
                        </button>
                    </div>
            </div>
        </form>
    </div>
</div>
