<?php
	class accessorOperations
	{
		public function allKYC()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT user_kyc.adhar,user_name,contact,email FROM user_kyc,user_master WHERE user_kyc.adhar = user_master.adhar";
			$result = $con->query($query);
			$dataarray = array();
			$temparray = array();
			while($row=mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
		}
		/*
		    Method to get the type of the user who want to login
		*/
		public function getUserType($adhar)
		{
		    $myconnection = new connection();
		    $con = $myconnection->getConnection();
		    $query = "SELECT type FROM user_master WHERE adhar=$adhar";
		    $result = $con->query($query);
		    $row = mysqli_fetch_assoc($result);
		    return $row['type'];
		}
		/*
		    Fetch all the coordinator adhar from user_master table
		*/
		public function getCoordinatorAdhar()
		{
		    $myconnection = new connection();
		    $con = $myconnection->getConnection();
		    $query = "SELECT user_name,type,user_master.adhar FROM user_master,user_kyc WHERE user_kyc.adhar=user_master.adhar AND user_master.type='coordinator'";
		    $result = $con->query($query);
		    return $result;
		}
		public function addUser($email,$password,$adhar)
		{		
	 		$myconnection = new connection();
		 	$con = $myconnection->getConnection();
			$query = "INSERT INTO user_master VALUES($adhar,'$email','$password','assessor')";
			$con->query($query);
		}
		public function validateUser($adhar)
		{
			$myconnection = new connection();
		 	$con = $myconnection->getConnection();
			$query = "SELECT COUNT(*) FROM user_master WHERE adhar=$adhar";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			if($row[0]>0)
				return false;
			else
				return true;
		}
		public function forgetPassword($adhar)
		{
			$myconnection = new connection();
		 	$con = $myconnection->getConnection();
			$query = "SELECT * FROM user_master WHERE adhar=$adhar";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			$dataarray = array();
			$dataarray[0] = $row[1];
			$dataarray[1] = $row[2];
			return $dataarray;
		}
		public function Login($adhar,$password)
		{
			$myconnection = new connection();
		 	$con = $myconnection->getConnection();
		 	$query = "SELECT * FROM user_master WHERE adhar=$adhar AND password='$password'";
		 	$result = $con->query($query);
		 	$rows = mysqli_num_rows($result);
		 	if($rows>0)
		 		return true;
		 	else
		 		return false;
		}
		public function AdminLogin($id,$password)
		{
			$myconnection = new connection();
		 	$con = $myconnection->getConnection();
		 	$query = "SELECT * FROM admin WHERE adminId='$id' AND password='$password'";
		 	$result = $con->query($query);
		 	return $result;
		 	/*$rows = mysqli_num_rows($result);
		 	if($rows>0)
		 		return true;
		 	else
		 		return false;*/
		}
		public function checkNewKYC($adhar)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT COUNT(*) FROM user_kyc WHERE adhar=$adhar";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			if($row[0]>0)
				return true;
			else
				return false;
		}
		public function InsertKYC($dataarray)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			if($dataarray[4]==null && $dataarray[5]==null)
			{
				$query = "INSERT INTO user_kyc VALUES
				('$dataarray[0]',
				'$dataarray[1]',
				'$dataarray[2]',
				'$dataarray[3]',
				null,
				null,
				'$dataarray[6]',
				'$dataarray[7]',
		         $dataarray[8],
		        '$dataarray[9]',
		        '$dataarray[10]',
		        '$dataarray[11]',
		        '$dataarray[12]',
		        '$dataarray[13]',
		        '$dataarray[14]',
		        '$dataarray[15]',
		        '$dataarray[16]',
		        '$dataarray[17]',
		        '$dataarray[18]',
		        '$dataarray[19]',
                '$dataarray[20]',
                 $dataarray[21]);";
			}
			else
			{
				$query = "INSERT INTO user_kyc VALUES
				('$dataarray[0]',
				'$dataarray[1]',
				'$dataarray[2]',
				'$dataarray[3]',
				'$dataarray[4]',
				'$dataarray[5]',
				'$dataarray[6]',
				'$dataarray[7]',
           		$dataarray[8],
        		'$dataarray[9]',
        		'$dataarray[10]',
        		'$dataarray[11]',
        		'$dataarray[12]',
        		'$dataarray[13]',
        		'$dataarray[14]',
        		'$dataarray[15]',
        		'$dataarray[16]',
        		'$dataarray[17]',
        		'$dataarray[18]',
        		'$dataarray[19]',
                '$dataarray[20]',
                 $dataarray[21]);";
        	}
			$result = $con->query($query);
		}
		public function SelectKYC($adhar)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM user_kyc WHERE adhar=$adhar LIMIT 1";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			$column = mysqli_num_fields($result);
			$dataarray = array();
			for($i=0;$i<$column;$i++)
			{
				$dataarray[$i] = $row[$i];
			}
			return $dataarray;
		}
		/*
			Function : GenerateClaimID.
			Return : Generate new id for claim.
			Parameter :  no parameter.
			Date : 9/3/2018
		*/
		public function GenerateClaimId()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT claimID FROM claim ORDER BY claimID DESC LIMIT 1";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			if($row[0]=='' || $row[0]==null)
			{
				$id = 1000;
				return $id;
			}
			else
			{
				$id = $row[0];
				$id++;
				return $id;
			}
		}
		public function GenerateTempClaimId()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT claimID FROM temp_claim ORDER BY claimID DESC LIMIT 1";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			if($row[0]=='' || $row[0]==null)
			{
				$id = 1000;
				return $id;
			}
			else
			{
				$id = $row[0];
				$id++;
				return $id;
			}
		}
		/*
			Function : InsertClaim.
			Return : no return type.
			Parameter :  array array int.
			Date : 9/3/2018
		*/
		public function DeleteTempClaim($claimID)
		{
			$query = "DELETE FROM temp_claim WHERE claimID = $claimID";
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$con->query($query);
		}
		public function DeleteTempClaimBatch($claimID)
		{
			$query = "DELETE FROM temp_claim_batch WHERE claimID = $claimID";
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$con->query($query);
		}
		public function DeleteTempBatchImage($claimID)
		{
			$query = "DELETE FROM temp_batch_image WHERE claimID = $claimID";
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$con->query($query);
		}
		public function InsertClaim($dataarray,$batchdataarry,$length,$claimID)
		{
			$id = $this->GenerateClaimId();
			
			// ****************** Delete data from temp_claim table to avoid redundancy       ******************
			
			$this->DeleteTempClaim($claimID);
			
			// ****************** Delete data from temp_claim_batch  table to avoid redundancy *****************
			
			$this->DeleteTempClaimBatch($claimID);
			
			$query = "INSERT INTO claim VALUES($id,'$dataarray[0]','$dataarray[1]','$dataarray[2]','$dataarray[3]','$dataarray[4]',
                         '$dataarray[5]',
                         '$dataarray[6]',
                         '$dataarray[7]',
                         $dataarray[8],
                         $dataarray[9],
                         '$dataarray[10]',
                         '$dataarray[11]',
                         '$dataarray[12]',
                         '$dataarray[13]',
                         '$dataarray[14]',
                         $dataarray[15],
                         $dataarray[16],
                         $dataarray[17],
                         '$dataarray[18]',
                         $dataarray[19])";
	            	$myconnection = new connection();
			$con = $myconnection->getConnection();
			$con->query($query);
			for($i=0;$i<$length;$i++)
			{
				$batchNo = $batchdataarry[$i][0];
				$sector = $batchdataarry[$i][1];
				$trade = $batchdataarry[$i][2];
				$doa = $batchdataarry[$i][3];
				$candidates = $batchdataarry[$i][4];
				$amountClaim = $batchdataarry[$i][5];

				$query = "INSERT INTO claim_batch VALUES(null,$id,
                               '$batchNo',
                               '$sector',
                               '$trade',
                               '$doa',
                               $candidates,
                               $amountClaim);";
               		       $con->query($query);
			}
			/*
				Insert  Pic In batch_image 
			*/
			$query = "SELECT * FROM temp_batch_image WHERE claimID=$claimID";
			$con = $myconnection->getConnection();
			$result = $con->query($query);
			while($row=mysqli_fetch_array($result))
			{
				$query = "INSERT INTO batch_image VALUES(null,$id,'$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]')";
				$con->query($query);
			}
			
			// ****************** Delete data from temp_batch_image table to avoid redundancy *****************
			
			$this->DeleteTempBatchImage($claimID);
		}
		/*
			Saved Claim
		*/
		public function SaveClaim($dataarray,$batchdataarry,$length)
		{
			$id = $this->GenerateTempClaimId();
			$query = "INSERT INTO temp_claim VALUES($id,'$dataarray[0]','$dataarray[1]','$dataarray[2]','$dataarray[3]','$dataarray[4]',
                         '$dataarray[5]',
                         '$dataarray[6]',
                         '$dataarray[7]',
                         $dataarray[8],
                         $dataarray[9],
                         '$dataarray[10]',
                         '$dataarray[11]',
                         '$dataarray[12]',
                         '$dataarray[13]',
                         '$dataarray[14]',
                         $dataarray[15],
                         $dataarray[16],
                         $dataarray[17],
                         '$dataarray[18]',
                         $dataarray[19])";
	            	$myconnection = new connection();
			$con = $myconnection->getConnection();
			$con->query($query);
			for($i=0;$i<$length;$i++)
			{
				$batchNo = $batchdataarry[$i][0];
				$sector = $batchdataarry[$i][1];
				$trade = $batchdataarry[$i][2];
				$doa = $batchdataarry[$i][3];
				$candidates = $batchdataarry[$i][4];
				$amountClaim = $batchdataarry[$i][5];

				$query = "INSERT INTO temp_claim_batch VALUES(null,$id,
                               '$batchNo',
                               '$sector',
                               '$trade',
                               '$doa',
                               $candidates,
                               $amountClaim);";
               		       $con->query($query);
			}
		}
		#------------------------------------------------------------------------------------------------------------
		#	Insert Claim Batch
		# 	Set claim id to -1
		#------------------------------------------------------------------------------------------------------------
		public function insertClaimBatch($batchno,$sector,$trade,$doa,$candidates,$amount,$adhar)
		{
			$query = "INSERT INTO claim_batch(ID,claimID,batchNo,sector,trade,doa,candidates,amountClaim,adhar) VALUES(null,-1,'$batchno','$sector','$trade','$doa',$candidates,$amount,$adhar)";
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			return $con->query($query);
		}
		#------------------------------------------------------------------------------------------------------------
		#	Select Claim for claimid -1 and for specific user
		#------------------------------------------------------------------------------------------------------------
		public function selectClaimBatch($adhar)
		{
			$query 			= "SELECT * FROM claim_batch WHERE claimID=-1 AND adhar=$adhar";
			$myconnection	= new connection();
			$con 			= $myconnection->getConnection();
			$result 		=  $con->query($query);
			mysqli_close($con);
			return $result;
		}
		public function SaveClaimBatch($dataarray,$batchdataarry,$length,$claimID)
		{
			$this->DeleteTempClaim($claimID);
			$this->DeleteTempClaimBatch($claimID);
			$query = "INSERT INTO temp_claim VALUES('$claimID','$dataarray[0]','$dataarray[1]','$dataarray[2]','$dataarray[3]','$dataarray[4]',
                         '$dataarray[5]',
                         '$dataarray[6]',
                         '$dataarray[7]',
                         $dataarray[8],
                         $dataarray[9],
                         '$dataarray[10]',
                         '$dataarray[11]',
                         '$dataarray[12]',
                         '$dataarray[13]',
                         '$dataarray[14]',
                         $dataarray[15],
                         $dataarray[16],
                         $dataarray[17],
                         '$dataarray[18]',
                         $dataarray[19])";
	            	$myconnection = new connection();
			$con = $myconnection->getConnection();
			$con->query($query);
			for($i=0;$i<$length;$i++)
			{
				$batchNo = $batchdataarry[$i][0];
				$sector = $batchdataarry[$i][1];
				$trade = $batchdataarry[$i][2];
				$doa = $batchdataarry[$i][3];
				$candidates = $batchdataarry[$i][4];
				$amountClaim = $batchdataarry[$i][5];

				$query = "INSERT INTO temp_claim_batch VALUES(null,'$claimID',
                               '$batchNo',
                               '$sector',
                               '$trade',
                               '$doa',
                               $candidates,
                               $amountClaim);";
               		       $con->query($query);
			}
			
		}
		/*
			Select Files For Claim
		*/
		public function GetClaimFiles($claim_id)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM  batch_image WHERE claimID=$claim_id";
			return $con->query($query);
		}
		/*
			Check Saved Claim
		*/
		public function SaveClaimGet($adhar_id)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM temp_claim,temp_claim_batch WHERE temp_claim.claimID=temp_claim_batch.claimID AND temp_claim.adhar=$adhar_id";
			$result = $con->query($query);
			$count  = mysqli_num_rows($result);
			return $result;
		}
		/*
			Upload Image
		*/
		public function UploadImage($dataarray)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT count(*) FROM temp_batch_image WHERE BatchNumber = '$dataarray[1]' AND claimID=$dataarray[0]";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			if($row[0]<=0)
			{
			$query = "INSERT INTO temp_batch_image VALUES(null,$dataarray[0],'$dataarray[1]','$dataarray[2]','$dataarray[3]','$dataarray[4]','$dataarray[5]','$dataarray[6]','$dataarray[7]','$dataarray[8]','$dataarray[9]','$dataarray[10]','$dataarray[11]','$dataarray[12]','$dataarray[13]')";
			$result = $con->query($query);
			return $result;
			}
			else
			{
				$query = "UPDATE `temp_batch_image` SET 
				`AssessmentDate`='$dataarray[2]',
				`TrainingProvider`='$dataarray[3]',
				`TestingCenter`='$dataarray[4]',
				`ImageOne`='$dataarray[5]',
				`ImageTwo`='$dataarray[6]',
				`ImageThree`='$dataarray[7]',
				`ImageFour`='$dataarray[8]',
				`ImageFive`='$dataarray[9]',
				`ImageSix`='$dataarray[10]',
				`ImageSeven`='$dataarray[11]',
				`ImageEight`='$dataarray[12]',
				`ImageNine`='$dataarray[13]' WHERE BatchNumber = '$dataarray[1]'";
				$result = $con->query($query);
				return $result;
			}
		}
		/*
			Function : SelectClaim.
			Return : mysqli result.
			Parameter : int (adhar id).
			Date : 9/3/2018
		*/
		public function SelectClaim($adhar)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM claim WHERE adhar=$adhar ORDER BY claimID DESC";
			$result = $con->query($query);
			return $result;
		}
		/*
			Function : ClaimReport.
			Return : mysqli result.
			Parameter : int (claimID).
			Date : 9/3/2018
		*/
		public function ClaimReport($claimID)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM claim,claim_batch WHERE claim.claimID=claim_batch.claimID AND claim.claimID=$claimID";
			$result = $con->query($query);
			return $result;
		}
		/*
			TEMP CLAIM REPORT
		*/
		public function TempClaimReport($claimID)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM temp_claim,temp_claim_batch WHERE temp_claim.claimID=temp_claim_batch.claimID AND temp_claim.claimID=$claimID";
			$result = $con->query($query);
			return $result;
		}
		public function selectPendingClaims()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM claim WHERE status=0 ORDER BY date DESC";
			$result = $con->query($query);
			$dataarray = array();
			$temparray = array();
			while($row=mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
		}
		public function selectRedeemClaims()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM claim WHERE status=2 ORDER BY date DESC";
			$result = $con->query($query);
			$dataarray = array();
			$temparray = array();
			while($row=mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
		}
		public function selectApprovedClaims()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM claim WHERE status=1 ORDER BY date DESC";
			$result = $con->query($query);
			$dataarray = array();
			$temparray = array();
			while($row=mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
		}
		public function approvClaim($claimid)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "UPDATE claim SET status=1 WHERE claimID=$claimid";
			$con->query($query);
		}
		public function reedemClaim($claimid)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "UPDATE claim SET status=2 WHERE claimID=$claimid";
			$con->query($query);
		}
		public function deapprovClaim($claimid)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "UPDATE claim SET status=0 WHERE claimID=$claimid";
			$con->query($query);
		}
		public function request()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM request ORDER BY date DESC";
			$result = $con->query($query);
			$dataarray = array();
			$temparray = array();
			while($row=mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
		}
		public function UpdateKYC($dataarray)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "UPDATE `user_kyc` SET user_name='$dataarray[0]',
			user_father_name='$dataarray[1]',
			user_mother_name='$dataarray[2]',
			dob='$dataarray[3]',
			organization_name='$dataarray[4]',
			organization_relationship='$dataarray[5]',
			present_address='$dataarray[6]',
			permanent_address='$dataarray[7]',
			voterid='$dataarray[9]',
			pan='$dataarray[10]',
			account_number='$dataarray[15]',
			bank_name='$dataarray[16]',
			branch_name='$dataarray[17]',
			ifc_code='$dataarray[18]',
			contact='$dataarray[19]' WHERE adhar=$dataarray[8]";
			$con->query($query);
			if($dataarray[11]!="")
			{
				$query = "UPDATE `user_kyc` SET voterid_url='$dataarray[11]' WHERE adhar=$dataarray[8]";
				$con->query($query);
			}
			if($dataarray[12]!="")
			{
				$query = "UPDATE `user_kyc` SET adhar_url='$dataarray[12]' WHERE adhar=$dataarray[8]";
				$con->query($query);
			}
			if($dataarray[13]!="")
			{
				$query = "UPDATE `user_kyc` SET pan_url='$dataarray[13]' WHERE adhar=$dataarray[8]";
				$con->query($query);
			}
			if($dataarray[14]!="")
			{
				$query = "UPDATE `user_kyc` SET pic_url='$dataarray[14]' WHERE adhar=$dataarray[8]";
				$con->query($query);
			}
			$query = "UPDATE user_master SET email='$dataarray[20]' WHERE adhar=$dataarray[8]";
			$con->query($query);
		}
		public function SelectKYCKJSON($adhar)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM user_kyc JOIN user_master ON user_kyc.adhar = user_master.adhar WHERE user_kyc.adhar=$adhar LIMIT 1";
			$result = $con->query($query);
			$row = mysqli_fetch_assoc($result);
			return json_encode($row);
		}
		public function InsertRequest($adhar,$name,$details)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "INSERT INTO request VALUES(null,'$name',$adhar,'$details',now(),false)";
			$result = $con->query($query);
		}
		public function selectClaimsTracker($adhar,$month,$year)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT claimID,
			claimTo,
			userName,
			adhar,
			date,
			status,
			(SELECT SUM(totalAssessmentFee) FROM claim 
			WHERE claimID IN (SELECT claimID FROM claim WHERE
			adhar=$adhar AND month(date)='$month' AND year(date)='$year')) AS totalamount,
			(SELECT SUM(candidates) FROM claim_batch WHERE 
			claimID IN (SELECT claimID FROM claim WHERE adhar=$adhar AND month(date)='$month' AND year(date)='$year')) AS totalcandidates,
			(SELECT count(claimID) FROM claim 
			WHERE claimID IN (SELECT claimID FROM claim WHERE
			adhar=$adhar AND month(date)='$month' AND year(date)='$year')) AS total
			FROM claim WHERE adhar=$adhar AND month(date)='$month' AND year(date)='$year'";
			$result = $con->query($query);
			$dataarray = array();
			$temparray = array();
			while($row=mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
		}
		public function isBlock($adhar)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT count(adhar) AS isblock FROM blocklist WHERE adhar=$adhar";
			$result = $con->query($query);
			$row = mysqli_fetch_array($result);
			return $row[0];
		}
		public function block($adhar)
		{
			$object = new accessorOperations();
			$flag = $object->isBlock($adhar);
			if(!$object->validateUser($adhar))
			{
				if($flag==0)
				{
					$myconnection = new connection();
					$con = $myconnection->getConnection();
					$query = "INSERT INTO blocklist VALUES($adhar)";
					$con->query($query);
					return "{\"message\":\"User Blocked Successfully\"}";
				}
				else
				{
					return "{\"message\":\"User Already Blocked\"}";
				}
			}
			else
			{
				return "{\"message\":\"User Not Found\"}";
			}
		}
		public function unblock($adhar)
		{
			$object = new accessorOperations();
			$flag = $object->isBlock($adhar);
			if(!$object->validateUser($adhar))
			{
				if($flag==1)
				{
					$myconnection = new connection();
					$con = $myconnection->getConnection();
					$query = "DELETE FROM blocklist WHERE adhar=$adhar";
					$con->query($query);
					return "{\"message\":\"User Un-Blocked Successfully\"}";
				}
				else
				{
					return "{\"message\":\"User Already Un-Blocked\"}";
				}
			}
			else
			{
				return "{\"message\":\"User Not Found\"}";
			}
		}

		// Working

		public function sendReply($adhar,$reply,$requestID)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "INSERT INTO reply VALUES(null,$adhar,'$reply');UPDATE request SET reply_status=true WHERE requestID=$requestID";
			$con->multi_query($query);
		}
		public function DeletePic($adhar,$field,$url)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			unlink($url);
			$query = "UPDATE user_kyc SET `$field`=null WHERE adhar=$adhar";
			return $con->query($query);
		}
		public function KyaAllUserDetailReport()
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
                        $query = "SELECT `user_name`, 
                        `dob`, 
                        `organization_name`, 
                        `organization_relationship`, 
                        `present_address`, 
                        `permanent_address`, 
                        `adhar`, 
                        `voterid`, 
                        `pan`, 
                        `account_number`, 
                        `bank_name`, 
                        `branch_name`, 
                        `ifc_code`, 
                        `gender`,
                        `contact` FROM `user_kyc`";
                         return $con->query($query);
		}
		public function CheckForBatchImages($claimId)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT COUNT(*) AS total_number FROM temp_claim_batch WHERE claimID = $claimId";
			$result = $con->query($query);
			$row = mysqli_fetch_assoc($result);
			$total_numbers_of_batch = $row['total_number'];
			$query = "SELECT count(*) AS total_number 
			FROM temp_batch_image WHERE claimID IN 
			(SELECT claimID FROM temp_claim_batch WHERE claimID=$claimId)";
			$result = $con->query($query);
			$row = mysqli_fetch_assoc($result);
			$total_numbers_of_image = $row['total_number'];
		
			if($total_numbers_of_image == $total_numbers_of_batch)
				return true;
			else
				return false;
		}

                /*
                    
                Description: Function to delete details from claim, claim_batch and batch_image table.

                */

                public function DeleteClaim($claimid)
                {
                        $myconnection = new connection();
			$con = $myconnection->getConnection();
			$sql = "DELETE FROM claim WHERE claimId = $claimid;";
			$sql.="DELETE FROM claim_batch WHERE claimId = $claimid;";
			$sql.="DELETE FROM batch_image WHERE claimId = $claimid;";
			$con->multi_query($sql);
                }
                
                /*
                
                Description : Function to fetch all the claim details from claim table
                
                */
                
                public function GetAllClaim()
                {
                	$myconnection = new connection();
			$con = $myconnection->getConnection();
			$sql = "SELECT * FROM claim ORDER BY date";
			$result = $con->query($sql);
			$dataarray = array();
			$temparray = array();
			while($row = mysqli_fetch_assoc($result))
			{
				$temparray = $row;
				array_push($dataarray,$temparray);
			}
			return json_encode($dataarray);
                }
                
                /*
                
                Description :	To fetch all the replies from admin for a particular user.
                
                */
                
                public function GetUserReply($adhar)
                {
                	$myconnection = new connection();
			$con = $myconnection->getConnection();
			$sql = "SELECT * FROM reply WHERE adhar=$adhar";
			return $con->query($sql);
                }
                /*
                
                Description 
                
                */
        public function GetClaimFilesTemp($claim_id)
		{
			$myconnection = new connection();
			$con = $myconnection->getConnection();
			$query = "SELECT * FROM  temp_batch_image WHERE claimID=$claim_id";
			return $con->query($query);
		}
		#----------------------------------------------------------------------------------
		# Update claim batch before submitting the claim form 
		#----------------------------------------------------------------------------------
		public function updateClaimBatch($ID,$BATCH,$SECTOR,$TRADE,$CANDIDATE,$DATE,$AMOUNT)
		{
			$myconnection 	= 	new connection();
			$con 			= 	$myconnection->getConnection();
			$query 			= 	"UPDATE claim_batch SET batchNo='$BATCH',
								sector='$SECTOR',
								trade='$TRADE',
								candidates=$CANDIDATE,
								amountClaim=$AMOUNT,
								doa='$DATE' WHERE ID=$ID AND claimID=-1";
			$result			=	$con->query($query);
			mysqli_close($con);
			return $result;
		}
		#----------------------------------------------------------------------------------
		# Delete claim batch before submitting the claim form 
		#----------------------------------------------------------------------------------
		public function deleteClaimBatch($ID)
		{
			$myconnection 	= 	new connection();
			$con 			= 	$myconnection->getConnection();
			$object  		=	new accessorOperations();
			$object->deleteBatchImageClaim($ID);
			$query 			= 	"DELETE FROM claim_batch WHERE ID=$ID AND claimID=-1";
			$result			=	$con->query($query);
			mysqli_close($con);
			return $result;
		}
		#----------------------------------------------------------------------------------
		#	Add Claim Image
		#----------------------------------------------------------------------------------
		public function addClaimImage($BATCHID,$ASSESSMENTDATE,$TRAININGPROVIDER,$TESTINGCENTER,$IMAGEURL)
		{
			$myconnection	=	new connection();
			$con 			= 	$myconnection->getConnection();
			$query 			=	"INSERT INTO image_batch (ID,batch_number,assessment_date,training_provider,testing_center,image_url)VALUES(null,$BATCHID,'$ASSESSMENTDATE','$TRAININGPROVIDER','$TESTINGCENTER','$IMAGEURL')";
			$result			=	$con->query($query);
			mysqli_close($con);
			return $result;
		}
		#----------------------------------------------------------------------------------
		#	Get Uploaded Image
		#----------------------------------------------------------------------------------
		public function getBatchImage($BATCHID)
		{
			$myconnection	=	new connection();
			$con 			= 	$myconnection->getConnection();
			$query 			= 	"SELECT * FROM image_batch WHERE batch_number=$BATCHID";
			$result			= 	$con->query($query);
			mysqli_close($con);
			return $result;
		}
		#----------------------------------------------------------------------------------
		#	Delete Uploaded Image
		#----------------------------------------------------------------------------------
		public function deleteBatchImage($BATCHID)
		{
			$myconnection	=	new connection();
			$con 			= 	$myconnection->getConnection();
			$object 		= 	new accessorOperations();
			$object->removeFromDirectory($BATCHID);
			$query 			= 	"DELETE FROM image_batch WHERE id=$BATCHID";
			$result			= 	$con->query($query);
			mysqli_close($con);
			return $result;
		}
		#----------------------------------------------------------------------------------
		#	Remove Claim Images From Directory
		#----------------------------------------------------------------------------------
		public function removeFromDirectory($BATCHID)
		{
			$myconnection	=	new connection();
			$con 			= 	$myconnection->getConnection();
			$query 			= 	"SELECT id,image_url FROM image_batch WHERE id=$BATCHID";
			$result			= 	$con->query($query);
			$row 			=	mysqli_fetch_assoc($result);
			mysqli_close($con);
			unlink($row['image_url']);
		}
		#----------------------------------------------------------------------------------
		#	Delete claim Image By batch_id
		#----------------------------------------------------------------------------------
		public function deleteBatchImageClaim($BATCHID)
		{
			$myconnection	=	new connection();
			$con 			= 	$myconnection->getConnection();
			$query 			= 	"SELECT * FROM image_batch WHERE batch_number=$BATCHID";
			$result 		=	$con->query($query);
			$object 		= 	new accessorOperations();
			while($row=mysqli_fetch_assoc($result))
			{
				$object->removeFromDirectory($row['id']);
				$object->deleteBatchImage($row['id']);
			}
			mysqli_close($con);
		}
		#----------------------------------------------------------------------------------
		#	GET AMOUNT Not Done
		#----------------------------------------------------------------------------------
		public function getClaimAmount($BATCHID)
		{
			$myconnection	=	new connection();
			$con 			= 	$myconnection->getConnection();
			$query 			= 	"SELECT * FROM image_batch WHERE batch_number=$BATCHID";
			$result 		=	$con->query($query);
			$object 		= 	new accessorOperations();
			mysqli_close($con);
			while($row=mysqli_fetch_assoc($result))
			{
				$object->removeFromDirectory($row['id']);
				$object->deleteBatchImage($row['id']);
			}
		}
		#----------------------------------------------------------------------------------
		#	NEW CLAIM
		#----------------------------------------------------------------------------------
		public function newClaim($DATA)
		{
			$ID 			= 	$this->GenerateClaimId();
			$myconnection	=	new connection();
			# Get Connection
			$con 			=	$myconnection->getConnection();
			# Get the sum of total assessment fee
			$sum_query		=	"SELECT SUM(amountClaim) AS AMOUNT FROM claim_batch WHERE claimId=-1 AND adhar=".$DATA['ADHAR'];
			$sum_result		=	$con->query($sum_query);
			$sum_row		=	mysqli_fetch_assoc($sum_result);
			# Stored the total amount in $SUM
			$SUM			=	$sum_row['AMOUNT'];
			$query 			=	"INSERT INTO claim (claimID,
			claimTo,
			date,
			forMonthof,
			cc,
			baseLocation,
			projectClaimUnder,
			destinationLocation,
			userName,
			adhar,
			contact,
			bankName,
			bankBranch,
			panNumber,
			accountNumber,
			ifcCode,
			lessAdvanceTaken,
			totalAssessmentFee,
			refundBalance,
			status) VALUES ($ID,
			'".$DATA['TO']."',
			'".$DATA['DATE']."',
			'".$DATA['FORMONTHOF']."',
			'".$DATA['CC']."',
			'".$DATA['BASELOCATION']."',
			'".$DATA['PROJECT']."',
			'".$DATA['DESTINATION']."',
			'".$DATA['CANDIDATE']."',
			".$DATA['ADHAR'].",
			".$DATA['CONTACT'].",
			'".$DATA['BANK']."',
			'".$DATA['BRANCH']."',
			'".$DATA['PAN']."',
			'".$DATA['ACCOUNT']."',
			'".$DATA['IFC']."',
			".$DATA["lessbalance"].",
			".$SUM.",
			".($SUM-$DATA["lessbalance"]).",
			0
			)";
			$result = $con->query($query);
			if($result>=1)
			{
				$query	= "SELECT MAX(claimID) AS ID FROM claim WHERE adhar=".$DATA['ADHAR'];
				$result	= $con->query($query);
				$row 	= mysqli_fetch_assoc($result);
				$UPDATEID = $row["ID"];
				$query  = "UPDATE claim_batch SET claimId=$UPDATEID WHERE adhar=".$DATA['ADHAR']." AND claimId=-1";
				$result = $con->query($query);
				mysqli_close($con);
				return $result;
			}
			else
			{
				mysqli_close($con);
				return 0;
			}	
		}
		#--------------------------------------------------------------------------------------------------
		# Get claim Images 
		#--------------------------------------------------------------------------------------------------
		function getClaimImages($CLAIMID)
		{
			$query = "SELECT * FROM image_batch WHERE batch_number IN (SELECT ID FROM claim_batch WHERE claimID=".$CLAIMID.");";
			$myconnection	=	new connection();
			$con 			=	$myconnection->getConnection();
			$result 		=	$con->query($query);
			return $result;
		}
		#--------------------------------------------------------------------------------------------------
		# GET CLAIM BATCH 
		#--------------------------------------------------------------------------------------------------
		function selectClaimBatchByClaimID($CLAIMID)
		{
			$query 			= "SELECT * FROM claim_batch WHERE claimID=$CLAIMID";
			$myconnection	= new connection();
			$con 			= $myconnection->getConnection();
			$result 		=  $con->query($query);
			mysqli_close($con);
			return $result;
		}
		function selectClaimByID($CLAIMID)
		{
			$query = "SELECT * FROM claim WHERE claimID=".$CLAIMID;
			$myconnection	= new connection();
			$con	= $myconnection->getConnection();
			$result = $con->query($query);
			mysqli_close($con);
			return $result;
		}
		function updateClaim($claimID,$DATA)
		{
			$myconnection	= new connection();
			$con	= $myconnection->getConnection();
			# Get the sum of total assessment fee
			$sum_query		=	"SELECT SUM(amountClaim) AS AMOUNT FROM claim_batch WHERE claimId=$claimID";
			$sum_result		=	$con->query($sum_query);
			$sum_row		=	mysqli_fetch_assoc($sum_result);
			# Stored the total amount in $SUM
			$SUM			=	$sum_row['AMOUNT'];
			$query = "UPDATE `claim` SET 
			claimTo='".$DATA['TO']."',
			date='".$DATA['DATE']."',
			forMonthOf='".$DATA['FORMONTHOF']."',
			baseLocation='".$DATA['BASELOCATION']."',
			projectClaimUnder='".$DATA['PROJECT'] ."',
			destinationLocation='".$DATA['DESTINATION']."',
			lessAdvanceTaken=".$DATA['lessbalance'] .",
			totalAssessmentFee=".$SUM.",
			refundBalance=".($SUM-$DATA["lessbalance"]).",
			status=0 WHERE claimID=".$claimID;
			$result = $con->query($query);
			mysqli_close($con);
			return $result;
		}
	}
?>