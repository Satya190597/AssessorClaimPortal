<!DOCTYPE html>
<html>
<head>
	<title>Update Your Claim</title>
	<link rel="stylesheet" href="style/home.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="lib/jquery.min.js"></script>
	<script src="javascript/updateClaimBatch.js"></script>
	<script src="javascript/home.js"></script>
	<?php
		include_once 'connection/connection.php';
		include_once 'class/controller.php';
		$object = new accessorOperations();
		session_start();
		$adhar = $_SESSION['useradhar'];
		$dataarray = $object->SelectKYC($adhar);
		$CLAIMID = $_GET['claimID'];
		$result = $object->selectClaimByID($CLAIMID);
		$row = mysqli_fetch_assoc($result);
	?>
</head>
<body>
	<center>
		<div class="claimContainerForm" style="width:80%"><br>
      		<form method="POST" action="addClaim.php" enctype="multipart/form-data">
      			<input type="hidden" value="<?php echo $CLAIMID; ?>" name="claimid" />
				<table class="claimform">
					<tr>
						<td colspan="7">
							<h1><b>Update Your Claim</b></h1>
						</td>
					</tr>
					<tr>
						<td colspan="7"><h3><b>Claim Form</b></h3></td>
					</tr>
					<tr>
						<td>To</td>
						<td colspan="2">
							<input type="text" name="to" style="width:100%"  class="form form-control" value="National Head Skill Assessment and Certification Cell" readonly="true"/><br>
						</td>
						<td>Date</td>
						<td>
							<input type="date" name="date"  class="form form-control" value="<?php echo $row['date']; ?>" required/>
						</td>
						<td>For the month of</td>
						<td>
							<select name="forMonthOf" class="form form-control" id="forMonthOf" onchange="checkDate()" required>
								<option value="">-- SELECT --</option>
								<option value="JANUARY">JANUARY</option>
								<option value="FEBRUARY">FEBRUARY</option>
								<option value="MARCH">MARCH</option>
								<option value="APRIL">APRIL</option>
								<option value="MAY">MAY</option>
								<option value="JUNE">JUNE</option>
								<option value="JULY">JULY</option>
								<option value="AUGUST">AUGUST</option>
								<option value="SEPTEMBER">SEPTEMBER</option>
								<option value="OCTOBER">OCTOBER</option>
								<option value="NOVEMBER">NOVEMBER</option>
								<option value="DECEMBER">DECEMBER</option>
							</select>
							<br>
							<small id="date_error" style="display:none">Your Claim Date Is Invalid</small>
						</td>
					</tr>
					<tr>
						<td colspan="2">CC</td>
						<td colspan="2">
							<input type="text" name="cc" style="width:100%"  class="form form-control" value="Chief Finance Officer" readonly="true"/>
						</td>
						<td>Base Location</td>
						<td colspan="2">
							<input type="text" name="baseLocation" style="width:100%"  class="form form-control" value="<?php echo $row['baseLocation']; ?>" required/>
						</td>
					</tr>
					<tr>
						<td colspan="2">Project claim under</td>
						<td colspan="2">
							<input type="text" name="projectClaimUnder" style="width:100%"  class="form form-control" value="<?php echo $row['projectClaimUnder']; ?>" required/>
						</td>
						<td>Destination Location</td>
						<td colspan="2">
							<input type="text" name="destinationLocation" style="width:100%"  class="form form-control" value="<?php echo $row['destinationLocation']; ?>" required/>
						</td>
					</tr>
					<tr>
						<td colspan="2">Name Of The Candidate</td>
						<td colspan="2">
							<input type="text" 
							name="nameOfCandidate" 
							style="width:100%" 
							readonly="true" 
							value="<?php echo $dataarray[0] ?>"
							class="form form-control" /></td>
						<td>Contact Number</td>
						<td colspan="2">
							<input type="text" 
							name="contactNumber" 
							style="width:100%" 
							value="<?php echo $dataarray[19] ?>"
							readonly="true" class="form form-control"/>
						</td>
					</tr>
					<tr>
						<td colspan="2">Bank Name</td>
						<td colspan="1">
							<input type="text" 
							name="bankName" 
							style="width:100%" 
							readonly="true" 
							value="<?php echo $dataarray[16] ?>"
							class="form form-control"/></td>
						<td>Bank Branch</td>
						<td colspan="1">
							<input type="text" 
							name="bankBranch" 
							style="width:100%" 
							readonly="true" 
							value="<?php echo $dataarray[17] ?>" class="form form-control"/>
						</td>
						<td>PAN Number</td>
						<td colspan="1">
							<input type="text" 
							name="panNumber" 
							style="width:100%" 
							readonly="true" 
							value="<?php echo $dataarray[10] ?>"
							class="form form-control"/></td>
					</tr>
					<tr>
						<td colspan="2">Account Number</td>
						<td colspan="2">
							<input type="text" 
							name="accountNumber" 
							style="width:100%" 
							readonly="true" 
							value="<?php echo $dataarray[15] ?>" class="form form-control"/>
						</td>
						<td>IFSC Code</td>
						<td colspan="2">
							<input type="text" 
							name="ifcCode" 
							style="width:100%" 
							readonly="true" 
							value="<?php echo $dataarray[18] ?>" class="form form-control"/>
						</td>
					</tr>
					<tr>
						<td colspan="7"><h3><b>Details batch Assessed</b></h3></td>
					</tr>
					<?php
						$result = $object->selectClaimBatchByClaimID($CLAIMID);
						while($row_batch = mysqli_fetch_assoc($result))
						{
					?>
					<tr>
						<td>
							<input type="hidden" 
							value="<?php echo $row_batch['ID']; ?>" 
							id="<?php echo $row_batch['ID']; ?>ID" />
							<input type="text" 
							value="<?php echo $row_batch['batchNo']; ?>"		
							class="form-control"
							id="<?php echo $row_batch['ID']; ?>batch"/>
						</td>
						<td>
							<input type="text" 
							value="<?php echo $row_batch['sector']; ?>" 		
							class="form-control"
							id="<?php echo $row_batch['ID']; ?>sector"/>
						</td>
						<td>
							<input type="text" 
							value="<?php echo $row_batch['trade']; ?>" 		
							class="form-control"
							id="<?php echo $row_batch['ID']; ?>trade"/>
						</td>
						<td>
							<input type="date" 
							value="<?php echo $row_batch['doa']; ?>"			
							class="form-control"
							id="<?php echo $row_batch['ID']; ?>date"/>
						</td>
						<td>
							<input type="text" 
							value="<?php echo $row_batch['candidates']; ?>" 	
							class="form-control"
							id="<?php echo $row_batch['ID']; ?>candidate"/>
						</td>
						<td>
							<input type="text" 
							value="<?php echo $row_batch['amountClaim']; ?>"	
							class="form-control"
							id="<?php echo $row_batch['ID']; ?>amount"/>
						</td>
						<td><a href="upload_batch_image.php?batch_id=<?php echo $row_batch['ID']; ?>&batch_number=<?php echo $row_batch['batchNo'] ?>">Upload Files</a></td>
					</tr>
					<tr>
						<td colspan="7">
							<input type="button" value="Update" onclick="updateClaim(<?php echo $row_batch['ID']; ?>);" class="btn btn-primary" style="font-weight: bold"/>
							<a href="delete_claim_batch.php?id=<?php echo $row_batch['ID']; ?>" class="btn btn-danger" style="font-weight: bold">Delete</a>
						</td>
					</tr>
					<?php
						}
					?>
				</tr>
				<tr>
					<td>
						Less Advance Taken
					</td>
					<td colspan="7">
						<input type="number" name="lessbalance" class="form-control" value="<?php echo $row['lessAdvanceTaken']; ?>" />
					</td>
				</tr>
				<tr>
					<td colspan="8">
						<input type="submit" value="Update" name="updateClaim" class="btn btn-primary" id="claimsubmit" style="font-weight:bold"/>
						<a href="home.php?navigate=claimdetail" class="btn btn-primary" style="font-weight:bold">Back To Claim Details</a>
					</td>
				</tr>
			</table>
			</form>				      	
		</div>
	</center>
</body>
</html>