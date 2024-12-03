<div class="tab-pane" id="nonAcademic">
    <div class="user-block">
        <form id="frmUsernonAcademicAdd" name="frmUsernonAcademicAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="nonAcademicTitle" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                    Non-Academic Distinctions / Recognition
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input 
                                    class="form-control" 
                                    id="nonAcademicTitle" sss
                                    name="nonAcademicTitle"
                                    tabindex="1"
                                    required
                                    style="text-transform: uppercase;" >
                                    <small id='CheckNonAcademic'></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right">
                            Add
                        </button>
                    </div>
            </div>
        </form>
        <div class="box" style="border-width: 0%;" >
            <table id="tblnonAcademic" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Non-Academic Distinctions / Recognition </th>
                    </thead>
            </table>
        </div>
    </div>
</div>
