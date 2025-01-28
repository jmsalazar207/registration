function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
}
function staticModal() {
  // Disable all interactions on the page except for the modal
  $('body').addClass('modal-open-static');
  
  // Show the modal with static backdrop and keyboard disabled
  $('#modalDynamic').modal({
    backdrop: 'static', // Prevent close on clicking outside
    keyboard: false     // Prevent close on pressing Esc
  });

  // Add an event listener to re-enable interactions when the modal is hidden
  $('#modalDynamic').on('hidden.bs.modal', function () {
    $('body').removeClass('modal-open-static');
  });
}
function staticConfirmModal(){
  // Disable all interactions on the page except for the modal
  $('body').addClass('modal-open-static');

  // Show the modal with static backdrop and keyboard disabled
  $('#modalDynamicConfirm').modal({
    backdrop: 'static', // Prevent close on clicking outside
    keyboard: false     // Prevent close on pressing Esc
  });

  // Add an event listener to re-enable interactions when the modal is hidden
  $('#modalDynamicConfirm').on('hidden.bs.modal', function () {
    $('body').removeClass('modal-open-static');
  });
}
function staticConfirmLogoutModal(){
  // Disable all interactions on the page except for the modal
  $('body').addClass('modal-open-static');

  // Show the modal with static backdrop and keyboard disabled
  $('#modalDynamicConfirmLogout').modal({
    backdrop: 'static', // Prevent close on clicking outside
    keyboard: false     // Prevent close on pressing Esc
  });

  // Add an event listener to re-enable interactions when the modal is hidden
  $('#modalDynamicConfirmLogout').on('hidden.bs.modal', function () {
    $('body').removeClass('modal-open-static');
  });
}
// Add a CSS class to disable interactions when modal is active
$('<style>')
  .prop('type', 'text/css')
  .html(`
    .modal-open-static {
      pointer-events: none; /* Disable clicks on the entire page */
    }
    .modal-open-static .modal {
      pointer-events: auto; /* Allow interaction only with the modal */
    }
    .modal-open-static input,
    .modal-open-static textarea {
      pointer-events: none; /* Disable typing in inputs and textareas */
    }
  `)
  .appendTo('head');
  


let tables = {};
let isCaptchaValid = false;

  function onCaptchaSuccess() {
    isCaptchaValid = true;
  }
  
  function onCaptchaExpired() {
    isCaptchaValid = false;
  }

// Helper function to reset captcha
function resetCaptcha() {
    grecaptcha.reset();
    isCaptchaValid = false;
    }

  function showMessage(showID){
    // When the user clicks on the password field, show the message box
    document.getElementById(showID).style.display = "block";
  }

  function hideMessage(hideID){
    // When the user clicks outside of the password field, hide the message box
    document.getElementById(hideID).style.display = "none";
  }
function getTodayDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0'); // Ensure day is 2 digits
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Month is 0-based, so add 1
    const year = today.getFullYear();
    return `${year}/${month}/${day}`; // Format: YYYY/MM/DD
}

// Example usage:
console.log(getTodayDate());
  function StrongPassword(inputID){
    var myInput = document.getElementById(inputID);
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var special_char = document.getElementById("special_char");
    var length = document.getElementById("length");
    
    // When the user starts to type something inside the password field
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {  
      letter.classList.remove("invalid");
      letter.classList.add("valid");
      } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
      }
      
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
      } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
      }
    
      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {  
      number.classList.remove("invalid");
      number.classList.add("valid");
      } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
      }
      
      // Validate special
      var special_chars = /[!@#$%^.+=~-]/g;
      if(myInput.value.match(special_chars)) {  
      special_char.classList.remove("invalid");
      special_char.classList.add("valid");
      } else {
      special_char.classList.remove("valid");
      special_char.classList.add("invalid");
      }
      
      // Validate length
      if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
      } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
      }
  }

function computeBday(Birthday) {
  var bday = new Date(Birthday);
  var today = new Date();

  // Calculate the age based on the difference in years
  var age = today.getFullYear() - bday.getFullYear();

  // Adjust if the birthday hasn't occurred yet this year
  var month = today.getMonth();
  var bdayMonth = bday.getMonth();
  var day = today.getDate();
  var bdayDay = bday.getDate();

  if (month < bdayMonth || (month === bdayMonth && day < bdayDay)) {
    age--; // Subtract one year if birthday hasn't occurred yet
  }

  return age;
}

