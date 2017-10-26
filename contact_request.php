<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailerCode/src/Exception.php';
require 'PHPMailerCode/src/PHPMailer.php';
require 'PHPMailerCode/src/SMTP.php';

//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //IMPORTANT: UPDATE PASSWORD HERE TO USE AFTER PULLING AND DON' FORGET TO REMOVE PASSWORD BEFORE PUSHING
    $mail->Username = 'arnavjalui@gmail.com';                 // SMTP username
    $mail->Password = '****';                           // SMTP password 
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('arnavjalui@gmail.com', 'EliteShoppy');
    $mail->addAddress('arnavjalui@gmail.com', 'EliteShoppy Admin');     // Add a recipient
    // $mail->addAddress('arnavjalui@gmail.com');               // Name is optional
    $mail->addReplyTo('arnavjalui@gmail.com', 'EliteShoppy Help Desk');
    // $mail->addCC('arnavjalui@gmail.com');
    // $mail->addBCC('arnavjalui@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Someone has filled the contact form on EliteShoppy";
    $mail->Body    = "<h2>You need to contact the following person</h2>
    <br><br>Name: <b>".$_POST['name']."</b>
    <br><br>Email: <b>".$_POST['email']."</b>
    <br><br>Subject: <b>".$_POST['subject']."</b>
    <br><br>Message: <b>".$_POST['message']."</b>";

    $mail->send();
    header('Location: contact.php?contact_request=true&request_success=true');
} catch (Exception $e) {
    header('Location: contact.php?contact_request=true&request_fail=true');
}