<?php
	include 'email.php';
	$user_type = $_POST['user_type'];
	if(isset($_POST['email'])!=null)
	{
		$email = $_POST['email'];
		$mail->From = 'kyc@competency.co.in';
		$mail->FromName = "COMPETENCY"; // Name to indicate where the email came from when the recepient received
		$mail->AddAddress($email);
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "Sign Up Link"; //used for mail subject
		$email = rawurlencode($email);
		if($user_type=='assessor')
		    $link = "competency.co.in/accessor/signUp.php?useremail=$email";
		else
		    $link = "competency.co.in/accessor/coordinator/signUp.php?useremail=$email";
		$mail->Body ="<a href='$link'>Sign Up to accessor.competency.co.in</a>"; //HTML Body
		if($mail->Send())
		{
		      echo "Please check your mail";       
		}
		else
		{
		     echo "Not sent Error !";
		}
	}
	  
	
?>