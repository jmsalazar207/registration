$(function(){
    const employeeNumber = sessionStorage.getItem("loginEmpno");
    $.ajax({ //getInfo session
        url:"getInfo.php",
        method:"POST",
        data: {employeeNumber:employeeNumber},
        dataType: 'json',
        success:function(data){
            const sessionEmpno = data.sessionEmpno;
            const sessionFirstName = data.sessionFname;
            const sessionMiddleName = data.sessionMname;
            const sessionLastName = data.sessionLname;
            const sessionUserLevel = data.sessionUserlevel;
            const sessionPosition = data.sessionPosition;
            
                if(sessionUserLevel ==1){ //super admin
                    $('#sysAdmin').show();
                    $('#genList').show();
                }else if(sessionUserLevel ==2){ //HR
                    $('#sysAdmin').show();
                }else if(sessionUserLevel ==3){ //FMD
                    $('#genList').show(); 
                }else{

                }
                $('#headerFullname').text(sessionFirstName+' '+sessionLastName );
                $('#dropFullName').text(sessionFirstName+' '+sessionLastName);
                $('#dropPosition').text(sessionPosition);
        }
    })
})