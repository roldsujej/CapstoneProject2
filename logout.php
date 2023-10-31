<?php
// Start a new session or resume the existing session
session_start();

// Clear session data
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page after logging out
header("Location: Login/login.php");
die; // Terminate script execution
?>
