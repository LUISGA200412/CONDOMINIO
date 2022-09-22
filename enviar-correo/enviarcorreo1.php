<?php
error_reporting(E_ALL);
require("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPDebug  = 2; 
$mail->From = "luisegd160354@gmail.com";
$mail->FromName = "Jiansen";
$mail->Host = "smtp.gmail.com"; // specif smtp server
$mail->SMTPSecure= "tls"; // Used instead of TLS when only POP mail is selected
$mail->Port = 465; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "luisegd160354@gmail.com"; // SMTP username
$mail->Password = "GABRIEL200412.."; // SMTP password
$mail->AddAddress('luisegd160354@hotmail.com', 'Joe User'); //replace myname and mypassword to yours
//$mail->AddReplyTo("jiansentest@gmail.com", "Jiansen");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

$mail->IsHTML(true); // set email format to HTML
$mail->Subject = 'PRUEBA DE SMTP';
$mail->Body = 'test';

if($mail->Send()) {echo "Send mail successfully";}
else {echo "Send mail fail";} 
?>