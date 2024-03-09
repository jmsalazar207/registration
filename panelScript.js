$(function(){
    alert ("ajax here");
    const employeeNumber = sessionStorage.getItem("loginEmpno");
    $.ajax({ //getInfo session
        url:"getInfo.php",
        method:"POST",
        data: {employeeNumber:employeeNumber},
        dataType: 'json',
        success:function(data){
            alert (data);
        }
    })
})