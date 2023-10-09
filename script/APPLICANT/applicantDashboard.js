// JavaScript
const navigation = document.querySelector(".navigation");
const toggleButton = document.querySelector(".toggle");
const main = document.querySelector(".main");
const logOutModal = document.getElementById("logOutModal");
const closeModal = document.getElementById("closeModal");
const cancelLogOut = document.getElementById("cancelLogOut");
const logOutLink = document.getElementById("logOutLink"); // Select the Log Out link by ID

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
  logOutModal.style.display = "block";
}

// Function to close the modal
function closeModalHandler() {
  logOutModal.style.display = "none";
}

// Function to handle log out confirmation
function confirmLogOutHandler() {
  // Add code here to perform the log-out action
  // For example, redirect to the log-out page or perform AJAX request
  // After log-out, you can redirect the user to the desired page
  window.location.href = "logout.php";
}

// Attach event listeners
logOutLink.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default behavior
  openModal();
});

closeModal.addEventListener("click", closeModalHandler);
cancelLogOut.addEventListener("click", closeModalHandler);
document
  .getElementById("confirmLogOut")
  .addEventListener("click", confirmLogOutHandler);
