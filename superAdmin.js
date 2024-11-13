
  function resetPassword(btnResetPassword){
    $.ajax({
      url:"resetPassword.php",
      method:"POST",
      data:{btnResetPassword:btnResetPassword},
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      }
    });
  }
  function setUserlevel(UlEmpno){
    $.ajax({
      url:"includes/functions.php",
      method:"POST",
      data:{sessionEmpno:UlEmpno},
      success:function(data){
        setUL = JSON.parse(data);
        $("#txtUlEmpno").val(setUL["empno"]);
        $("#txtUlFullName").val(setUL["fname"]+' '+setUL["mname"]+' '+setUL["sname"]+' '+setUL["ename"]);
       // $("#txtExtName").val(UpdateInfo["ename"]).trigger('change');
       var UserLevel = setUL['user_level'];
       $.ajax({
           url:"includes/functions.php",
           method:"POST",
           data:{UserLevel:UserLevel},
           success:function(data){
               $('#txtULUserLevel').html(data);
           }
       });
        $('#frmUserLevel').modal('show');
      }
    })
  }
  
  $('#contentUserLevel').on("submit",function(event){
    event.preventDefault();
    $("#frmUserLevel").modal('hide');
    var formData = new FormData(contentUserLevel);
    $.ajax({
      url:"setUserLevel.php",
      method:"POST",
      data:formData,
      dataType: 'json',
      success:function(data){
        const msg = data.msg;
        const stat = data.status;  
        if(stat === "success"){ 
          $('#modalNotif-header').text('Great! Success.');
          $('#modalNotif-message').text(msg);
          $('#modalNotif').modal('show');
        }
        else{
          $('#alertMessage').text(msg);
          $('#modalAlert').modal('show'); 
        }
      },
      processData: false,
      contentType: false
      
    });
  })
