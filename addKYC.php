<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	//include 'operation.php';
	session_start();
	if($_SESSION['useradhar']!=null)
	{
		if(isset($_POST['addkyc'])!=null)
		{
			$dataarray = array();
			$adhar = $_SESSION['useradhar'];
			$dataarray[0]  = $_POST['accessor_name'];
			$dataarray[1]  = $_POST['father_name'];
			$dataarray[2]  = $_POST['mother_name'];
			$dataarray[3]  = $_POST['dob'];
			if($_POST['rwo']=="yes")
			{
				$dataarray[4]  = $_POST['organization_name'];
				$dataarray[5] = $_POST['organization_relationship'];
			}
			else
			{
				$dataarray[4] = null;
				$dataarray[5] = null;
			}
			$dataarray[6] = $_POST['present_address'];
			$dataarray[7] = $_POST['permanent_address'];
			$dataarray[8] = $adhar;
			$dataarray[9] = $_POST['voterid_number'];
			$dataarray[10] = $_POST['pan_number'];
			//$voterid_url = $_POST['voterid_url'];
			//---------------- Upload VoterId --------------
			if($_POST['voterid_number']!='' || $_POST['voterid_number']!=null)
			{
				$imageName = $_FILES["voterid_url"]["name"];
			    	$imagePath = $_FILES["voterid_url"]["tmp_name"];
			    	$destination = "voterid/"."$adhar.jpeg";
			    	$dataarray[11] = $destination;
			    	move_uploaded_file($imagePath, $destination);
			}
			else
			{
				$dataarray[11] = null;
			}
			//---------------- End -------------------------
			//$adhar_url = $_POST['adhar_url'];
			//---------------- Upload Adhar --------------
			$imageName = $_FILES["adhar_url"]["name"];
		    	$imagePath = $_FILES["adhar_url"]["tmp_name"];
		    	$destination = "adhar/"."$adhar.jpeg";
		    	$dataarray[12] = $destination;
		    	move_uploaded_file($imagePath, $destination);
			//---------------- End -------------------------
			//$pan_url = $_POST['pan_url'];
			//---------------- Upload Pan --------------
			$imageName = $_FILES["pan_url"]["name"];
		    	$imagePath = $_FILES["pan_url"]["tmp_name"];
		    	$destination = "pan/"."$adhar.jpeg";
		    	$dataarray[13] = $destination;
		    	move_uploaded_file($imagePath, $destination);
			//---------------- End -------------------------
			//$pic_url = $_POST['pic_url'];
			//---------------- Upload Pic --------------
			$imageName = $_FILES["pic_url"]["name"];
		    	$imagePath = $_FILES["pic_url"]["tmp_name"];
		    	$destination = "pic/"."$adhar.jpeg";
		    	$dataarray[14] = $destination;
		   	 move_uploaded_file($imagePath, $destination);
			//---------------- End -------------------------
			$dataarray[15] = $_POST['account_number'];
			$dataarray[16] = $_POST['bank_name'];
			$dataarray[17] = $_POST['branch_name'];
			$dataarray[18] = $_POST['ifc_code'];
			$dataarray[19] = $_POST['contact'];
            $dataarray[20] = $_POST['gender'];
            echo $_SESSION['usertype'];
            if($_SESSION['usertype']!="coordinator")
            {
                $dataarray[21] = $_POST['coordinator_id'];
            }
            else
            {
                $dataarray[21] = 0;
            }
			$object = new accessorOperations();
			$object->InsertKYC($dataarray);
			header("Location:home.php");
		}
		else
		{
			//header("Location:index.php");
		}
	}
	else
	{
		header("Location:index.php");
	}
	
?>