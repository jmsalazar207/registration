<div class="tab-pane" id="references">
    <div class="user-block">
        <form id="frmReferencesAdd" name="frmReferencesAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="referencesName" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Name
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input 
                                    class="form-control" 
                                    id="referencesName" 
                                    name="referencesName"
                                    tabindex="2"
                                    required
                                    style="text-transform: uppercase;" >
                                    <small id='checkreferencesName'></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label 
                                    for="referencesAddress" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Address
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="referencesAddress" 
                                    name="referencesAddress"
                                    tabindex="2"
                                    required
                                    style="text-transform: uppercase;" >
                                    <small id='checkreferencesAddress'></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label 
                                    for="referencesMobile" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Telephone Number
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="referencesMobile" 
                                    name="referencesMobile"
                                    tabindex="2"
                                    required
                                    style="text-transform: uppercase;" 
                                    onkeypress="return NumberOnly(event)">
                                    <small id='checkreferencesMobile'></small>
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
        <div class="callout callout-info" name="refLimitInfo" id="refLimitInfo" hidden>
            <h4>
                Information!
            </h4>
            <p>
                Please note that you can only input up to three person references. 
                You have reached the maximum limit of three entries.
            </p>
        </div>
        <div class="box" style="border-width: 0%;" >
            <table id="tblReferences" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Name </th>
                          <th> Address </th>
                          <th> Tel. No. </th>
                    </thead>
            </table>
        </div>
    </div>
</div>
