<div class="tab-pane" id="AddPositionHistory" >
    <div class="user-block">
        <form id="frmAddHistory" name="frmAddHistory" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="addHistoryItemCode" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Item Number
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input 
                                    class="form-control" 
                                    id="addHistoryItemCode" 
                                    name="addHistoryItemCode"
                                    readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="addHistoryPositionName" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Position
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    class="form-control" 
                                    id="addHistoryPositionName" 
                                    name="addHistoryPositionName"
                                    readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="addHistoryEmployee" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Employee
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    class="form-control select2"
                                    style="width: 100%;" 
                                    id="addHistoryEmployee" 
                                    name="addHistoryEmployee"
                                    required
                                    tabindex="1"
                                    >
                                    <?php 
                                        echo fill_employee($dbConn,null);
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="addHistoryDateStart" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Date Start
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control"
                                    id="addHistoryDateStart" 
                                    name="addHistoryDateStart"
                                    tabindex="2"
                                    required
                                    max="<?=$today?>"
                                    >
                                    <small id='CheckaddHistoryDateStart'></small>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="addHistoryDateEnd" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;"
                                    ta>
                                    Date End
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control"
                                    id="addHistoryDateEnd" 
                                    name="addHistoryDateEnd"
                                    tabindex="3"
                                    required
                                    max="<?=$today?>"
                                    >
                                    <small id='CheckaddHistoryDateEnd'></small>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="addHistorySeperation" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Mode of Seperation
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                    class="form-control select2"
                                    style="width: 100%;" 
                                    id="addHistorySeperation" 
                                    name="addHistorySeperation"
                                    tabindex="4"
                                    
                                    >
                                    <?php 
                                        echo fill_mode_seperation($dbConn,null);
                                        ?>
                                    </select>
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
    </div>
</div>