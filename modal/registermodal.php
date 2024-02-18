<link rel="stylesheet" href="includes/add.css">
              <!--SuccessRegister-->
        <div class="modal fade" id="SuccessRegister" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contentsuccess">
              <div class="modal-headersuccess">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Great!</h3>                
              </div>
              <div class="modal-bodysuccess">
                  <p align="center"><span class="glyphicon glyphicon-ok s_icon"></span></p>
             <h4>We are delighted to inform you that your registration is successful.</h4>
              </div>
              <div class="modal-footersuccess">
                <button type="button" class="btn btn-modalsuccess btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
              <!--ErrorRegister-->
        <div class="modal fade" id="ErrorRegister" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contenterror">
              <div class="modal-headererror">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Error!</h3>
              </div>
              <div class="modal-bodyerror">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4>Unfortunately, we encountered some issue with your registration. Please try again later.</h4>
              </div>
              <div class="modal-footererror">
                <button type="button" class="btn btn-modalerror btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>      
<!-- Modal confirm for new employee -->
        <!--AlreadyExist-->
        <div class="modal fade" id="RegisterConfirm" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contentYellow">
              <div class="modal-headerYellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Information</h3>
              </div>
              <div class="modal-bodyYellow">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4 id="WarningMessage"></h4>
              </div>
              <div class="modal-footerYellow">
              <button type="button" class="btn btn-modalYellow btn-sm" name="btnConfirm" onclick="RegisterYes()">Yes</button>
                <button type="button" class="btn btn-modalYellow btn-sm" data-dismiss="modal">No</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
                <!--AlreadyExist-->
        <div class="modal fade" id="UpdateConfirm" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contentYellow">
            <form class="form-horizontal" method="POST" action="checkpassword.php" id="contentcheck">
              <div class="modal-headerYellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Information</h3>
              </div>
              <div class="modal-bodyYellow">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4 id="UpdateMessage"></h4>
                <input type="text" class="form-control" id="SearchEmpno" name="SearchEmpno" readonly>
                <input type="password" class="form-control" id="SearchPassword" name="SearchPassword" placeholder="Password" value="" style="text-transform: uppercase;" required="true" tabindex="1">
              </div>
              <div class="modal-footerYellow">
              <input type="submit" class="btn btn-modalYellow btn-sm" id="btnConfirm" name="btnConfirm" value="Proceed">
                <button type="button" class="btn btn-modalYellow btn-sm" data-dismiss="modal">No</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
              <!--SuccessUpdate-->
              <div class="modal fade" id="SuccessUpdate" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contentsuccess">
              <div class="modal-headersuccess">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Great!</h3>                
              </div>
              <div class="modal-bodysuccess">
                  <p align="center"><span class="glyphicon glyphicon-ok s_icon"></span></p>
             <h4>Your information successfully updated .</h4>
              </div>
              <div class="modal-footersuccess">
                <button type="button" class="btn btn-modalsuccess btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
              <!--ErrorRegister-->
              <div class="modal fade" id="ErrorUpdate" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contenterror">
              <div class="modal-headererror">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Error!</h3>
              </div>
              <div class="modal-bodyerror">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4>Unfortunately, we encountered some issue in updating your information. Please try again later.</h4>
              </div>
              <div class="modal-footererror">
                <button type="button" class="btn btn-modalerror btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
         <!--Error Password-->
         <div class="modal fade" id="ErrorPassword" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contenterror">
              <div class="modal-headererror">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ooops!</h3>
              </div>
              <div class="modal-bodyerror">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4>Error! The password you entered is incorrect. Please try again.</h4>
              </div>
              <div class="modal-footererror">
                <button type="button" class="btn btn-modalerror btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
        



        <div class="modal fade" id="modalAlert" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contentYellow">
              <div class="modal-headerYellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Information</h3>
              </div>
              <div class="modal-bodyYellow">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4 id="alertMessage"></h4>
              </div>
              <div class="modal-footerYellow">
                <button type="button" class="btn btn-modalYellow btn-sm" data-dismiss="modal">OK</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 

        <div class="modal fade" id="modalAlertSuccess" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-contentYellow">
              <div class="modal-headerYellow">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Information</h3>
              </div>
              <div class="modal-bodyYellow">
                <p align="center"><span class="glyphicon glyphicon-question-sign s_icon"></span></p>
                <h4 id="alertMessageSuccess"></h4>
              </div>
              <div class="modal-footerYellow">
                <button type="button" class="btn btn-modalYellow btn-sm" data-dismiss="modal" onclick="javascript:window.location.href='index.php'">OK</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 


       