// Dynamic Password Visibility Toggle
$(document).on("click", ".toggle-password", function () {
  const target = $(this).data("target"); // Get the target input field from data attribute
  const input = $(target);

  // Toggle between 'password' and 'text' types
  if (input.attr("type") === "password") {
      input.attr("type", "text");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
  } else {
      input.attr("type", "password");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
  }
});

// Password Match Validation
$(document).on("keyup", ".password-field, .confirm-password-field", function () {
  const password = $(".password-field").val(); // Get desired password value
  const confirmPassword = $(".confirm-password-field").val(); // Get confirm password value
  const message = $("#checkmessage");

  // Check if passwords match
  if (password === confirmPassword && password !== "") {
      message.html("Passwords match.").css("color", "green");
      $("#btnSubmit").attr("disabled", false); // Enable submit button
  } else if (password !== confirmPassword) {
      message.html("Passwords do not match!").css("color", "red");
      $("#btnSubmit").attr("disabled", true); // Disable submit button
  } else {
      message.html(""); // Clear message if fields are empty
  }
});

function refreshPage() {
  location.reload(); // Reloads the current page
}

function logout() {
  window.location.href = "includes/logout.php"; 
}

function dateToday() {
  date_default_timezone_set('Asia/Manila'); 
  $today = date("d/m,Y");
  return $today; // Return the formatted date
}

function deleteData(PassData){ //dynamic delete details
  var DeleteURL = PassData.valueURL;
  var DeleteID = PassData.valueID;
  var TableID = PassData.TableID;
  $(".loader-div").show();
  $.ajax({
    url:DeleteURL,
    method:"POST",
    dataType: "json",
    data:{DeleteID:DeleteID},
    success:function(data){
      $(".loader-div").hide();
      const msg = data.msg;
      const stat = data.status;
      if(stat == "success"){
        // Execute the passed functions after deletion
        if (typeof PassData.ActionAfter1 === "function") {
          PassData.ActionAfter1();
        }
        if (typeof PassData.ActionAfter2 === "function") {
          PassData.ActionAfter2();
        }
          modalSuccessShow(msg,triggerTableReload,TableID);
          loadPanelScript();
      } else {
        modalErrorShow(msg);
      }
    },error: function(xhr, status, error) {
      modalErrorShow("The system encountered an error. Please contact support.");
      $(".loader-div").hide();
    }
  });
}

function CloseDynamicModal(){
  $('#modalDynamic').modal('hide');
}

function triggerTableReload(tableId) {
  // Check if the table instance exists in the `tables` object
  if (tables[tableId]) {
      // Reload the table's data via AJAX, without resetting the pagination
      tables[tableId].ajax.reload(null, false);
  } else {
      // Warn if the table with the specified ID is not found
      console.warn(`Table with ID ${tableId} not found!`);
  }
}

function clearForm() {
  $('#yourFormID').find('input, textarea, select').val(''); // Clear all fields
  $('#yourFormID').find('input:checkbox, input:radio').prop('checked', false); // Uncheck checkboxes and radio buttons
}

function loadPanelScript() {
  $('script[src^="panelScript.js"]').remove();
  const script = document.createElement("script");
  script.src = `panelScript.js?test=${Date.now()}`;
  document.body.appendChild(script);
}










// Simple regex to check email format
// function isValidEmailFormat(email) {
//   var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
//   return regex.test(email);
// }
// // Function to validate email
// function validateEmail(email) {
//   // Make sure the email is not empty and is in a valid format
//   if (email === "" || !isValidEmailFormat(email)) {
//     alert("Please provide a valid email address.");
//     return;
//   }

//   // Use AJAX to send email to PHP script for validation
//   $.ajax({
//     url: 'validateEmail.php',  // PHP file URL
//     type: 'POST',
//     data: { email: email }, // Send the email to the PHP script
//     success: function(response) {
//       var result = JSON.parse(response);
      
//       if (result.status === 'success') {
//         modalAlertShow(result.message); // Email is valid and active
//       } else {
//         modalAlertShow(result.message); // Email is invalid or unreachable
//       }
//     },
//     error: function(xhr, status, error) {
//       alert('Error: ' + error); // Handle error
//     }
//   });
// }