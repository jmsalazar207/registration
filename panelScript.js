$(function(){
    $.ajax({ //getInfo session
        url:"getInfo.php",
        method:"POST",
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
                    $('#superAdmin').show();
                    $('#verifyUploads').show();
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
const idleTimeout = 5 * 60 * 1000; // 5 minutes in milliseconds
let idleTimer;

// Function to log the user out
function logoutUser() {
    alert("You have been logged out due to inactivity.");
    // Redirect to logout or login page
    window.location.href = "includes/logout.php"; // Change to your logout URL
}

// Function to reset the idle timer
function resetIdleTimer() {
    clearTimeout(idleTimer);
    idleTimer = setTimeout(logoutUser, idleTimeout);
}

// Monitor user activity
function setupIdleTimer() {
    document.addEventListener('mousemove', resetIdleTimer);
    document.addEventListener('keydown', resetIdleTimer);
    document.addEventListener('scroll', resetIdleTimer);
    document.addEventListener('touchstart', resetIdleTimer);
}

// Initialize the idle timer
setupIdleTimer();
resetIdleTimer(); // Start the timer immediately