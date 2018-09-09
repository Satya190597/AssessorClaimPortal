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
			header("Location:home.php?navigate=claimsave&status=100");
		else
			header("Location:home.php?navigate=claimsave&status=000");
	}
	if(isset($_POST['saveClaim']))
	{
			$DATA 					= array();
			$DATA["TO"]				= $_POST['to'];
			$DATA["DATE"] 			= $_POST['date'];
			$DATA["FORMONTHOF"] 	= $_POST['forMonthOf'];
			$DATA["CC"] 			= $_POST['cc'];
			$DATA["BASELOCATION"] 	= $_POST['baseLocation'];
			$DATA["PROJECT"] 		= $_POST['projectClaimUnder'];
			$DATA["DESTINATION"] 	= $_POST['destinationLocation'];
			$DATA["CANDIDATE"] 		= $_POST['nameOfCandidate'];
			$DATA["ADHAR"] 			= $_SESSION['useradhar'];;
			$DATA["CONTACT"] 		= $_POST['contactNumber'];
			$DATA["BANK"] 			= $_POST['bankName'];
			$DATA["BRANCH"] 		= $_POST['bankBranch'];
			$DATA["PAN"] 			= $_POST['panNumber'];
			$DATA["ACCOUNT"] 		= $_POST['accountNumber'];
			$DATA["IFC"] 			= $_POST['ifcCode'];
			$DATA["lessbalance"] 	= $_POST['lessbalance'];
			$obj = new accessorOperations();
			$result = $obj->newClaim($DATA);
			if($result>=1)
				header("Location:home.php?navigate=claimdetail&status=100");
			else
				header("Location:home.php?navigate=claimdetail&status=000");
	}
	if(isset($_POST['updateClaim']))
	{
			$DATA 					= array();
			$DATA["TO"]				= $_POST['to'];
			$DATA["DATE"] 			= $_POST['date'];
			$DATA["FORMONTHOF"] 	= $_POST['forMonthOf'];
			$DATA["BASELOCATION"] 	= $_POST['baseLocation'];
			$DATA["PROJECT"] 		= $_POST['projectClaimUnder'];
			$DATA["DESTINATION"] 	= $_POST['destinationLocation'];
			$DATA["lessbalance"] 	= $_POST['lessbalance'];
			$obj = new accessorOperations();
			$result = $obj->updateClaim($_POST['claimid'],$DATA);
			if($result>=1)
				header("Location:home.php?navigate=claimdetail&status=100");
			else
				header("Location:home.php?navigate=claimdetail&status=000");
	}
?>