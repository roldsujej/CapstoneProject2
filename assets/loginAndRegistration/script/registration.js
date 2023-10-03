document.addEventListener("DOMContentLoaded", function () {
  // Function to clear an error message
  function clearError(errorId) {
    var errorElement = document.getElementById(errorId);
    if (errorElement) {
      errorElement.innerHTML = "";
    }
  }

  // Clear email error message after 5 seconds
  if (
    typeof emailError !== "undefined" &&
    typeof emailErrorTimestamp !== "undefined"
  ) {
    var currentTime = Math.floor(Date.now() / 1000); // Convert to seconds
    if (currentTime - emailErrorTimestamp > 5) {
      clearError("emailError");
    }
  }

  // Clear password error message after 5 seconds
  if (
    typeof passwordError !== "undefined" &&
    typeof passwordErrorTimestamp !== "undefined"
  ) {
    var currentTime = Math.floor(Date.now() / 1000); // Convert to seconds
    if (currentTime - passwordErrorTimestamp > 5) {
      clearError("passwordError");
    }
  }
});

function validatePhoneNumber() {
  const phoneNumberInput = document.getElementById("phoneNumber");
  const phoneNumberError = document.getElementById("phoneNumberError");
  const selectedCountryCode = document.getElementById("countryCode").value;

  // Regular expression to match a valid Philippine mobile number
  const regex = /^9\d{9}$/;

  if (!regex.test(phoneNumberInput.value)) {
    phoneNumberError.textContent =
      "Please enter mobile number from Philippines.";
  } else {
    phoneNumberError.textContent = "";
  }
}

// function validateFirstName() {
//   const fnameInput = document.getElementById("fname");
//   const fnameError = document.getElementById("fnameError");

//   if (fnameInput.value.trim() === "") {
//     fnameError.textContent = "First name is required.";
//   } else {
//     fnameError.textContent = ""; // Clear the error message
//   }
// }
