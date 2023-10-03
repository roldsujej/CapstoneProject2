<?php

require "../database/config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../Message/PHPMailer/src/PHPMailerAutoload.php";
require '../Message/PHPMailer/src/Exception.php';
require '../Message/PHPMailer/src/PHPMailer.php';
require '../Message/PHPMailer/src/SMTP.php';

function sendActivationEmail($toEmail, $activationToken) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
        $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
        $mail->addAddress($email, $fullname);
        // Recipients
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Activate Your Account';
        $mail->Body = 'Click the following link to activate your account: http://yourwebsite.com/activate.php?token=' . $activationToken;

        $mail->send();
    } catch (Exception $e) {
        // Handle email sending errors here
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
















