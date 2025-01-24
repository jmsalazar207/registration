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
        },error: function(xhr, status, error) {
            modalErrorShow("The system encountered an error. Please contact support.");
            $(".loader-div").hide();
          }
    });
    $.ajax({
        url: "getNotif.php",
        method: "POST",
        dataType: 'json',
        success: function (data) {
            const total = data.total || 0; // Default to 0 if data.total is null
            const notifications = [
                { label: "Training", count: data.training || 0 },
                { label: "Bank", count: data.bank || 0 },
                { label: "Career", count: data.career || 0 },
                { label: "Eligibility", count: data.eligibility || 0 },
                { label: "Academic", count: data.academic || 0 }
            ];
    
            // Update notification icon with the total count
            $('#notifIconNumber').text(total);
    
            // Clear the existing list items to avoid duplicates
            $('#NotifIconMenu').empty();
    
            // Loop through the notifications array and append <li> items
            notifications.forEach((notif) => {
                if (notif.count > 0) { // Only show notifications with a count > 0
                    $('#NotifIconMenu').append(`
                        <li>
                            <a href="profile.php">
                                <i class="fa fa-info-circle text-red"></i> 
                                ${notif.label}:${notif.count} Upload Disapproved
                            </a>
                        </li>
                    `);
                }
            });
    
            // If no notifications, show a message
            if (total === 0) {
                $('#NotifIconMenu').append(`
                    <li>
                        <a href="#">
                            <i class="fa fa-check-circle text-green"></i> 
                            No pending notifications
                        </a>
                    </li>
                `);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: ", status, error);
            $('#notifIconNumber').text('0'); // Default value in case of error
            $('#NotifIconMenu').empty().append(`
                <li>
                    <a href="#">
                        <i class="fa fa-exclamation-circle text-yellow"></i> 
                        Unable to load notifications
                    </a>
                </li>
            `);
        }
    });
    
})


const idleTimeout = 59 * 60 * 1000; // 5 minutes in milliseconds
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
function getTodayDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0'); // Ensure day is 2 digits
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Month is 0-based, so add 1
    const year = today.getFullYear();
    return `${year}/${month}/${day}`; // Format: YYYY/MM/DD
}

// Example usage:
console.log(getTodayDate());

