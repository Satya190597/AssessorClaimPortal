<?php
    # Include connection file and controller file
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	session_start();
	# Create new object
	$object = new accessorOperations();
	if(isset($_POST['login'])!=null)
	{
		if($object->Login($_POST['adhar'],$_POST['password']))
		{
		    if(!isset($_SESSION)) 
            { 
    			session_start();
            }
            else
            {
                session_destroy();
                session_start(); 
            }
            
            # Set user adhar and user type in the session
			$_SESSION['useradhar'] = $_POST['adhar'];
			$user_type = $object->getUserType($_POST['adhar']);
			$_SESSION['usertype'] = $user_type;
			
			# Redirect to home page after login
			header("Location:home.php?usertype=$user_type");
			
			# Code Activate Only For Maintenance
		    /*if($_SESSION['useradhar'] != "123456789112")
            {			
            	header("Location:maintenance.php");
            }
            else
            {
            	header("Location:home.php");
            }*/
         }
         else
         {
             header("Location:index.php?message=Invalid Adhar ID Or Password");
         }
	}
	else
	{
		header("Location:index.php?message=Invalid Adhar ID Or Password");
	}
?>