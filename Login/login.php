<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../database/config.php';
include '../common.php';
require '../ADMIN/status_functions.php';


// check if already logged in
if (isset($_SESSION['id'])) {
    if (isset($_SESSION['role'])) {
        switch ($_SESSION['role']) {

            case 'admin':
                // Handle role admin
                // Redirect or perform specific actions for role admin
                // Admin
                header('location: ../ADMIN/admindashboard.php');
                break;

            case '-1':
                // Handle role -1
                // Redirect or perform specific actions for role -1
                // Account termination
                header('location: ../logout.php');
                break;

            case '0':
                // Handle role 0
                // Redirect or perform specific actions for role 0
                // Email not verified
                header('location: ../login/verification.php');
                break;

            case '1':
                // Handle role 1
                // Redirect or perform specific actions for role 1
                // Verified email
                //Account being review do not let them log in
                header('location: /landing_pages/verify_success.php');
                break;

            case '2':
                // Handle role 2
                // Redirect or perform specific actions for role 2
                // Account accepted
                header('location: ../APPLICANT/applicantDashboard.php');
                break;

            case '3':
                // Handle role 3
                // Redirect or perform specific actions for role 3
                // Member
                header('location: ../logout.php');
                break;

            default:
                // Handle the default case if it doesn't match any of the above cases
                // This can be an error message or a fallback action
                header('location: ../logout.php');
                break;
        }
    }
}

// login
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

                $_SESSION['login_error'] = "Email not verified. Please check your email for verification instructions.";
                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'applicant';
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['status'];

                header("location: verification.php");
                exit();
            } elseif ($statusText === "Email Verified") {

                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'applicant';
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['status'];

                header("location: landing_pages/verify_success.php");
                exit();
            } elseif ($statusText === "Account Accepted") {

                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'applicant';
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['status'];

                header("location: ../Applicant/applicantDashboard.php");
                exit();
            } elseif ($statusText === "Member") {

                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'member';
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['status'];

                header("location: ../MEMBER/memberDashboard.php");
            } elseif ($statusText === "Application Declined") {
                $_SESSION['fullName'] = $row['firstName'] . ' ' . $row['lastName'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_role'] = 'member';
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['status'];
                header("location: landing_pages/application_declined.php");
                exit();
            } else {
                $_SESSION['login_error'] = "Incorrect email or password.";
                header("location: login.php");
                exit();
            }
        } elseif ($adminResult->num_rows > 0) {
            $row = $adminResult->fetch_assoc();
            if ($_POST['password'] === $row['password']) {
                $statusText = getStatusText($row['account_status']);

                if ($row['membership_status'] === 'admin') {
                    // Admin login
                    $_SESSION['id'] = $row['admin_id'];
                    $_SESSION['user_role'] = 'admin';
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = 'admin';
                    header("location: ../ADMIN/admindashboard.php");
                    exit();
                }
            } else {
                $_SESSION['login_error'] = "Incorrect email or password.";
                header("location: login.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Account not found.";
            header("location: login.php");
            exit();
        }
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
    <link rel="stylesheet" href="../css/login/login.css" />
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
                <a href="../Register/register.php">Apply for membership</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </div>
    </div>
</body>

</html>