function modalErrorShow(msg){
    $('#modalDynamicContent').attr('class','modal-contenterror');
    $('#modalDynamicHeader').attr('class','modal-headererror');
    $('#modalDynamicTitle').text("Opps!");
    $('#modalDynamicMessage').text(msg);
    $('#modalDynamicBody').attr('class','modal-bodyerror');
    $('#modalDynamicIcon').attr('class','glyphicon glyphicon-exclamation-sign s_icon');
    $('#modalDynamicFooter').attr('class','modal-footererror');
    $('#modalDynamicButton').attr('class','btn btn-modalerror btn-sm');
    $('#modalDynamic').modal('show');
  } 
  function modalSuccessShow(msg){
    $('#modalDynamicContent').attr('class','modal-contentsuccess');
    $('#modalDynamicHeader').attr('class','modal-headersuccess');
    $('#modalDynamicTitle').text("Great!");
    $('#modalDynamicMessage').text(msg);
    $('#modalDynamicBody').attr('class','modal-bodysuccess');
    $('#modalDynamicIcon').attr('class','glyphicon glyphicon-ok-sign s_icon');
    $('#modalDynamicFooter').attr('class','modal-footersuccess');
    $('#modalDynamicButton').attr('class','btn btn-modalsuccess btn-sm');
    $('#modalDynamic').modal('show');
  } 
  function modalAlertShow(msg){
    $('#modalDynamicContent').attr('class','modal-contentYellow');
    $('#modalDynamicHeader').attr('class','modal-headerYellow');
    $('#modalDynamicTitle').text("Alert!");
    $('#modalDynamicMessage').text(msg);
    $('#modalDynamicBody').attr('class','modal-bodyYellow');
    $('#modalDynamicIcon').attr('class','glyphicon glyphicon-info-sign s_icon');
    $('#modalDynamicFooter').attr('class','modal-footerYellow');
    $('#modalDynamicButton').attr('class','btn btn-modalYellow btn-sm');
    $('#modalDynamic').modal('show');
  }
  function modalConfirmShow(msg,YesAction,NoAction,PassData){
    $('#modalDynamicConfirmContent').attr('class','modal-contentYellow');
    $('#modalDynamicConfirmHeader').attr('class','modal-headerYellow');
    $('#modalDynamicConfirmTitle').text("Confirmation");
    $('#modalDynamicConfirmMessage').text(msg);
    $('#modalDynamicConfirmBody').attr('class','modal-bodyYellow');
    $('#modalDynamicConfirmIcon').attr('class','glyphicon glyphicon-info-sign s_icon');
    $('#modalDynamicConfirmFooter').attr('class','modal-footerYellow');
    $('#modalDynamicConfirmButtonYes').attr('class','btn btn-modalSave btn-sm');
    $('#modalDynamicConfirmButtonNo').attr('class','btn btn-modalerror btn-sm');
      // Remove previous event listeners (to prevent stacking)
      $('#modalDynamicConfirmButtonYes').off('click');
      $('#modalDynamicConfirmButtonNo').off('click');
  
      // Attach new event listeners
      $('#modalDynamicConfirmButtonYes').on('click', function () {
          YesAction(PassData); // Call the Yes action
          $('#modalDynamicConfirm').modal('hide'); // Close the modal
      });
  
      $('#modalDynamicConfirmButtonNo').on('click', function () {
          NoAction(); // Call the No action
          $('#modalDynamicConfirm').modal('hide'); // Close the modal
      });
    $('#modalDynamicConfirm').modal('show');
  }