<?php

// Load Composer's autoloader
require 'miler/PHPMailer.php';
require 'miler/Exception.php';
require 'miler/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;                                   // Enable verbose debug output
   $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = "true";                                   // Enable SMTP authentication
    $mail->Username   = 'moadfarhat89@gmail.com';                     // SMTP username
    $mail->Password   = 'qpdfedudjfvfralq';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS	; $mail->isHTML(true); 
$mail->CharSet="UTF-8"; 
?>