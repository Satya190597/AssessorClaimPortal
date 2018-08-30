<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	if(isset($_POST['adhar'])!=null)
	{
		$adhar = $_POST['adhar'];
		$object = new accessorOperations();
		if(!$object->validateUser($adhar))
		{
			$dataarray = array();
			$dataarray = $object->forgetPassword($adhar);
			header("Location:mail/sendPassword.php?email=$dataarray[0]&password=$dataarray[1]");
		}
		else
		{
			header("Location:index.php?message=Adhar ID Is Not Registered");
		}
	}
	else
	{
		header("Location:index.php");
	}
?>