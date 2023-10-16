<?php
// Start a new session or resume the existing session
session_start();

// Check if a user session is active
session_unset();

// Redirect the user to the login page after logging out
header("Location: ../LoginAndRegistration/login.php");
die; // Terminate script execution
?>
