<div class="tab-pane active" id="UpdatePositionDetails" >
    <div class="user-block">
        <form id="frmUpdatePosition" name="frmUpdatePosition" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="header">
                    <button 
                        type="button" 
                        name="btnDeletePosition"
                        id="btnDeletePosition"
                        class="btn btn-danger btn-sm pull-right"
                        onclick="btnCheckDeletePosition()"
                        >
                        Abolish Position
                    </button>
                </div>
                <div class="box-body row">
                    <div 
                    class="card col-md-12"
                    style="border-radius: 10px;"
                    >
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="UpdatePositionItemCode" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Item Number
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="position_id"
                                    id="position_id" > 
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input 
                                    class="form-control" 
                                    id="UpdatePositionItemCode" 
                                    name="UpdatePositionItemCode"
                                    readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="UpdatePositionDivision" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Division
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                        class="form-control select2"
                                        style="width: 100%;"  
                                        id="UpdatePositionDivision" 
                                        name="UpdatePositionDivision" 
                                        tabindex="">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="UpdatePositionUnit" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Unit
                                </label>
                                <div class="col-sm-12">
                                    <select 
                                        class="form-control select2"
                                        style="width: 100%;"  
                                        id="UpdatePositionUnit" 
                                        name="UpdatePositionUnit" 
                                        tabindex="">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box-footer" style="border:0cm;">
                        <button 
                        type="button" 
                        class="btn btn-default pull-left" 
                        data-dismiss="modal"
                        tabindex="11">
                            Close
                        </button>
                        <button 
                            type="submit" 
                            class="btn btn-primary btn-md pull-right">
                            Save
                        </button>
                    </div>
            </div>
        </form>
    </div>  
</div>