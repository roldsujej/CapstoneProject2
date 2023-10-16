<?php
session_start();

require "../database/config.php";
include "common.php";
$errorMsg = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../Message/PHPMailer/src/PHPMailerAutoload.php";
require '../Message/PHPMailer/src/Exception.php';
require '../Message/PHPMailer/src/PHPMailer.php';
require '../Message/PHPMailer/src/SMTP.php';


if (isset($_POST['submit'])) {
  $fname = sanitize($conn, $_POST["fname"]);
  $lname = sanitize($conn, $_POST["lname"]);
  $number = sanitize($conn, $_POST["phoneNumber"]);
  $address = sanitize($conn, $_POST["address"]);
  $email = sanitize($conn, $_POST["email"]);
  $password = sanitize($conn, $_POST["password"]);
  $cpassword = sanitize($conn, $_POST["cpassword"]);
  //encryption of password
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
  $otp = rand(100000, 999999);
  $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));
  $status = 0;  // set the status to 1 by default which means email is verified
  $user_role = 0; //set status by 0 to default which means role is applicant

  $errorMsg = "";

  $_SESSION['fnameError'] = "";
  $_SESSION['lnameError'] = "";
  $_SESSION['emailError'] = "";
  $_SESSION['passwordError'] = "";

  if (checkEmail($conn, $email)) {
    $_SESSION['emailError'] = "Email already taken!";
    $_SESSION['emailErrorTimestamp'] = time(); // Store the timestamp
  } elseif ($password != $cpassword) {
    $_SESSION['passwordError'] = "Passwords don't match";
    $_SESSION['passwordErrorTimestamp'] = time(); // Store the timestamp
  } else {
    $insertQuery = $conn->prepare("INSERT INTO `account_profiles` (`firstName`, `lastName`, `cpNumber`, `address`, `email`, `password`, `otp`, `otp_exp`, `status`,  `user_role`) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $insertQuery->bind_param("ssssssssii", $fname, $lname, $number, $address, $email, $hashedPassword, $otp, $otp_expiration, $status,  $user_role);

    if ($insertQuery->execute()) {
      try {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;  // Set this to 2 for detailed debugging
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
        $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA');
        $mail->addAddress($email, $fname . ' ' . $lname);
        $mail->Subject = 'Email OTP Verification';
        $mail->Body = "Your OTP for registration is: $otp. This OTP is valid for 5 minutes.";

        if ($mail->send()) {
          $_SESSION['email'] = $email;
          header("Location: verification.php");  // dapat may way na maredirect back to login si user after registering, it can be a button or anything
          exit();
        } else {
          $errorMsg = "Mailer Error: " . $mail->ErrorInfo;
        }
      } catch (Exception $e) {
        $errorMsg = "Registration Failed";
      }
    } else {
      $errorMsg = "Failed";
    }

    $insertQuery->close();
  }

  $_SESSION['errorMsg'] = $errorMsg;
  header("Location: registration.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../images/capedalogo.png" type="image/x-icon">
  <title>CAPEDA | Registration </title>

  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/loginAndRegistration/css/registration.css" />
  <!-- <link rel="stylesheet" href="../script/ADMIN/global.css"> -->

</head>

<body>
  <div class="container">
    <div class="logo">
      <!-- <img src="../images/capedalogo.png" alt="" /> -->

      <div class="card">
        <header class="title">
          <h3 class="title">Please read the instruction before submitting!</h3>
        </header>

        <div class="card-body">
          <h4 class="card-title">Before you register make sure you have the requirements below:</h4>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">Active Email Account</li>
            <li class="list-group-item">Barangay Clearance</li>
            <li class="list-group-item">2x2 Picture</li>
            <li class="list-group-item">Valid ID</li>

          </ul>
        </div>


      </div>
    </div>
    <!----LOGO DESIGN HERE-->


    <div class="login">
      <form name="registration_form" onsubmit="return validation()" method="POST">
        <header class="title">
          <h3 class="title">WELCOME APPLICANT!</h3>
        </header>


        <p class="phpError" id="phpErrorMsg"><?php echo $errorMsg; ?></p>

        <?php




        if (!empty($errorMsg)) {
          echo '<script>
             var errorMsgContainer = document.getElementById("phpErrorMsg");
             setTimeout(function() {
                 errorMsgContainer.innerHTML = ""; // Clear the error message after 5 seconds
             }, 5000); // 5000 milliseconds = 5 seconds
          </script>';
        }



        ?>
        <div class="loginBody">

          <div class="text-input">
            <i class="ri-user-fill"></i>
            <input type="text" name="fname" id="fname" placeholder="Enter your first name" required onkeypress="return /[a-z\-\ ]/i.test(event.key)" />
          </div>
          <p class="error" id="fNameError"><?php echo isset($_SESSION['fnameError']) ? $_SESSION['fnameError'] : ''; ?></p>
          <div class="text-input">
            <i class="ri-user-fill"></i>
            <input type="text" name="lname" id="lname" placeholder="Enter your last name" required onkeypress="return /[a-z\-\ ]/i.test(event.key)" />
          </div>
          <p class="error" id="lNameError"><?php echo isset($_SESSION['lNameError']) ? $_SESSION['lNameError'] : ''; ?></p>
          <div class="text-input">
            <i class="ri-user-fill"></i>
            <select name="countryCode" id="countryCode">
              <option value="+63" selected>+63</option>
              <!-- Add more options for other countries if needed -->
            </select>
            <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="9XXXXXXXXX" required oninput="validatePhoneNumber()" />
          </div>
          <div id="phoneNumberError" class="error"></div>

          <div class="text-input">
            <i class="ri-map-pin-line"></i>
            <input type="text" placeholder="Address" name="address" id="address" required />
          </div>
          <p class="error" id="addressError"><?php echo isset($_SESSION['addressError']) ? $_SESSION['addressError'] : ''; ?></p>

          <div class="text-input">
            <i class="ri-mail-line"></i>
            <input type="email" placeholder="Email" name="email" id="email" required />
          </div>
          <p class="error" id="emailError"><?php echo isset($_SESSION['emailError']) ? $_SESSION['emailError'] : ''; ?></p>

          <div class="text-input">
            <i class="ri-lock-fill"></i>
            <input type="password" placeholder="Password" name="password" id="password" />
          </div>


          <div class="text-input">
            <i class="ri-lock-fill"></i>
            <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" />
          </div>

          <p class="error" id="passwordError"><?php echo isset($_SESSION['passwordError']) ? $_SESSION['passwordError'] : ''; ?></p>




        </div>


        <div class="registerBtn">
          <button class="register-btn" type="submit" name="submit">REGISTER</button>
        </div>

        <div class="create">
          <a href="unitregistration.php">Register your PEDICAB here</a>
          <i class="ri-arrow-right-fill"></i>
        </div>
      </form>
    </div>


  </div>










  <script src="../assets/loginAndRegistration/script/registration.js"></script>
</body>


</html>