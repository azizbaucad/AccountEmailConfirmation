<?php

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class sendEmail {

    public function send($userName, $email, $url){

        //Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;  
    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;   
    //Enable SMTP authentication
    $mail->Username   = 'ba.test694@gmail.com';                     //SMTP username
    $mail->Password   = 'Aziz_2019';                               //SMTP password
    $mail->SMTPSecure = 'tls';  
    //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ba.test694@gmail.com', 'Ba Abdou Aziz');
    $mail->addAddress($email , $userName);     //Add a recipient
    
    
     // Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Confirm your email';
     $mail->Body    = '<p> Hi ' . $userName . ' please confirm your email click on the below link</p> <p><a href="'. $url .'">Confirm email</a></p><p> OR copy an paste this link '. $url .'</p>';
     $mail->AltBody = '<p> Hi ' . $userName . ' please confirm your email click on the below link</p> <p><a href="'. $url .'">Confirm email</a></p><p> OR copy an paste this link '. $url .'</p>';
 
    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}

    }
}

?>