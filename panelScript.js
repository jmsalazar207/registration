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
// const idleTimeout = 5 * 1000; // 30 seconds for testing
let idleTimer;
let autoLogoutTimer; // Timer for auto-logout after modal is shown

// Function to log the user out
function logoutUser() {
    // Redirect to logout or login page
    window.location.href = "includes/logout.php"; // Replace with your actual logout URL
}

// Function to handle session clear and show the modal
function SessionClear() {
    // Show the generic modal
    modalAlertShow("You have been logged out due to inactivity.", logoutUser);

    // Start auto-logout timer after showing the modal
    autoLogoutTimer = setTimeout(() => {
        logoutUser(); // Ensure logout happens even without user interaction
    }, 10 * 1000); // 10 seconds in milliseconds
}

// Function to reset the idle timer
function resetIdleTimer() {
    clearTimeout(idleTimer); // Reset the idle timeout
    idleTimer = setTimeout(() => {
        SessionClear(); // Trigger the modal and auto-logout logic
    }, idleTimeout);
}

// Function to monitor user activity
function setupIdleTimer() {
    const events = ['mousemove', 'keydown', 'scroll', 'touchstart'];
    events.forEach(event => document.addEventListener(event, resetIdleTimer));
}

// Initialize the idle timer
setupIdleTimer();
resetIdleTimer(); // Start the timer immediately

// Event listener to clear auto-logout timer when modal action is taken
document.addEventListener('modalActionTaken', () => {
    clearTimeout(autoLogoutTimer); // Stop auto-logout if user interacts with the modal
});
