<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                     
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dhruvildhamsaniya123@gmail.com';                     //SMTP username
    $mail->Password   = 'qvskjfwtlxqwrkio';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    $email=$_SESSION["email"];
    $user=$_SESSION['username1'];
    //Recipients
    $mail->setFrom('dhruvildhamsaniya123@gmail.com', 'CAREER CLAN');
    $mail->addAddress($email,$user);     //Add a recipient
    

    //Attachments
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Take Your Career to New Heights: Connect with Top Companies';
    $mail->Body    = "JOIN THE CLAN, ELEVATE YOUR CAREER.
    Embark on a journey towards your dream career. Our platform connects you with top companies, empowering you to discover exciting opportunities and unleash your professional potential.Experience a game-changing platform tailored for job seekers like you. Unlock a world of career possibilities, access personalized job recommendations, and take control of your future success. ";
    

    $mail->send();
    header("Location: jobseeker_login.php");
} catch (Exception $e) {
    header("location:sign in.php?error2=please enter valid email address&del=$email");
}
?>