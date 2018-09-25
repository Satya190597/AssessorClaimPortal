<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	$obj = new accessorOperations();
	$ID 		=	$_POST['ID'];
	$BATCH 		=	$_POST['batch'];
	$SECTOR		=	$_POST['sector'];
	$TRADE		=	$_POST['trade'];
	$CANDIDATE	=	$_POST['candidate'];
	$DATE		=	$_POST['date'];
	$AMOUNT		=	$_POST['amount'];
	$CLAIMID	= 	$_POST['claimid'];
	$result 	= $obj->updateClaimBatchReedem($ID,$CLAIMID,$BATCH,$SECTOR,$TRADE,$CANDIDATE,$DATE,$AMOUNT);
	if($result>=1)
		echo 'success';
	else
		echo 'failure';
?>