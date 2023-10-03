<?php
require_once '../database/config.php';
session_start();
if (isset($_SESSION['user'])) {
    header('location: Applicant/applicantDashboard.php');
}
if (isset($_SESSION['admin'])) {
    header('location: ADMIN/adminDashboard.php');
}
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check user login
    $userStmt = $conn->prepare("SELECT * FROM account_profiles WHERE email = ?");
    $userStmt->bind_param("s", $email);
    $userStmt->execute();
    $userResult = $userStmt->get_result();

    // Check admin login
    $adminStmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email = ?");
    $adminStmt->bind_param("s", $email);
    $adminStmt->execute();
    $adminResult = $adminStmt->get_result();

    if ($userResult->num_rows > 0) {
        $row = $userResult->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            if ($row['status'] == 1 && $row['user_role'] == 0) {
                $_SESSION['user'] = $row;
                header("location: application.php");
                exit();
            } elseif ($row['status'] == 1 && $row['user_role'] == 1) {
                $_SESSION['user'] = $row;
                header("location: MEMBER/memberDashboard.html");
                exit();
            }
        } else {
            echo '<script>alert("Incorrect email or password!");window.location.href = "login.php";</script>';
        }
    } elseif ($adminResult->num_rows > 0) {
        $row = $adminResult->fetch_assoc();
    } else {
        echo '<script>alert("Account does not exist!");window.location.href = "login.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../images/logo.jpg" type="image/x-icon">
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
                        <input type="text" name="username" placeholder="Username" />
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