<?php
// Start a new session or resume the existing session
session_start();

// Check if a user session is active
if(isset($_SESSION['fullName']))
{
    // If a user session is active, unset the session variable to log the user out
    unset($_SESSION['fullName']);
}

// Check if a user session is active
if(isset($_SESSION['id']))
{
    // If a user session is active, unset the session variable to log the user out
    unset($_SESSION['id']);
}

// Check if a user session is active
if(isset($_SESSION['user_role']))
{
    // If a user session is active, unset the session variable to log the user out
    unset($_SESSION['user_role']);
}

// Check if a user session is active
if(isset($_SESSION['email']))
{
    // If a user session is active, unset the session variable to log the user out
    unset($_SESSION['email']);
}

// Redirect the user to the login page after logging out
header("Location: ../LoginAndRegistration/login.php");
die; // Terminate script execution
?>
