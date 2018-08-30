<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	$ID 		= $_GET['id'];
	$obj 		= new accessorOperations();
	$result 	= $obj->deleteClaimBatch($ID);
	if($result>=1)
		header('Location:home.php?navigate=claimsave&status=success');
	else
		header('Location:home.php?navigate=claimsave&status=failure');
?>