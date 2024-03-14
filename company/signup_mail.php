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


    $email=$_SESSION["compemail"];
    $user=$_SESSION['cname1'];
    //Recipients
    $mail->setFrom('dhruvildhamsaniya123@gmail.com', 'CAREER CLAN');
    $mail->addAddress($email,$user);     //Add a recipient
    

    //Attachments
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Find Top Talent Faster and Smarter with Our Advanced Recruitment Solution';
    $mail->Body    = " JOIN THE CLAN, ELEVATE YOUR CAREER.
    Unlock your company's true potential with our innovative platform, connecting you to top talent, streamlining recruitment processes, and fostering a culture of growth and success.Find the perfect fit for your company effortlessly. Our advanced search and recommendation algorithms ensure you discover exceptional talent that aligns with your specific requirements, revolutionizing your hiring process ";
    

    $mail->send();
    header("Location: company_login.php");
} catch (Exception $e) {
    header("location:sign in.php?error2=please enter valid email address&del=$email");
}
?>