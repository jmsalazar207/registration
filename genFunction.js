function NumberOnly(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
}
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
  $(document).on("click", ".toggle-password", function () {
    // Toggle the eye icon class
    $(this).toggleClass("fa-eye fa-eye-slash");

    // Find the associated input field (the sibling input element)
    const input = $(this).siblings(".password-field");

    // Toggle the input type between 'password' and 'text'
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
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