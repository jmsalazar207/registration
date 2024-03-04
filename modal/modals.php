            <div 
                class="modal fade"
                data-bs-backdrop="false" 
                id="modalInfo" 
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered ">
                  <div 
                    class="modal-content"
                    id="modalAlertContent">
                    <div class="modal-header" id="headerClass">
                      <h5 class="modal-title" id="headerMessage"></h5>
                        <button 
                            type="button" 
                            class="btn-close" 
                            data-bs-dismiss="modal" 
                            aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                      <h4 id="modalMessage"></h4>
                    </div>
                    <div class="modal-footer" id="footerClass">
                        <button 
                            type="button" 
                            id="regRoute"
                            name="regRoute"
                            class="btn btn-primary" 
                            onclick="location.href='Register.php'" 
                            style="display: none;">
                            Register
                        </button>
                        <button 
                            type="button" 
                            class="btn btn-secondary" 
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                  </div>
                </div>
            </div>