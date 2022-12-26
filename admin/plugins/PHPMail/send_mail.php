<?php
session_start();

$email = $_SESSION['email'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'Exception.php';
require 'SMTP.php';
require 'PHPMailer.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $recovered_password = $_SESSION['password'];
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rejensraya@gmail.com';                     //SMTP username
    $mail->Password   = 'jrjwhvehzwodcdtq';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rejensraya@gmail.com');
    $mail->addAddress($email);     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Recovery';
    $mail->Body    = "your recovered password is $recovered_password";

    $mail->send();
    echo 'Message has been sent';
    $_SESSION['password_recovery'] = "successful";
} catch (Exception $e) {
    $_SESSION['password_recovery'] = "unsuccessful";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$url = $_SESSION['url'];
unset($_SESSION['password']);
unset($_SESSION['url']);
unset($_SESSION['email']);
header("Location:" . $url . "login.php");
