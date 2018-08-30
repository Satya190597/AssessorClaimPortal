<?php
	/*
		Use : To insert new claim detail.
		Return : navigate link and a message.
		Date : 10/03/2018.
		Author : Satya Prakash Nandy
	*/
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	session_start();
	if($_SESSION['useradhar']!=null)
	{
                /*
                	Discription : when user click the submit button it will save the claim details and 
                	picture to claim , claim_batch and batch_image table using InsertClaim method
                */
                
		if(isset($_POST['addClaim'])!=null)
		{
			$adhar = $_SESSION['useradhar'];
			$dataarrayClaim = array();
			$dataarrayClaim[0] = $_POST['to'];
			$dataarrayClaim[1] = $_POST['date'];
			$dataarrayClaim[2] = $_POST['forMonthOf'];
			$dataarrayClaim[3] = $_POST['cc'];
			$dataarrayClaim[4] = $_POST['baseLocation'];
			$dataarrayClaim[5] = $_POST['projectClaimUnder'];
			$dataarrayClaim[6] = $_POST['destinationLocation'];
			$dataarrayClaim[7] = $_POST['nameOfCandidate'];
			$dataarrayClaim[8] = $adhar;
			$dataarrayClaim[9] = $_POST['contactNumber'];
			$dataarrayClaim[10] = $_POST['bankName'];
			$dataarrayClaim[11] = $_POST['bankBranch'];
			$dataarrayClaim[12] = $_POST['panNumber'];
			$dataarrayClaim[13] = $_POST['accountNumber'];
			$dataarrayClaim[14] = $_POST['ifcCode'];
			$dataarrayClaim[15] = $_POST['assessmentFee'];
			if($_POST['lessBalance']!=null || $_POST['lessBalance']!="")
				$dataarrayClaim[16] = $_POST['lessBalance'];
			else
				$dataarrayClaim[16] = 0.0;
			if($_POST['rfundBalance']!=null || $_POST['rfundBalance']!="")
				$dataarrayClaim[17] = $_POST['rfundBalance'];
			else
				$dataarrayClaim[17] = 0.0;
			$dataarrayClaim[18] = $_POST['amountInWords'];
			$dataarrayClaim[19] = 0;
			
			$dataarrayClaimBatch = array();
			$row = 0;
			$colum = 0;
			$temp = array();
			$temp = ["_one","_two","_three","_four","_five","_six"];
				
			// ****** Generate A Matrix To Insert Claim Batch ******
		
			for($i=0;$i<sizeof($temp);$i++)
			{
				$colum = 0;
				if(($_POST["batchNumber$temp[$i]"]!="")&&($_POST["sector$temp[$i]"]!="")&&($_POST["trade$temp[$i]"]!="")&&($_POST["dateassessment$temp[$i]"]!="")&&($_POST["noofcandidate$temp[$i]"]!="")&&($_POST["amount$temp[$i]"]!=""))
				{
					$dataarrayClaimBatch[$row][$colum] = $_POST["batchNumber$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["sector$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["trade$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["dateassessment$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["noofcandidate$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["amount$temp[$i]"];
					$row++;
				}
				
			}
			$object = new accessorOperations();
			$object->InsertClaim($dataarrayClaim,$dataarrayClaimBatch,$row,$_POST['claimID']);
			header("Location:home.php?navigate=claimdetail&claimmessage=New Claim Added");
		}
		else if(isset($_POST['saveClaim'])!=null)
		{
			# Working On The Claim Data
			$adhar = $_SESSION['useradhar'];
			$dataarrayClaim = array();
			$dataarrayClaim[0] = $_POST['to'];
			$dataarrayClaim[1] = $_POST['date'];
			$dataarrayClaim[2] = $_POST['forMonthOf'];
			$dataarrayClaim[3] = $_POST['cc'];
			$dataarrayClaim[4] = $_POST['baseLocation'];
			$dataarrayClaim[5] = $_POST['projectClaimUnder'];
			$dataarrayClaim[6] = $_POST['destinationLocation'];
			$dataarrayClaim[7] = $_POST['nameOfCandidate'];
			$dataarrayClaim[8] = $adhar;
			$dataarrayClaim[9] = $_POST['contactNumber'];
			$dataarrayClaim[10] = $_POST['bankName'];
			$dataarrayClaim[11] = $_POST['bankBranch'];
			$dataarrayClaim[12] = $_POST['panNumber'];
			$dataarrayClaim[13] = $_POST['accountNumber'];
			$dataarrayClaim[14] = $_POST['ifcCode'];
			$dataarrayClaim[15] = $_POST['assessmentFee'];
			if($_POST['lessBalance']!=null || $_POST['lessBalance']!="")
				$dataarrayClaim[16] = $_POST['lessBalance'];
			else
				$dataarrayClaim[16] = 0.0;
			if($_POST['rfundBalance']!=null || $_POST['rfundBalance']!="")
				$dataarrayClaim[17] = $_POST['rfundBalance'];
			else
				$dataarrayClaim[17] = 0.0;
			$dataarrayClaim[18] = $_POST['amountInWords'];
			$dataarrayClaim[19] = 0;
			
			// ****** Generate A Matrix To Save Claim Batch ******
			$dataarrayClaimBatch = array();
			$row = 0;
			$colum = 0;
			$temp = array();
			$temp = ["_one","_two","_three","_four","_five","_six"];
		
			for($i=0;$i<sizeof($temp);$i++)
			{
				$colum = 0;
				if(($_POST["batchNumber$temp[$i]"]!="")&&($_POST["sector$temp[$i]"]!="")&&($_POST["trade$temp[$i]"]!="")&&($_POST["dateassessment$temp[$i]"]!="")&&($_POST["noofcandidate$temp[$i]"]!="")&&($_POST["amount$temp[$i]"]!=""))
				{
					$dataarrayClaimBatch[$row][$colum] = $_POST["batchNumber$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["sector$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["trade$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["dateassessment$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["noofcandidate$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["amount$temp[$i]"];
					$row++;
				}
				
			}
			$object = new accessorOperations();
			$object->SaveClaim($dataarrayClaim,$dataarrayClaimBatch,$row);
			header("Location:home.php?navigate=claimsave&claimsavemessage=Claim Saved");
		}
		else if(isset($_POST['addBatch'])!=null)
		{
			$adhar = $_SESSION['useradhar'];
			$dataarrayClaim = array();
			$dataarrayClaim[0] = $_POST['to'];
			$dataarrayClaim[1] = $_POST['date'];
			$dataarrayClaim[2] = $_POST['forMonthOf'];
			$dataarrayClaim[3] = $_POST['cc'];
			$dataarrayClaim[4] = $_POST['baseLocation'];
			$dataarrayClaim[5] = $_POST['projectClaimUnder'];
			$dataarrayClaim[6] = $_POST['destinationLocation'];
			$dataarrayClaim[7] = $_POST['nameOfCandidate'];
			$dataarrayClaim[8] = $adhar;
			$dataarrayClaim[9] = $_POST['contactNumber'];
			$dataarrayClaim[10] = $_POST['bankName'];
			$dataarrayClaim[11] = $_POST['bankBranch'];
			$dataarrayClaim[12] = $_POST['panNumber'];
			$dataarrayClaim[13] = $_POST['accountNumber'];
			$dataarrayClaim[14] = $_POST['ifcCode'];
			$dataarrayClaim[15] = $_POST['assessmentFee'];
			if($_POST['lessBalance']!=null || $_POST['lessBalance']!="")
				$dataarrayClaim[16] = $_POST['lessBalance'];
			else
				$dataarrayClaim[16] = 0.0;
			if($_POST['rfundBalance']!=null || $_POST['rfundBalance']!="")
				$dataarrayClaim[17] = $_POST['rfundBalance'];
			else
				$dataarrayClaim[17] = 0.0;
			$dataarrayClaim[18] = $_POST['amountInWords'];
			$dataarrayClaim[19] = 0;
			
			$dataarrayClaimBatch = array();
			$row = 0;
			$colum = 0;
			$temp = array();
			$temp = ["_one","_two","_three","_four","_five","_six"];
				
			// ****** Generate A Matrix To Insert Claim Batch ******
		
			for($i=0;$i<sizeof($temp);$i++)
			{
				$colum = 0;
				if(($_POST["batchNumber$temp[$i]"]!="")&&($_POST["sector$temp[$i]"]!="")&&($_POST["trade$temp[$i]"]!="")&&($_POST["dateassessment$temp[$i]"]!="")&&($_POST["noofcandidate$temp[$i]"]!="")&&($_POST["amount$temp[$i]"]!=""))
				{
					$dataarrayClaimBatch[$row][$colum] = $_POST["batchNumber$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["sector$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["trade$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["dateassessment$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["noofcandidate$temp[$i]"];
					$colum++;
					$dataarrayClaimBatch[$row][$colum] = $_POST["amount$temp[$i]"];
					$row++;
				}
				
			}
			$object = new accessorOperations();
			$object->SaveClaimBatch($dataarrayClaim,$dataarrayClaimBatch,$row,$_POST['claimID']);
			header("Location:home.php?navigate=claimsave&claimsavemessage=A New Batch Added");
		}
		else if(isset($_POST['deleteClaim'])!=null)
		{
			$object = new accessorOperations();
			$object->DeleteTempClaim($_POST['claimID']);
			$object->DeleteTempClaimBatch($_POST['claimID']);
			$object->DeleteTempBatchImage($_POST['claimID']);
			header("Location:home.php?navigate=claimsave&claimsavemessage=Claim Deleted");
		}
		else
		{
			header("Location:login.php");
		}
	}
	else
	{
		header("Location:login.php");
	}
?>