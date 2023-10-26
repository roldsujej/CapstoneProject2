<?php
session_start();
require "../database/config.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../Message/PHPMailer/src/PHPMailerAutoload.php";
require '../Message/PHPMailer/src/Exception.php';
require '../Message/PHPMailer/src/PHPMailer.php';
require '../Message/PHPMailer/src/SMTP.php';

function sanitize($conn, $data)
{
    $sanitizedData = mysqli_real_escape_string($conn, $data);
    return $sanitizedData;
}


function checkEmail($conn, $email)
{
    //this function will check if the email exists in the table 
    $email = mysqli_real_escape_string($conn, $email);
    $emailCheckQry = $conn->prepare("SELECT * from account_profiles WHERE email = ?");
    $emailCheckQry->bind_param("s", $email);
    $emailCheckQry->execute();
    $emailCheckQryResult = $emailCheckQry->get_result();
    $emailCheckQry->close();
    return $emailCheckQryResult->num_rows > 0;
}


if (isset($_POST['submit'])) {
    // Sanitize the data inputs
    $fullname = sanitize($conn, $_POST["fname"] . $_POST["lname"]);
    $fname = sanitize($conn, $_POST["fname"]);
    $lname = sanitize($conn, $_POST["lname"]);
    $number = sanitize($conn, $_POST["phoneNumber"]);
    $address = sanitize($conn, $_POST["address"]);
    $email = sanitize($conn, $_POST["email"]);
    $password = sanitize($conn, $_POST["password"]);
    $cpassword  = sanitize($conn, $_POST["cpassword"]);
    $otp = rand(100000, 999999);
    $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    $status = 1; // Set the appropriate default value for status
    // $membership_status = 1; // Set the appropriate default value for membership_status

    if (checkEmail($conn, $email)) {
        $_SESSION['emailError'] = "Email already taken!";
    } elseif ($password != $cpassword) {
        $_SESSION['passwordError'] = "Passwords don't match";
    } else {

        $insertQuery = $conn->prepare("INSERT INTO `account_profiles` ( `firstName`, `lastName`, `cpNumber`, `address`, `email`,  `password`, `otp`, `otp_exp`, `status`, `membership_status`) VALUES (?,?,?,?,?,?,?,?,?,?)");

        $insertQuery->bind_param("ssssssssii", $fname, $lname, $number, $address, $email, $password, $otp, $otp_expiration, $status, $membership_status);


        if ($insertQuery->execute()) {
            try {

                $mail = new PHPMailer;
                $mail->isHTML(True);
                $mail->isSMTP();
                $mail->SMTPKeepAlive = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
                $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
                $mail->SMTPSecure = 'tls';
                $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
                $mail->Subject = 'Email OTP Verification';
                $mail->addAddress($email, $fullname);
                $designedEmail = "<div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
    <div style='margin:50px auto;width:70%;padding:20px 0'>
      <div style='border-bottom:1px solid #eee'>
        <a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>OTP Verification</a>
      </div>
      <p style='font-size:1.1em'>Hello,</p>
      <p> Your email can be verified using this  OTP code: $otp .
     <p> This OTP code will expire within 10 minutes. </p>

      
        </p>
      <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>OTP CODE GOES HERE</h2>
      <p style='font-size:0.9em;'>Regards,<br />CAPEDA.</p>
      <hr style='border:none;border-top:1px solid #eee' />
      <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
        <p>PRO Climate Innovations</p>
        <p>Northwalk Clark 2nd Floor Unit 3 No. 8 M.A. Roxas Highway</p>
        <p> Clark Freeport Zone,</p>
        <p>Clark Pampanga Philippines</p>
        <p> +63 908 8125221 / +63915 7016270</p>
      </div>
    </div>
  </div>";
                $mail->Body = $designedEmail;
                $mail->send();


                if ($mail->send()) {
                    $_SESSION['email'] = $email;
                    header("Location: verification.php");
                }
            } catch (Exception $e) {
                echo "Registration Failed";
            }
        } else {
            echo "Failed";
            $insertQuery->close();
        }
    }
}
