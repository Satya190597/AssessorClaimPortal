<?php
	include 'email.php';
	if((isset($_GET['email'])!=null)&&(isset($_GET['password'])!=null))
	{
		$email = $_GET['email'];
		$password = $_GET['password'];
		$mail->From = 'kyc@competency.co.in';
		$mail->FromName = "COMPETENCY"; // Name to indicate where the email came from when the recepient received
		$mail->AddAddress($email);
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "Your Password"; //used for mail subject
		$email = rawurlencode($email);
		$link = "competency.co.in/accessor/signUp.php?useremail=$email";
		$mail->Body ="<p>Your Password  :  $password</p>"; //HTML Body
		if($mail->Send())
		{
		      header("Location:../index.php?message=Check your email and login");      
		}
		else
		{
		     header("Location:../index.php?message=Something Went Wrong..");  
		}
	}
	else
	{
		header("Location:../index.php");
	} 
	
?>