<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	$BATCHID 			= 	$_POST['batch_id'];
	$BATCHNUMBER 		= 	$_POST['batch_number'];
	$ASSESSMENTDATE		=	$_POST['assessment_date'];
	$TRAININGPROVIDER	=	$_POST['training_provider'];
	$TESTINGCENTER		=	$_POST['testing_center'];
	$FILENAME			=	$_FILES['imageupload']['name'];
	$FILELOCATION		=	$_FILES['imageupload']['tmp_name'];
	$RANDOM				=	rand();
	$DESTINATION		= 	"claim/".$BATCHID."_".$BATCHNUMBER."_".$RANDOM.".jpeg";
	move_uploaded_file($FILELOCATION,$DESTINATION);
	$IMAGEURL			=	$DESTINATION;
	$object				=	new accessorOperations();
	$result				=	$object->addClaimImage($BATCHID,$ASSESSMENTDATE,$TRAININGPROVIDER,$TESTINGCENTER,$IMAGEURL);
	if($result>=1)
	{
		header("Location:upload_batch_image.php?status=100&batch_id=$BATCHID&batch_number=$BATCHNUMBER");
	}
	else
	{
		header("Location:upload_batch_image.php?status=000&batch_id=$BATCHID&batch_number=$BATCHNUMBER");
	}
?>