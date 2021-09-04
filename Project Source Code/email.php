<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
function email_send($address,$header,$msg)
{
           $mail = new PHPMailer(true);
           $mail->IsSMTP();
           $mail->Mailer = "smtp";
           $mail->Host = "ssl://smtp.gmail.com";
           $mail->Port = 465;
           $mail->SMTPAuth = true;
           $mail->Username = "your-email@gmail.com";// enter your gmail account 
           $mail->Password = "your-email-password"; //enter your email password
           $mail->AddAddress($address);
           $mail->SetFrom("your-email@gmail.com", "Sky Bank Limited");
           $mail->Subject  = $header;
           $mail->Body     = $msg;
           if(!$mail->Send()) {
           echo 'Message was not sent.';
           echo 'Mailer error: ' . $mail->ErrorInfo;
           } else {
           echo 'Message has been sent.';
           }
 }
?>

