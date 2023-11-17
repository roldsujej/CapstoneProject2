<?php
session_start();

require "../database/config.php";
require "../vendor/autoload.php";
include "../common.php";
$errorMsg = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require "../Message/PHPMailer/src/PHPMailerAutoload.php";
require '../Message/PHPMailer/src/Exception.php';
require '../Message/PHPMailer/src/PHPMailer.php';
require '../Message/PHPMailer/src/SMTP.php';

// use Twilio\Rest\Client;

function calculateAge($birthdate)
{
  $currentDate = new DateTime();
  $birthdate = new DateTime($birthdate);
  $age = $currentDate->diff($birthdate)->y;
  return $age;
}



// // require '../vendor/autoload.php'; // This is the Twilio PHP library path

// // Your Twilio credentials
// $account_sid = 'AC5a005cccf82ff29e220e999e34c6a3cc';
// $auth_token = 'c9811fd936f99ac1c6b9007fa3c6843b';
// $twilio_number = '+12563048891';
// $twilio = new Client($account_sid, $auth_token);


if (isset($_POST['submit'])) {
  // $countryCode = '+63';
  $fname = sanitize($conn, $_POST["firstName"]);
  $lname = sanitize($conn, $_POST["lastName"]);
  $number = sanitize($conn, $_POST["cpNumber"]);
  // $address = sanitize($conn, $_POST["address"]);
  $birthday = sanitize($conn, $_POST["birthday"]);
  //di na manual ilalagay ng user magcacalculate na agad depende sa birthday
  $age = calculateAge($birthday);
  $blk = sanitize($conn, $_POST["blk"]);
  $lot = sanitize($conn, $_POST["lot"]);
  $st = sanitize($conn, $_POST["st"]);
  $brgy = sanitize($conn, $_POST["brgy"]);
  $city = sanitize($conn, $_POST["city"]);
  $province = sanitize($conn, $_POST["province"]);

  $selectedGender = $_POST["gender"];
  if ($selectedGender == "male") {
    $gender = "Male";
  } elseif ($selectedGender == "female") {
    $gender = "Female";
  } elseif ($selectedGender == "other") {
    $gender = "Other";
  } else {
    // Default to some value or handle the case when no radio button is selected
    $gender = "Not specified";
  }
  $gender = sanitize($conn, $gender);
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
    $insertQuery = $conn->prepare("INSERT INTO `account_profiles` (`firstName`, `lastName`, `cpNumber`,`birthday`,`age`,  `block`, `lot`, `street`, `barangay`, `city`, `province`, `gender`, `email`, `password`, `otp`, `otp_exp`, `status`,  `user_role`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $insertQuery->bind_param("sssssssssssssssssi", $fname, $lname, $number, $birthday, $age, $blk, $lot, $st, $brgy, $city, $province, $gender, $email, $hashedPassword, $otp, $otp_expiration, $status, $user_role);


    if ($insertQuery->execute()) {
      try {


        // Send SMS using Twilio

        // sms is being delivered but not received 

        // $message = $twilio->messages
        //   ->create(
        //     $number, // to
        //     array(
        //       "from" => $twilio_number,
        //       "body" => 'Your OTP is: ' . $otp
        //     )
        //   );
        // echo 'Message sent!';

        //email send
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;  // Set this to 0 for production
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
        $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
        $mail->addAddress($email, $fname . ' ' . $lname);
        $mail->Subject = 'Email OTP Verification';

        // Email content
        $mail->isHTML(true);
        $mail->Body = "
			<!DOCTYPE html>
			<html lang='en'>
			<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>CAPEDA | Registration</title>
			</head>
			<body>
			  <div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
			<div style='margin:50px auto;width:70%;padding:20px 0'>
			  <div style='border-bottom:1px solid #eee'>
				<a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Email Verification</a>
			  </div>
			  <p style='font-size:1.1em'>Hello, Thank you for your interest on joining CAPEDA.</p>
			  <p> Your email can be verified using this  OTP code. </p>
			  <p> This OTP code will expire within 5 minutes. </p>
			  <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>$otp</h2>
			  <p style='font-size:0.9em;'>Regards,<br />CAPEDA Org.</p>
			  <hr style='border:none;border-top:1px solid #eee' />
			  <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
				<p>Camella II Pedicab Association</p>
				<pSample Address</p>
				<p> Sample Address,</p>
				<p>Bacoor city, Cavite Philippines</p>
				<p> +63 908 8125221 / +63915 7016270</p>
			  </div>
			</div>
			</div>
			</body>
			</html>
			";

        if ($mail->send()) {
          $_SESSION['email'] = $email;
          header("Location: ../Login/verification.php");  // dapat may way na maredirect back to login si user after registering, it can be a button or anything
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
  header("Location: register.php");
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
  <!-- <link rel="stylesheet" href="../css/register/register.css" /> -->
  <link rel="stylesheet" href="../css/register/registerv2.css" />
  <link rel="stylesheet" href="../css/globals/errorMessages.css" />
  <!-- <link rel="stylesheet" href="../css/admin/global.css"> -->

</head>

<body>

  <div class="container">
    <form action="" method="post">
      <h2>Registration</h2>
      <div class="content">
        <!-- Personal Information Card -->
        <div class="card">
          <h3>Personal Information</h3>

          <div class="input-box">
            <label for=" first name">First name <span class="guide">*required</span></label>
            <input type="text" placeholder="e.g., Juan" name="firstName" required />
          </div>
          <div class="input-box">
            <label for=" last name">Last name <span class="guide">*required</span></label>
            <input type="text" placeholder="e.g., Dela Cruz" name="lastName" required />

          </div>


          <div class="input-box">
            <label for="phone number">Mobile Number<span class="guide">*make sure that your sim is registered</span></label>
            <input type="text" placeholder="+63 XXXXXXXXX" name="cpNumber" id="phoneNumber" maxlength="13" required pattern="\+?[0-9]+" oninput="validatePhoneNumber()" />
            <span id="phoneNumberError" class="error-message"></span>
          </div>
          <div class="input-box">
            <label for="birthday">Birthday<span class="guide">*ages under 18 years are not elligible to apply</span></label>
            <input type="date" name="birthday" id="birthday" required oninput="validateAge()" />
            <span id="ageError" class="error-message"></span>

          </div>
          <!-- <div class="input-box">
            <label for=" age">Age</label>
            <input type="text" placeholder="age" name="age" required />
          </div> -->
          <div class="input-box address-box">
            <label for="blk">Block</label>
            <input type="text" placeholder="Block" name="blk" />

            <label for="lot">Lot</label>
            <input type="text" placeholder="Lot" name="lot" />

            <label for="st">Street</label>
            <input type="text" placeholder="Street" name="st" />

            <label for="brgy">Barangay</label>
            <input type="text" placeholder="Barangay" name="brgy" />

            <label for="city">City</label>
            <input type="text" placeholder="City" name="city" />

            <label for="province">Province</label>
            <input type="text" placeholder="Province" name="province" />
          </div>

          <span class="gender-title">Gender <span class="guide">*required</span></span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male" value="male" />
            <label for="gender">Male</label>
            <input type="radio" name="gender" id="female" value="female" />
            <label for="gender">Female</label>
            <input type="radio" name="gender" id="other" value="other" />
            <label for="gender">Other</label>
          </div>
        </div>

        <!-- Account Information Card -->
        <div class="card">
          <h3>Account Information</h3>

          <div class="input-box">
            <label for="email">Email<span class="guide">*make sure you have active gmail account</span></label>
            <input type="email" placeholder="Enter your active email" name="email" required />
          </div>
          <div class="input-box password-box">
            <label for="password">Password</label>
            <input type="password" placeholder="Enter Password" name="password" required />

            <label for="Confirm password">Confirm Password</label>
            <input type="password" placeholder="Re-enter Password" name="cpassword" required />
          </div>
        </div>

        <!-- Button Container -->
        <div class="button-container">
          <button type="submit" name="submit">Register</button>
        </div>

        <!-- Login Link -->
        <div class="login-link">
          <span class="login">Already have an account? <a href="../Login/login.php">Click here to log in</a></span>
        </div>
      </div>
    </form>
  </div>










  <script src="../js/register/register.js"></script>
  <script src="../js/register/validatePhoneNumber.js"></script>
  <script src="../js/register/validateAge.js"></script>
</body>


</html>