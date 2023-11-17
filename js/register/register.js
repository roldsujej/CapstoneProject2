document.addEventListener("DOMContentLoaded", function () {
  // Function to clear an error message
  function clearError(errorId) {
    var errorElement = document.getElementById(errorId);
    if (errorElement) {
      errorElement.textContent = "";
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

  // Clear the main PHP error message after 5 seconds
  var errorMsgContainer = document.getElementById("phpErrorMsg");
  if (errorMsgContainer) {
    setTimeout(function () {
      errorMsgContainer.textContent = ""; // Clear the error message after 5 seconds
    }, 5000); // 5000 milliseconds = 5 seconds
  }
});
