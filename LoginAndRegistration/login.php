<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../database/config.php';
include 'common.php';
require '../ADMIN/status_functions.php';


// check if already logged in
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check member login
    $memberQuery = $conn->prepare("SELECT * FROM account_profiles WHERE email = ?");
    $memberQuery->bind_param("s", $email);
    $memberQuery->execute();
    $memberResult = $memberQuery->get_result();

    // Check admin login
    $adminQuery = $conn->prepare("SELECT * FROM tbl_admin WHERE email = ?");
    $adminQuery->bind_param("s", $email);
    $adminQuery->execute();
    $adminResult = $adminQuery->get_result();

    if ($memberResult->num_rows > 0) {
        $row = $memberResult->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $statusText = getStatusText($row['status']);

            if ($statusText === "Pending Verification") {
                // Email not verified
                $_SESSION['login_error'] = "Email not verified. Please check your email for verification instructions.";
                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'applicant';
                $_SESSION['email'] = $row['email'];
                $_SESSION['verified'] = 0;

                header("location: verification.php"); // Redirect to the verification page
                exit();
            } elseif ($statusText === "Email Verified") {
                // Email applicant Member login
                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'applicant';
                $_SESSION['email'] = $row['email'];
                header("location: application_review.php");
                exit();
            } elseif ($statusText === "Account Accepted") {
                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'applicant';
                $_SESSION['email'] = $row['email'];
                header("location: ../Applicant/applicantDashboard.php");
                exit();
            } elseif ($statusText === "Member") {
                header("location: ../MEMBER/memberDashboard.php");
            }
        } else {
            $_SESSION['login_error'] = "Incorrect email or password.";
            header("location: login.php");
            exit();
        }
        // } elseif ($adminResult->num_rows > 0) {
        //     $row = $adminResult->fetch_assoc();
        //     if ($_POST['password'] === $row['password']) {
        //         $statusText = getStatusText($row['account_status']);

        //         if ($statusText === "Pending Verification") {
        //             // Email not verified for admin
        //             $_SESSION['login_error'] = "Email not verified for admin. Please check your email for verification instructions.";
        //             header("location: verification.php"); // Redirect to the verification page for admin
        //             exit();
        //         } elseif ($row['membership_status'] === 'admin') {
        //             // Admin login
        //             $_SESSION['id'] = $row['id'];
        //             $_SESSION['user_role'] = 'admin';
        //             $_SESSION['email'] = $row['email'];
        //             header("location: ../ADMIN/admindashboard.php");
        //             exit();
        //         }
        //     } else {
        //         $_SESSION['login_error'] = "Incorrect email or password.";
        //         header("location: login.php");
        //         exit();
        //     }
    } else {
        $_SESSION['login_error'] = "Account not found.";
        header("location: login.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../images/capedalogo.png" type="image/x-icon">
    <title>CAPEDA | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/loginAndRegistration/css/login.css" />
    <!-- <link rel="stylesheet" href="../css/login.css" /> -->
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="../images/logo.jpg" alt="" />
        </div>
        <!----LOGO DESIGN HERE-->
        <div class="login">
            <form method="post">
                <header class="title">
                    <h3>Welcome to CAPEDA</h3>
                </header>
                <div class="loginBody">
                    <div class="text-input">
                        <i class="ri-user-fill"></i>
                        <input type="text" name="email" placeholder="Username" />
                    </div>
                    <div class="text-input">
                        <i class="ri-lock-fill"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="loginBtn">
                        <button class="login-btn" type="submit" name="login">LOGIN</button>
                    </div>
                    <a href="#" class="forgot">Forgot Username/Password?</a>

                </div>
            </form>
            <div class="create">
                <a href="registration.php">Apply for membership</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </div>
    </div>
</body>

</html>