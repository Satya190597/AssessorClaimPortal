<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	session_start();
	$adhar = $_POST['adhar'];
	$password = $_POST['password'];
	$email = $_SESSION['email'];
	if($email==null)
	{
		header("Location:index.php");
	}
	else
	{
		$object = new accessorOperations();
		if($object->validateUser($adhar))
		{
			$object->addUser($email,$password,$adhar);
			header("Location:index.php?message=Sign Up Successful");
		}
		else
		{
			header("Location:index.php?message=Adhar ID Already Registered");
		}
	}
?>