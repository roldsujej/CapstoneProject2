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
                header("Location: application_review.php");
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
        $mail->isHTML(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 2; // Enable verbose debugging
        $mail->Debugoutput = 'html'; // Display debugging output in HTML format
        $mail->SMTPKeepAlive = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
        $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
        $mail->addAddress($email, $fullname);
        $mail->Subject = 'Email OTP Verification (Resend)';
        $mail->Body = "Your new OTP for registration is: $newOTP. This OTP is valid for 5 minutes.";

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
