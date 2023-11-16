// Function to handle log out confirmation
function logOutHandler() {
  // Add code here to perform the log-out action
  // For example, redirect to the log-out page or perform AJAX request
  // After log-out, you can redirect the user to the desired page
  window.location.href = "../logout.php";
}


document
  .getElementById("logOut")
  .addEventListener("click", logOutHandler);