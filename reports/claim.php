<html>
	<head>
		<title>Claim Report</title>
		<script>
			window.print();
		</script>
		<!-- <link rel="stylesheet" href="../style/claim.css"> -->
		<style>
		    table
		    {
		        margin-top: 2%;
            	max-width:900px;
            	min-width:900px;
		        border-collapse: collapse;
		    }
		</style>
		<?php
			include_once '../connection/connection.php';
			include_once '../class/controller.php';
			session_start();
			if(isset($_SESSION["useradhar"]) || isset($_SESSION["adminid"]))
			{
				$adhar = $_SESSION["useradhar"];
				$claimID = $_GET["claimID"];
				$object = new accessorOperations();
				$result = $object->ClaimReport($claimID);
				$rowSingle = mysqli_fetch_assoc($result);
			}
			else
			{
				header("Location:../login.php");
			}
		?>
	</head>
	<body>
		<center>
			<p><b>Skill Assessment and Certification Cell </br>Centurion University Of Technology & Management</b></p>
			<p><b>Claim Form</b></br>
			<table border="1">
				<tr>
					<td colspan="7"><b>Claim ID : <?php echo $_GET["claimID"] ?></b></td>
				</tr>
				<tr>
					<td class="bold">To</td>
					<td colspan="2">
						<?php echo $rowSingle["claimTo"] ?>
					</td>
					<td class="bold">Date</td>
					<td>
						<?php echo $rowSingle["date"] ?>
					</td>
					<td class="bold">For the month of</td>
					<td>
						<?php echo $rowSingle["forMonthOf"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="bold">CC</td>
					<td colspan="2">
						<?php echo $rowSingle["cc"] ?>
					</td>
					<td class="bold">Base Location</td>
					<td colspan="2">
						<?php echo $rowSingle["baseLocation"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="bold">Project claim under</td>
					<td colspan="2">
						<?php echo $rowSingle["projectClaimUnder"] ?>
					</td>
					<td class="bold">Destination Location</td>
					<td colspan="2">
						<?php echo $rowSingle["destinationLocation"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="bold">Name Of The Candidate</td>
					<td colspan="2">
						<?php echo $rowSingle["userName"] ?>
					</td>
					<td class="bold">Contact Number</td>
					<td colspan="2">
						<?php echo $rowSingle["contact"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="bold">Bank Name</td>
					<td colspan="1">
						<?php echo $rowSingle["bankName"] ?>
					</td>
					<td class="bold">Bank Branch</td>
					<td colspan="1">
						<?php echo $rowSingle["bankBranch"] ?>
					</td>
					<td class="bold">PAN Number</td>
					<td colspan="1">
						<?php echo $rowSingle["panNumber"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="bold">Account Number</td>
					<td colspan="2">
						<?php echo $rowSingle["accountNumber"] ?>
					</td>
					<td class="bold">IFSC Code</td>
					<td colspan="2">
						<?php echo $rowSingle["ifcCode"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="6" class="bold"><h3><b>Details batch Assessed</b></h3></td>
					<td rowspan="2" class="bold">Amount Claim</td>
				</tr>
				<tr>
					<td class="bold">Slno</td>
					<td class="bold">Batch Number</td>
					<td class="bold">Sector</td>
					<td class="bold">Trade</td>
					<td class="bold">Date of Assessment</td>
					<td class="bold">Number of Candidate</td>
				</tr>
				<tr>
					<?php
						$count = 1;
						$result = $object->ClaimReport($claimID);
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr>";
							echo "<td>".$count."</td>";
							echo "<td>".$row["batchNo"]."</td>";
							echo "<td>".$row["sector"]."</td>";
							echo "<td>".$row["trade"]."</td>";
							echo "<td>".$row["doa"]."</td>";
							echo "<td>".$row["candidates"]."</td>";
							echo "<td>".$row["amountClaim"]."</td>";
							echo "</tr>";
							$count++;
						}
						
					?>
				</tr>
				<tr>
					<td colspan="6" class="bold">Total Assessment Fee</td>
					<td>
						<?php echo $rowSingle["totalAssessmentFee"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="6" class="bold">Less Advance Taken</td>
					<td>
						<?php echo $rowSingle["lessAdvanceTaken"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="6" class="bold">Balance to (Refund / Payment)</td>
					<td>
						<?php echo $rowSingle["refundBalance"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="bold" style="font-size:13px">Amount in words</td>
					<td colspan="5" style="font-size:13px">
						<?php echo $rowSingle["amountInWords"] ?>
					</td>
				</tr>
				<tr>
					<td colspan="7" style="font-size:12px">
						Further to my above claim, I hereby authorize the paying/disbursing authority to deduct/reduce my claim as per the Management fixation of Cap/Maximum limit from time to time.
The above information furnished by me is true to my knowledge & the documents attached are in order.
 If any deviation found at later stage during audit, I will be held responsible.

					</td>
				</tr>
				<tr>
					<td  colspan="3" style="padding-top:50px;font-size:12px">Signature of Claimant</td>                                                                                                                       
					<td  colspan="4" style="padding-top:50px;text-align:right;font-size:12px">Signature of the State Coordinator</td>
				</tr>
				<tr>
					<td colspan="7" style="font-size:13px"><b>OFFICIAL USE</b></td>
				</tr>
				<tr>
					<td colspan="7" style="font-size:12px">
						<p>
							Check list:<br>
							1.	Copy of Assessment Assignment attached as supporting documents: Yes  /  No<br>
							2.	I/We verified the attendance sheet and found in order: Yes  /  No<br>
							3.	I/We have received all the documents related to assessment: Yes  /No<br>
							Any deviation found at later stage during audit, I /We will be held responsible.<br>
						</p>
					</td>
				</tr>
				<tr>
					<td  colspan="2" style="padding-top:50px;font-size:13px">Signature of Lead Coordinator</td>                                                                                                                       
					<td  colspan="3" style="padding-top:50px;text-align:right;font-size:13px">Signature of Sr. Manager operation</td>
					<td  colspan="2" style="padding-top:50px;text-align:right;font-size:13px">Signature of Accountant</td>
				</tr>
				<tr>
					<td  colspan="3" style="padding-top:50px;font-size:13px">Signature of the Head(Skill Assessment & certification)</td>                                                                                                                       
					<td  colspan="2" style="padding-top:50px;text-align:right;font-size:13px">Signature of Sr. Manager Finance</td>
					<td  colspan="2" style="padding-top:50px;text-align:right;font-size:13px">Signature of  CFO</td>
				</tr>
				<!-- <tr>
					<td  colspan="3" style="padding-top:50px">Remark of Concerned Dept</td>                                                                                                                       
					<td  colspan="4" style="padding-top:50px;text-align:right">Remarks of Account Dept</td>
				</tr> -->
				<tr>
					<td colspan="7">
						<p style="text-align:left;font-size:12px">
								Claim Guide Line:<br>
								1.	Assessment fees should be claimed by the person who has done the assessment<br>
								2.	Coordinator can claim only coordination fee.<br>
								3.	In case claim made by nominated assessors or authorized assessors, then the State coordinator has to sign/endorse the claim at appropriate place.<br>
								4.	The assessment fees are, as notified per module or, per candidate assessed.<br>
								5.	Claims should be submitted with required supporting documents for easy processing. <br>
			
						</p>
					</td>
				</tr>
			</table>
			
		</center>
	</body>
</html>