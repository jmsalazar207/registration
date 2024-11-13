<div class="tab-pane" id="voluntaryWork">
    <div class="user-block">
        <form id="frmVoluntaryAdd" name="frmVoluntaryAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="voluntaryNAO" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Name & Address of Organization
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input 
                                    type="text"
                                    class="form-control" 
                                    id="voluntaryNAO" 
                                    name="voluntaryNAO"
                                    required
                                    tabindex="1"
                                    style="text-transform: uppercase;" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label 
                                    for="voluntaryDateFrom" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date From
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="voluntaryDateFrom" 
                                    name="voluntaryDateFrom"
                                    tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label 
                                    for="voluntaryDateTo" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date To
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="voluntaryDateTo" 
                                    name="voluntaryDateTo"
                                    tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label 
                                    for="voluntaryTotalHrs" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Total Hours
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="voluntaryTotalHrs" 
                                    name="voluntaryTotalHrs"
                                    onkeypress="return NumberOnly(event)" 
                                    tabindex="2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="voluntaryPosition" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Position/Nature of Work
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="voluntaryPosition" 
                                    name="voluntaryPosition"
                                    required
                                    tabindex="3"
                                    style="text-transform: uppercase;" >
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
            <table id="tblVoluntary" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Name and Address of Organization </th>
                          <th> Period </th>
                          <th> Number of Hours </th>
                          <th> Position / Nature of Work </th>
                        </tr>
                    </thead>
            </table>
        </div>
    </div>
</div>
