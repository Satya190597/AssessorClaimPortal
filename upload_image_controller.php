<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	$dataarray = array();
	$dataarray[0] = $_POST["claim_id"];
	$dataarray[1] = $_POST["batch_no"];
	$dataarray[2] = $_POST["assessment_date"];
	$dataarray[3] = $_POST["training_provider"];
	$dataarray[4] = $_POST["testing_center"];
	if($_FILES["ImageOne"]["name"]!="")
	{
		$imageName = $_FILES["ImageOne"]["name"];
	    	$imagePath = $_FILES["ImageOne"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."one".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[5] = $destination;
	}
	else
	{
		$dataarray[5] = null;
	}
	if($_FILES["ImageTwo"]["name"]!="")
	{
		$imageName = $_FILES["ImageTwo"]["name"];
	    	$imagePath = $_FILES["ImageTwo"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."two".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[6] = $destination;
	}
	else
	{
		$dataarray[6] = null;
	}
	if($_FILES["ImageThree"]["name"]!="")
	{
		$imageName = $_FILES["ImageThree"]["name"];
	    	$imagePath = $_FILES["ImageThree"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."three".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[7] = $destination;
	}
	else
	{
		$dataarray[7] = null;
	}
	if($_FILES["ImageFour"]["name"]!="")
	{
		$imageName = $_FILES["ImageFour"]["name"];
	    	$imagePath = $_FILES["ImageFour"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."four".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[8] = $destination;
	}
	else
	{
		$dataarray[8] = null;
	}
	if($_FILES["ImageFive"]["name"]!="")
	{
		$imageName = $_FILES["ImageFive"]["name"];
	    	$imagePath = $_FILES["ImageFive"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."five".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[9] = $destination;
	}
	else
	{
		$dataarray[9] = null;
	}
	if($_FILES["ImageSix"]["name"]!="")
	{
		$imageName = $_FILES["ImageSix"]["name"];
	    	$imagePath = $_FILES["ImageSix"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."six".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[10] = $destination;
	}
	else
	{
		$dataarray[10] = null;
	} 
	if($_FILES["ImageSeven"]["name"]!="")
	{
		$imageName = $_FILES["ImageSeven"]["name"];
	    	$imagePath = $_FILES["ImageSeven"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."seven".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[11] = $destination;
	}
	else
	{
		$dataarray[11] = null;
	} 
	if($_FILES["ImageEight"]["name"]!="")
	{
		$imageName = $_FILES["ImageEight"]["name"];
	    	$imagePath = $_FILES["ImageEight"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."eight".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[12] = $destination;
	}
	else
	{
		$dataarray[12] = null;
	} 
	if($_FILES["ImageNine"]["name"]!="")
	{
		$imageName = $_FILES["ImageNine"]["name"];
	    	$imagePath = $_FILES["ImageNine"]["tmp_name"];
	    	$destination = "claim/".$dataarray[0]."_".$dataarray[1]."nine".$imageName;
	    	move_uploaded_file($imagePath, $destination);
	    	$dataarray[13] = $destination;
	}
	else
	{
		$dataarray[13] = null;
	} 
	$object = new accessorOperations();
	if($object->UploadImage($dataarray) == 1)
	{
		header("Location:home.php?navigate=claimsave&claimsavemessage=Batch Uploaded Successfully");
	}
	else
	{
		header("Location:home.php?navigate=claimsave&claimsavemessage=Something Went Wrong");
	}
?>