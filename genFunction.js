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
