<?php
//mail service start
include("class.phpmailer.php");
include("class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "bh-2.webhostbox.net"; // specify main and backup server // Twinbrothers SMTP server Name "gains.lathalinuxcloud.com";
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "kyc@competency.co.in"; // your SMTP username or your gmail username
$mail->Password = "kycroot@123"; // your SMTP password or your gmail password
$mail->SMTPDebug =0;
$mail->SMTPSecure = 'ssl';

$from1 = "kyc@competency.co.in"; // Reply to this email

$password='kycroot@123';

$pass=$password;
//mail service end	
?>
