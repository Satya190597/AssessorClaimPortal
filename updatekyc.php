<?php 
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	$dataarray = array();
	$dataarray[0]  = $_POST['user_name'];
	$dataarray[1]  = $_POST['user_father_name'];
	$dataarray[2]  = $_POST['user_mother_name'];
	$dataarray[3]  = $_POST['dob'];
	$dataarray[4]  = $_POST['organization_name'];
	$dataarray[5] = $_POST['organization_relationship'];
	$dataarray[6] = $_POST['present_address'];
	$dataarray[7] = $_POST['permanent_address'];
	$dataarray[8] = $_POST['adhar'];
	$dataarray[9] = $_POST['voterid'];
	$dataarray[10] = $_POST['pan'];
	$dataarray[11] = "";
	$dataarray[12] = "";
	$dataarray[13] = "";
	$dataarray[14] = "";
	//$voterid_url = $_POST['voterid_url'];
	//---------------- Upload VoterId --------------
	if($_FILES["voterid_url"]["name"]!="")
	{
		$imageName = $_FILES["voterid_url"]["name"];
		$imagePath = $_FILES["voterid_url"]["tmp_name"];
		$destination = "voterid/"."$dataarray[8].jpeg";
		$dataarray[11] = $destination;
		move_uploaded_file($imagePath, $destination);
	}
	//---------------- End -------------------------
	//$adhar_url = $_POST['adhar_url'];
	//---------------- Upload Adhar --------------
	if($_FILES["adhar_url"]["name"]!="")
	{
		$imageName = $_FILES["adhar_url"]["name"];
		$imagePath = $_FILES["adhar_url"]["tmp_name"];
		$destination = "adhar/"."$dataarray[8].jpeg";
		$dataarray[12] = $destination;
		move_uploaded_file($imagePath, $destination);
	}
	//---------------- End -------------------------
	//$pan_url = $_POST['pan_url'];
	//---------------- Upload Pan --------------
	if($_FILES["pan_url"]["name"]!="")
	{
		$imageName = $_FILES["pan_url"]["name"];
		$imagePath = $_FILES["pan_url"]["tmp_name"];
		$destination = "pan/"."$dataarray[8].jpeg";
		$dataarray[13] = $destination;
		move_uploaded_file($imagePath, $destination);
	}
	//---------------- End -------------------------
	//$pic_url = $_POST['pic_url'];
	//---------------- Upload Pic --------------
	if($imageName = $_FILES["pic_url"]["name"]!="")
	{
		$imageName = $_FILES["pic_url"]["name"];
		$imagePath = $_FILES["pic_url"]["tmp_name"];
		$destination = "pic/"."$dataarray[8].jpeg";
		$dataarray[14] = $destination;
		move_uploaded_file($imagePath, $destination);
	}
	//---------------- End -------------------------
	$dataarray[15] = $_POST['account_number'];
	$dataarray[16] = $_POST['bank_name'];
	$dataarray[17] = $_POST['branch_name'];
	$dataarray[18] = $_POST['ifc_code'];
	$dataarray[19] = $_POST['contact'];
	$dataarray[20] = $_POST['email'];
	$object = new accessorOperations();
	//----------- Work On Progress --------
	$object->UpdateKYC($dataarray);
	header("Location:admindashboard.php?message=Data Updated&navigate=update");
?>