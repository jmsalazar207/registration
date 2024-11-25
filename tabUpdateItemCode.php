<div class="tab-pane" id="AdminUpdateUserItemCode" >
    <div class="user-block">
        <form 
        method="POST" 
        id="contentAdminUpdateItemCode" 
        autocomplete="off">
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="form-group">
                        <div class="col-md-12" id="divEmployeeNumber" >
                            <label 
                                for="UpdateEmpNo" 
                                class="col-sm-12" 
                                style="font-size: 15px;">
                                Employee Number
                            </label>
                            <div class="col-sm-12">
                                <input type="hidden"
                                class="form-control"
                                name="UpdateEmpHistoryLastFilled"
                                id="UpdateEmpHistoryLastFilled"
                                >
                                <input 
                                class="form-control" 
                                id="UpdateEmpNo" 
                                name="UpdateEmpNo"
                                readonly
                                placeholder="Employee Number">
                                <small id='CheckUpdateEmpNo'></small>
                            </div>
                        </div>
                        <div class="col-md-12" id="divFullName">
                            <label 
                                for="UpdateFullName" 
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
                                id="UpdateFullName" 
                                name="UpdateFullName"
                                readonly
                                placeholder="Full Name">
                                <small id='CheckUpdateFullName'></small>
                            </div>
                        </div>
                        <div class="col-md-12" id="divCurrentItemCode"> 
                            <label 
                                for="UpdateItemCode" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                    Current Item Code
                            </label>
                            <div class="col-sm-12">
                                <input type="hidden"
                                name = "UpdatePosID"
                                id="UpdatePosID"
                                >
                                <input 
                                class="form-control" 
                                id="UpdateItemCode" 
                                name="UpdateItemCode"
                                readonly
                                placeholder="Current Item Code">
                                <small id='CheckUpdateItemCode'></small>
                            </div>
                        </div>
                        <div class="col-md-12" id="divDateFilled">
                            <label 
                                for="UpdateDateFilled" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                    Date Filled Up
                            </label>
                            <div class="col-sm-12">
                                <input 
                                class="form-control" 
                                id="UpdateDateFilled" 
                                name="UpdateDateFilled"
                                readonly
                                placeholder="Date Filled Up">
                                <small id='CheckUpdateDateFilled'></small>
                            </div>
                        </div>
                        <div class="col-md-12" id="divDateVacated">
                            <label 
                                for="UpdateDateUnfilled" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                    Date Vacated
                            </label>
                            <div class="col-sm-12">
                                <input 
                                type="date"
                                class="form-control" 
                                id="UpdateDateUnfilled" 
                                name="UpdateDateUnfilled"
                                max="<?=$today?>">
                                <small id='CheckUpdateDateUnfilled'></small>
                            </div>
                        </div>
                        <div class="col-md-12" id="divReasonVacancy">
                            <label 
                                for="UpdateReasonVacancy" 
                                class="col-sm-12 requiredField" 
                                style="font-size: 15px;">
                                    Reason of Vacancy
                            </label>
                            <div class="col-sm-12">
                                <select 
                                class="form-control select2" 
                                style="width: 100%;"
                                id="UpdateReasonVacancy" 
                                name="UpdateReasonVacancy">
                                    <?php 
                                        echo fill_mode_seperation($dbConn,null);
                                    ?>
                                </select>
                                <small id='CheckUpdateReasonVacancy'></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-12" id="divNewItemCode" >
                                <label 
                                    for="UpdateNewItemCode" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                     New Item Code
                                </label>
                                <div class="col-sm-12">
                                    <select
                                    class="form-control select2" 
                                    style="width: 100%;"
                                    id="UpdateNewItemCode" 
                                    name="UpdateNewItemCode"
                                    >
                                        <?php 
                                            echo fill_item_code($dbConn,null);
                                        ?>
                                    </select>
                                    <small id='CheckUpdateNewItemCode'></small>
                                </div>
                            </div>
                            <div class="col-md-12" id="divNewItemCodeDateFilled" >
                                <label 
                                    for="UpdateNewDatefilled" 
                                    class="col-sm-12 requiredField" 
                                    style="font-size: 15px;">
                                     Date Filled
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="date"
                                    class="form-control" 
                                    id="UpdateNewDatefilled" 
                                    name="UpdateNewDatefilled"
                                    max="<?=$today?>"
                                    >
                                    <small id='CheckUpdateNewDatefilled'></small>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button 
                    type="button" 
                    class="btn btn-default pull-left" 
                    data-dismiss="modal">
                    Close
                </button>
                <button 
                    type="button"
                    id="btnUpdateItemCode"
                    name="btnUpdateItemCode" 
                    class="btn btn-primary btn-md pull-right">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>