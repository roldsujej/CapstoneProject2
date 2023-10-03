// JavaScript
const navigation = document.querySelector(".navigation");
const toggleButton = document.querySelector(".toggle");
const main = document.querySelector(".main");
const signOutModal = document.getElementById("signOutModal");
const closeModal = document.getElementById("closeModal");
const cancelSignOut = document.getElementById("cancelSignOut");
const signOutLink = document.getElementById("signOutLink"); // Select the Sign Out link by ID

toggleButton.addEventListener("click", () => {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
});

// Close navigation on small screens by default
const screenWidth = window.innerWidth || document.documentElement.clientWidth;
if (screenWidth <= 768) {
  navigation.classList.remove("active");
  main.classList.remove("active");
}

// Function to open the modal
function openModal() {
  signOutModal.style.display = "block";
}

// Function to close the modal
function closeModalHandler() {
  signOutModal.style.display = "none";
}

// Function to handle sign out confirmation
function confirmSignOutHandler() {
  // Add code here to perform the sign-out action
  // For example, redirect to the sign-out page or perform AJAX request
  // After sign-out, you can redirect the user to the desired page
  window.location.href = "signout.php";
}

// Attach event listeners
signOutLink.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default behavior
  openModal();
});

closeModal.addEventListener("click", closeModalHandler);
cancelSignOut.addEventListener("click", closeModalHandler);
document
  .getElementById("confirmSignOut")
  .addEventListener("click", confirmSignOutHandler);
