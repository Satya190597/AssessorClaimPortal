<?php
	session_start();
	if(isset($_SESSION["useradhar"]))
	{
		$adhar = $_SESSION["useradhar"];
		if(isset($_POST["username"])&&isset($_POST["details"]))
		{
			include_once 'connection/connection.php';
			include_once 'class/controller.php';
			$object = new accessorOperations();
			$name = $_POST["username"];
			$details = $_POST["details"];
			$object->InsertRequest($adhar,$name,$details);
			header("Location:home.php?navigate=request&requestmessage=Request send successfully");
		}
		else
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:index.php");
	}
?>