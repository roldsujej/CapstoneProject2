<?php
session_start();
// require "../config.php";
// require "../Message/PHPMailer-master/src/PHPMailer.src";
// // require "./PHPMailer-master/src/SMTP.src";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/src/PHPMailerAutoload.php";
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';





  $mail = new PHPMailer();
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls"; //ssl
  $mail->Host       = "smtp.gmail.com";
  $mail->Port       = 587;
  $mail->IsHTML(true);
  $mail->IsSMTP();
  $mail->SMTPDebug  = 0;  
  $mail->CharSet='UTF-8';
  $mail->Username   = "yeojsoriano721@gmail.com";//pinalitan ko
  $mail->Password   = "ericsoriano2001";//pinalitan ko
  $mail->SetFrom('yeojsoriano721@gmail.com','PRO Climate Inc');
  $mail->SMTPOptions = array(
  'ssl' => [
  'verify_peer' => false,
  'verify_depth' => false,
  'allow_self_signed' => false,
  'verify_peer_name' => false,
  ]
  );
  $mail ->Subject = 'Proclimate Password Reset';
  $mail ->AddAddress($email,"testing");
  $timepers = "<div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
  <div style='margin:50px auto;width:70%;padding:20px 0'>
    <div style='border-bottom:1px solid #eee'>
      <a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Password Reset Request</a>
    </div>
    <p style='font-size:1.1em'>Hello,</p>
    <p> Your  password can be reset by using this  OTP code. If you think that this action is unauthorized, Kindly contact your administrator.
   <p> This OTP code will expire within 10 minutes. </p>

    
      </p>
    <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>$random</h2>
    <p style='font-size:0.9em;'>Regards,<br />PRO Climate Innovations Inc.</p>
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
  $mail ->Body = $timepers;
  

  $mail ->send();
  $url = '../verification.html';
  header('Location: '.$url);
  ob_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>