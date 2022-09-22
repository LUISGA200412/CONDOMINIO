<?php
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'tls';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';


$mail->Username = "luisegd160354@gmail.com";
$mail->Password = "gabriel200412**";

// $mail->IsHTML(true); // if you are going to send HTML formatted emails
//$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "luisegd160354@gmail.com";
$mail->FromName = "Administrador";

//$mail->addAddress("user.1@yahoo.com","User 1");
//$mail->addAddress("user.2@gmail.com","User 2");

 $mail->addAddress("luisegd160354@hotmail.com", "CARA CULO");

// $mail->addCC("user.3@ymail.com","User 3");
// $mail->addBCC("user.4@in.com","User 4");

$mail->Subject = "Testing PHPMailer with localhost";
$mail->Body = "Hi,<br /><br />This system is working perfectly.";

if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
    echo "Message has been sent";
?>