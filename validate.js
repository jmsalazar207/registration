
function getAge(Birthday){
    var bday = new Date(Birthday);
    var month_diff = Date.now() - bday.getTime();
    var age_dt = new Date(month_diff); 
    var year = age_dt.getUTCFullYear();
    var age = Math.abs(year - 1970);

    return age;
}


function validateStreet(street,id){
    if(street != '' && street.length <5){
        $("#CheckStreetmessage").html("Please enter a Street with at least 5 characters.").css('color', 'red');
        $(id).css('border-color', 'red');
        $(id).focus();
        return 0;
    }
    return 1;
}