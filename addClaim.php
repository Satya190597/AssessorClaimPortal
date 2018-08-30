<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	session_start();
	# Add Claim
	if(isset($_POST['add']))
	{
		$batchno				=	$_POST['batch'];
		$sector					=	$_POST['sector'];
		$trade					=	$_POST['trade'];
		$date_of_assessment		=	$_POST['date_of_assessment'];
		$number_of_candidate	=	$_POST['number_of_candidate'];
		$amount					=	$_POST['amount'];
		$adhar					=	$_SESSION['useradhar'];

		$obj 	= new accessorOperations();
		$result = $obj->InsertClaimBatch($batchno,$sector,$trade,$date_of_assessment,$number_of_candidate,$amount,$adhar);

		if($result>=1)
			echo "Data Saved";
		else
			echo "Unable To Save Data";
	}
?>