<div class="tab-pane" id="skills">
    <div class="user-block">
        <form id="frmSkillsAdd" name="frmSkillsAdd" autocomplete="off" >
            <div class="box" style="border:0cm" >
                <div class="box-body row">
                    <div class="card col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label 
                                    for="skillsTitle" 
                                    class="col-sm-12" 
                                    style="font-size: 15px;">
                                    Special Skills and Hobbies
                                </label>
                                <div class="col-sm-12">
                                    <input 
                                    type="hidden" 
                                    name="token" 
                                    value="<?=$_SESSION["token"]?>"> 
                                    <input 
                                    class="form-control" 
                                    id="skillsTitle" 
                                    name="skillsTitle"
                                    tabindex="2"
                                    required
                                    style="text-transform: uppercase;" >
                                    <small id='checkSkillsTitle'></small>
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
            <table id="tblSkills" class="table table-bordered table-striped table-responsive" style="text-align:center; width:100%">
                    <thead class="">
                        <tr>
                          <th> Action </th>
                          <th> Special Skills and Hobbies </th>
                    </thead>
            </table>
        </div>
    </div>
</div>
