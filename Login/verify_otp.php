<?php
session_start();
require "../database/config.php";
include "common.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../Message/PHPMailer/src/PHPMailerAutoload.php";
require '../Message/PHPMailer/src/Exception.php';
require '../Message/PHPMailer/src/PHPMailer.php';
require '../Message/PHPMailer/src/SMTP.php';



if (isset($_POST['submit'])) {
    $otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];
    $email = $_SESSION['email'];

    $query = "SELECT id, otp, otp_exp FROM account_profiles WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows != 1) {
        $_SESSION['status'] = "Record not found";
        $_SESSION['status_code'] = "error";
        header("Location: ./verification.php");
        exit();
    } else {
        $row = $result->fetch_assoc();
        $storedOTP = $row['otp'];
        $otpExpiry = $row['otp_exp'];
        $id = $row['id'];

        if ($otp != $storedOTP) {
            $_SESSION['status'] = "You entered a wrong OTP, Please check and try again";
            $_SESSION['status_code'] = "error";
            header("Location: verification.php");
            exit();
        } elseif (strtotime($otpExpiry) < time()) {
            $_SESSION['status'] = "You entered an expired OTP Code";
            $_SESSION['status_code'] = "error";
            header("Location: verification.php");
            exit();
        } else {
            $updateQuery = "UPDATE account_profiles SET status = 1, user_role = 0 WHERE email = ? AND id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("si", $email, $id);

            if ($updateStmt->execute()) {
                $_SESSION['status'] = "You have successfully verified your profile";
                $_SESSION['status_code'] = "success";
                header("Location: ../logout.php");
                exit();
            } else {
                $_SESSION['msgError'] = "Database error: " . $conn->error;
                header("Location: verification.php");
                exit();
            }
        }
    }
} else {
    echo "Failed";
}

if (isset($_POST['resend'])) {
    // Generate a new OTP
    $newOTP = rand(100000, 999999);
    $email = $_SESSION['email'];
    $fullname = $_SESSION['fullname'];
    $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));

    // Update the OTP in the database
    $updateQuery = "UPDATE account_profiles SET otp = ?, otp_exp = ?, user_role = 0 WHERE email = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("iss", $newOTP, $otp_expiration, $email);

    if ($updateStmt->execute()) {
        // Send OTP via email using PHPMailer
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
			  <p> Your email can be verified using this  OTP code. 
			 <p> This OTP code will expire within 5 minutes. </p>

			  
				</p>
			  <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>$newOTP</h2>
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

        if ($mail->send()) { // If the email is sent successfully
            $_SESSION['status'] = "New OTP sent successfully! Check your email.";
            $_SESSION['status_code'] = "success";
            exit();
        } else {
            $_SESSION['status'] = "Failed to resend OTP: " . $mail->ErrorInfo;
            $_SESSION['status_code'] = "error";
            exit();
        }
    } else {
        $_SESSION['status'] = "Failed to resend OTP: " . $conn->error;
        $_SESSION['status_code'] = "error";
        header("Location: verification.php"); // Redirect back to verification.php
        exit();
    }
}
