<html>
	<head>
		<title>Assessor</title>
		<link rel="stylesheet" href="lib/bootstrap.min.css">
		<link rel="stylesheet" href="style/home.css">
  		<script src="lib/jquery.min.js"></script>
  		<script src="lib/popper.min.js"></script>
  		<script src="lib/bootstrap.min.js"></script>
  		<script src="javascript/KYCValidation.js"></script>
  		<script src="javascript/updateClaimBatch.js"></script>
		<script src="javascript/claim.js"></script>
		<script src="javascript/home.js"></script>
		<?php
			include_once 'connection/connection.php';
			include_once 'class/controller.php';
			$object = new accessorOperations();
			session_start();
			$adhar = $_SESSION['useradhar'];
			$usertype = $_SESSION['usertype'];
			if(!isset($_SESSION['useradhar']))
			{
				header("Location:index.php");
			}
			if($object->checkNewKYC($adhar))
			{
				echo "<style>.addKYC{display:none}</style>";
			}
			else
			{
				echo "<style>.accessorWrapper{display:none}</style>";
			}
			if($object->isBlock($adhar)>0)
			{
				echo "<style>.claimContainerForm{display:none}.claimContainerLink{display:none}</style>";
			}
		?>
	</head>
	<body>
                
		<center>
                <div class="info">
				<h5 style="text-align:right"><b>Contact : akpasayat@gmail.com</b></h5>
				</div>
                <div class="header">
                	<div style="display:inline-block;float:left;width:90px;height:100px;">
                		<img src="style/image/Logo.png" style="width:100%;height:100%"/>
                	</div>
                	<div style="display:inline-block">
						<h1 style="text-align:left"><b>Assessor User Panel</b></h1>
                        <h3 style="color:#34495E;font-weight:bolder" id="mychangeheader">KYA Detail</h3>
                    </div>
				</div>
			<div class='addkyc'>
			    <!-- <form method='POST' action='addKYC.php'  enctype="multipart/form-data" onsubmit="return checkVoterId()"/> -->
				<form method='POST' action='addKYC.php'  enctype="multipart/form-data"/>
				<table class="kyctable">
					<tr>
						<td><label>Assessor Name</label></td>
						<td colspan="2">
							<input type='text'
							class="form-control"
							name='accessor_name'  
							required 
							style='width:100%' 
							
							title="Name must be greater than 2 character & Name must be in lower case & Name should not contain any numeric value and special character." />
						</td>
					</tr>
					<tr>
						<td><label>Father Name</label></td>
						<td colspan="2">
							<input type='text' 
							class="form-control"
							name='father_name' 
							required 
							style='width:100%'
							
							title="Father Name must be greater than 2 character & Father Name must be in lower case & Father Name should not contain any numeric value and special character."/>
						</td>
					</tr>
					<tr>
						<td><label>Mother Name</label></td>
						<td colspan="2">
							<input type='text' 
							class="form-control"
							name='mother_name' 
							required 
							style='width:100%'
							pattern="^[A-Za-z][A-Za-z\s]{3,49}" 
							title="Mother Name must be greater than 2 character & Mother Name must be in lower case & Mother Name should not contain any numeric value and special character."/>
						</td>
					</tr>
					<tr>
						<td><label>Date of birth</label></td>
						<td colspan="2"><input type='date' name='dob' required class="form-control"/></td>
					</tr>
					<tr>
						<td><label>Contact</label></td>
						<td colspan="2"><input type='text' name='contact' required class="form-control" pattern="^[0-9]+" minlength="6"/></td>
					</tr>
					<tr>
						<td><label>Gender</label></td>
						<td><input type='radio' name='gender' reuired value='Male'/>&nbsp;Male</td>
						<td><input type='radio' name='gender' reuired value='Female' checked="checked" />&nbsp;Female</td>
					</tr>
					<tr>
						<td><label>Relation with organization</label></td>
						<td><input type='radio' name='rwo' reuired value='yes'/>&nbsp;Yes</td>
						<td><input type='radio' name='rwo' reuired value='no' checked="checked" />&nbsp;No</td>
					</tr>
					<tr id='organization_name'>
						<td><label>Name</label></td>
						<td colspan="2"><input type='text' name='organization_name' style='width:100%' class="form-control"/></td>
					</tr>
					<tr id='organization_relationship'>
						<td><label>Relationship</label></td>
						<td colspan="2"><input type='text' name='organization_relationship' style='width:100%' class="form-control"/></td>
					</tr>
					<?php
					/*
					    if($_SESSION['usertype']!="coordinator")
					    {
					        $result = $object->getCoordinatorAdhar();
    					    echo "<tr>";
    					    echo "<td>";
    					    echo "<label>Coordinator</label>";
    					    echo "</td>";
    					    echo "<td>";
    					    echo "<select name='coordinator_id'>";
    					    while($row=mysqli_fetch_assoc($result))
    					    {
    					        echo "<option value=\"".$row['adhar']."\">".$row['user_name']."</option>";
    					    }
    					    echo "</select>";
    					    echo "</td>";
    					    echo "</tr>";
					    }
					    */
					?>
					<tr>
    				    <td>
    				        <input type="hidden" name="coordinator_id" value="0" />
    				    </td>
					</tr>
					<tr>
						<td><label>Present Address</label></td>
						<td colspan="2">
							<input type='text' 
							name='present_address'  
							style='width:100%'
							title='Address must not contain any special character & address must be atleast 10 character long'
							class="form-control"
							required
							/>
						</td>
					</tr>
					<tr>
						<td><label>Permanent Address</label></td>
						<td colspan="2">
							<input type='text' 
							name='permanent_address' 
							style='width:100%'
							class="form-control"
							title='Permanent Address must not contain any special character & address must be atleast 10 character long'
							required 
							/></td>
					</tr>
					<tr>
						<td><label>Voter ID /DL Number (Optional)</label></td>
						<td><input type='text' name='voterid_number' pattern="[A-Za-z0-9]{5,20}" class="form-control"/></td>
						<td><input type='file' name='voterid_url' class='voterid_url form-control' id='voterid_url' class="form-control"/></td>
					</tr>
					<tr>
						<td colspan="3"><small><b>File must be in jpeg format and less than 200kb</b></small></td>
					</tr>
					<tr id='voterid_error' style='display: none'>
						<td colspan="3"><label class="error">Photo size must be less than 200kb and in jpeg format</label></td>
					</tr>
					<tr>
						<td><label>Aadhar Number</label></td>
						<td><input type='text' class="form-control" name='adhar_number' required disabled='true' value='<?php echo $adhar ?>'/></td>
						<td><input type='file' name='adhar_url' class='adhar_url form-control' id='adhar_url' required /><br></td>
					</tr>
					<tr>
						<td colspan="3"><small><b>File must be in jpeg format and less than 200kb</b></small></td>
					</tr>
					<tr class='adhar_error' style='display: none'>
						<td colspan="3" class="error"><label>Photo size must be less than 200kb and in jpeg format</label></td>
					</tr>
					<tr>
						<td><label>Pan Number</label></td>
						<td><input type='text' class="form-control" name='pan_number' required pattern="[A-Za-z0-9]{5,20}"/></td>
						<td><input type='file' name='pan_url' class='pan_url form-control' id='pan_url' required /></td>
					</tr>
					<tr>
						<td colspan="3"><small><b>File must be in jpeg format and less than 200kb</b></small></td>
					</tr>
					<tr class='pan_error' style='display: none'>
						<td colspan="3" class="error"><label>Photo size must be less than 200kb and in jpeg format</label></td>
					</tr>
					<tr>
						<td><label>Photo</label></td>
						<td colspan="2"><input type='file' name='pic_url' required class='pic_url form-control' id='pic_url' /></td>
					</tr>
					<tr>
						<td colspan="3"><small><b>File must be in jpeg format and less than 200kb</b></small></td>
					</tr>
					<tr class='pic_error' style='display: none'>
						<td colspan="3" class="error"><label>Photo size must be less than 200kb and in jpeg format</label></td>
					</tr>
					<tr>
						<td><label>Account Number</label></td>
						<td colspan="2">
							<input type='text' 
							class="form-control" 
							name='account_number' 
							pattern="[A-Za-z0-9]{5,20}"
							required style='width:100%'/></td>
					</tr>
					<tr>
						<td><label>Bank Name</label></td>
						<td colspan="2">
							<input type='text' 
							class="form-control" 
							name='bank_name' 
							required 	
							title="Bank name must be in lower case and doesnot contain any special character"
							style='width:100%'/>
						</td>
					</tr>
					<tr>
						<td><label>Branch Name</label></td>
						<td colspan="2">
							<input type='text' 
							class="form-control" 
							name='branch_name' 
							title="Branch name must be in lower case and doesnot contain any special character"
							required style='width:100%'/>
						</td>
					</tr>
					<tr>
						<td><label>IFSC Code</label></td>
						<td colspan="2">
							<input type='text' 
							class="form-control" 
							name='ifc_code' 
							required 
							pattern="^[A-Z0-9]{1,11}"
							title="Please enter a valid IFSC Code"
							style='width:100%'/></td>
					</tr>
					<tr>
						<td><p></p></td>
					</tr>
					<tr>
						<td style="color:#196f3d"><input type='checkbox'  name='confirmation' required />&nbsp;I Agree</td>
					</tr>
					<tr>
						<td colspan="3">
							<p style="color:#ba4a00"><b>Declaration:</b> I hereby declare that the information provided by me above is true and correct to the best of my knowledge and belief. I also confirm that, in the event of any information provided by me is found incorrect / is incomplete and also in the event of any violation of Government Regulation related to the Assessment process, Centurion University will be within its right to stepped down from assessor/coordinator and levy of penal charges as per the policy and guidelines and may initiate legal action applicable under provisions.</p>
						</td>
					</tr>
					<tr>
						<td><input type='submit' value='Submit' class='submit btn btn-primary' name='addkyc' /></td>
						<td><a class="nav-link" href="logout.php">Log out</a></td>
					</tr>
				</table>
			</form>
			</div>	
			<!-- Wrapper Div -->
			<div class="accessorWrapper">
				<?php
					$object = new accessorOperations();
					$dataarray = array();
					$dataarray = $object->SelectKYC($adhar);
				?>
                                
				  <!-- Nav pills -->
				  <div class="mynav">
				  <ul class="nav nav-pills" role="tablist">
				    <li class="nav-item">
				      <a class="nav-link active" data-toggle="pill" href="#home" onclick="setHeader('KYA DETAIL')">Home</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="pill" href="#menu1" id="requestlink" onclick="setHeader('Request To Update')">Request To Update</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link claimContainerLink" data-toggle="pill" href="#menu2" onclick="setHeader('Claim')" id="claimsavelink" >Claim</a>
				    </li>
				     <li class="nav-item">
				      <a class="nav-link" data-toggle="pill" href="#menu3" id="claimdetaillink" onclick="setHeader('Claim Details')">Claim Details</a>
				    </li>
				    <li class="nav-item">
				    	<a class="nav-link" href="logout.php">Log out</a>
				    </li>
				  </ul>
				  </div>

				  <!-- Tab panes -->
				  <div class="tab-content subwrapper">
				    <div id="home" class="container tab-pane active"><br>
				    
				      <!-- <h2 style="text-align:left;color:#34495e;font-weight:bolder">KYA Detail</h2> -->
				    
				      <div class="kycdetaildiv">
		      			<table class="kycdetailtable" cellspacing="10">
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Assessor Name</label></td>
							<td>
								<label><?php echo $dataarray[0]; ?></label>
							</td>
							<td rowspan="4"><img src="<?php echo $dataarray[14]; ?>" style='height:150px;width:180px'/></td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Father Name</label></td>
							<td>
								<label><?php echo $dataarray[1]; ?></label>
							</td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Mother Name</label></td>
							<td>
								<label><?php echo $dataarray[2]; ?></label>
							</td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Date of birth</label></td>
							<td>
								<label><?php echo $dataarray[3]; ?></label>
							</td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Gender</label></td>
							<td colspan="2">
								<label><?php echo $dataarray[20]; ?></label>
							</td>
						</tr>
						<tr>
							<?php if($dataarray[4]!=null || $dataarray[4]!=""){ ?>
							<td style="color:yellow" ><label style="font-weight:bolder">Organization Name</label></td>
							<td colspan="2">
								<label><?php echo $dataarray[4]; ?></label>
							</td>
							<?php } ?>
						</tr>
						<tr>
							<?php if($dataarray[5]!=null || $dataarray[5]!=""){ ?>
							<td style="color:yellow" ><label style="font-weight:bolder">Relationship</label></td>
							<td colspan="2">
								<label><?php echo $dataarray[5]; ?></label>
							</td>
							<?php } ?>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Present Address</label></td>
							<td colspan="2">
								<p><?php echo $dataarray[6]; ?></p>
							</td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Permanent Address</label></td>
							<td colspan="2">
								<p><?php echo $dataarray[7]; ?></p>
							</td>
						</tr>
						<tr>
							<?php if($dataarray[9]!=null || $dataarray[9]!=""){ ?>
							<td style="color:yellow" ><label style="font-weight:bolder">Voter ID Number</label></td>
							<td colspan="2"><label><?php echo $dataarray[9]; ?></label></td>
							<?php } ?>
						</tr>
						<tr>
							<td style="color:#D5F5E3" ><label style="font-weight:bolder">Aadhar Number</label></td>
							<td style="color:#D5F5E3" colspan="2"><label><?php echo $dataarray[8]; ?></label></td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Pan Number</label></td>
							<td colspan="2"><label><?php echo $dataarray[10]; ?></label></td>
						</tr>
						<tr>
							<td>
								<?php if($dataarray[11]!=null || $dataarray[11]!=""){ ?>
								<img src="<?php echo $dataarray[11]; ?>" style='height:150px;width:180px'/>
								<?php } ?>
							</td>
							<td>
								<img src="<?php echo $dataarray[12]; ?>" style='height:150px;width:180px'/>
							</td>
							<td>
								<img src="<?php echo $dataarray[13]; ?>" style='height:150px;width:180px'/>
							</td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Account Number</label></td>
							<td colspan="2"><?php echo $dataarray[15]; ?><label></label></td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Bank Name</label></td>
							<td colspan="2"><?php echo $dataarray[16]; ?><label></label></td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">Branch Name</label></td>
							<td colspan="2"><label><?php echo $dataarray[17]; ?></label></td>
						</tr>
						<tr>
							<td style="color:yellow" ><label style="font-weight:bolder">IFSC Code</label></td>
							<td colspan="2"><label><?php echo $dataarray[18]; ?></label></td>
						</tr>
					</table>
					<a href='reports/kyc.php' class="btn btn-warning print">Print</a>
			      	  	</div>
				    </div>
				   
				    <div id="menu1" class="container tab-pane fade"><br>
				    	<div class="request_box">
				      		<h3 style="font-weight:bold;color:white">Drop your Request Message</h3> 
				      		<form method="post" action="insertrequest.php">
				      		<table class="requestform">
					      	<tr>
				      			<td><b>Fields</b></td>
				      			<td>
				      				<select name="username" class="form-control"/>
				      					<option>User Name</option>
				      					<option>Father Name</option>
				      					<option>Mother Name</option>
				      					<option>Date Of Birth</option>
				      					<option>Organization Name</option>
				      					<option>Organization Relationship</option>
				      					<option>Present Address</option>
				      					<option>Permanent Address</option>
				      					<option>Voter ID Number</option>
				      					<option>Aadhar Number</option>
					      				<option>Pan Number</option>
					      				<option>Account Number</option>
					      				<option>Bank Name</option>
				      					<option>Branch Name</option>
					      				<option>IFSC Code</option>
					      				<option>Other</option>
				      				</select>
				      			</td>
				      		</tr>
				      		<tr>
				      			<td><b>Details</b></td>
				      			<td><textarea name="details" class="form-control" required ></textarea></td>
					      	</tr>
				      		<tr>
				      			<td colspan="2"><input type="submit" Value="Send" class="btn btn-success" style="font-weight:bolder" /></td>
					      	</tr>
				      		<tr>
				      			<td style="font-weight:bold;color:green" colspan="2">
				      				<?php
				      					if(isset($_GET["requestmessage"]))
					      				{
				      						echo $_GET["requestmessage"];
				      					}
					      			?>
					      		</td>
				      		</tr>
					      	</table>
                                       		</form>
                                       	</div>
                                       <!--- Working -->
                                       <div style="" class="repliesdiv">
                                       		<h5 style="text-align:left;color:white">&nbsp;&nbsp;&nbsp;<b>Replies</b></h5>
                                       		<table class="repliestable">
                                       		<tr>
                                       			<td>SL.NO</td>
                                       			<td>Message</td>
                                       		</tr>
                                       		<?php                          
                                       			$result = $object->GetUserReply($adhar);
                                       			$count = 1;
                                       			while($row = mysqli_fetch_assoc($result))
                                       			{
                                       				echo "<tr><td>".$count."</td><td>".$row["reply"]."</td></tr>";
                                       				$count = $count + 1;
                                       			}
                                       		?>
                                 		</table>
                                       		
                                       </div>
				    </div>

				    <!-- ------------------------------ Claim Form ------------------------------ -->

				    <div id="menu2" class="tab-pane fade claimContainerForm" style="width:80%"><br>
				      <div>
				      	<form method="POST" action="addClaim.php" enctype="multipart/form-data">
							<table class="claimform">
								<tr>
									<td colspan="7">
										<center>
											<h4>Centurion University Of Technology & Management</h4>
											<p><b>School Of Vocational Education & Training</b></br>
											<b>Assessment / Coordination Fees Claim Form</b><p>
										</center>
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
										<input type="date" name="date"  class="form form-control"/>
									</td>
									<td>For the month of</td>
									<td>
										<select name="forMonthOf" class="form form-control" id="forMonthOf" onchange="checkDate()">
											<option>-- SELECT --</option>
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
										<input type="text" name="baseLocation" style="width:100%"  class="form form-control"/>
									</td>
								</tr>
								<tr>
									<td colspan="2">Project claim under</td>
									<td colspan="2">
										<input type="text" name="projectClaimUnder" style="width:100%"  class="form form-control"/>
									</td>
									<td>Destination Location</td>
									<td colspan="2">
										<input type="text" name="destinationLocation" style="width:100%"  class="form form-control"/>
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
										readonly="true" class="form form-control"
										/>
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
								<tr>
								<tr>
									<td>Batch Number</td>
									<td>Sector</td>
									<td>Trade</td>
									<td>Date Of Assessment</td>
									<td>Number Of Candidate</td>
									<td>Amount</td>
									<td>Add</td>
								</tr>
								<tr>
									<td>
										<input type="text"		name="batch"				class="form-control" />
									</td>
									<td>
										<input type="text"		name="sector"				class="form-control" />
									</td>
									<td>
										<input type="text"		name="trade" 				class="form-control" />
									</td>
									<td>
										<input type="date"		name="date_of_assessment" 	class="form-control" />
									</td>
									<td>
										<input type="text"		name="number_of_candidate"  class="form-control" />
									</td>
									<td>
										<input type="text"		name="amount" 				class="form-control" />
									</td>
									<td><input type="submit"	name="add" 		class="btn btn-primary"		value="Add Batch"/></td>
								</tr>
								<?php
									$result = $object->selectClaimBatch($adhar);
									while($row = mysqli_fetch_assoc($result))
									{
								?>
								<tr>
									<td>
										<input type="hidden" 
										value="<?php echo $row['ID']; ?>" 
										id="<?php echo $row['ID']; ?>ID" />
									</td>
									<td>
										<input type="text" 
										value="<?php echo $row['batchNo']; ?>"		
										class="form-control"
										id="<?php echo $row['ID']; ?>batch"/>
									</td>
									<td>
										<input type="text" 
										value="<?php echo $row['sector']; ?>" 		
										class="form-control"
										id="<?php echo $row['ID']; ?>sector"/>
									</td>
									<td>
										<input type="text" 
										value="<?php echo $row['trade']; ?>" 		
										class="form-control"
										id="<?php echo $row['ID']; ?>trade"/>
									</td>
									<td>
										<input type="text" 
										value="<?php echo $row['doa']; ?>"			
										class="form-control"
										id="<?php echo $row['ID']; ?>date"/>
									</td>
									<td>
										<input type="text" 
										value="<?php echo $row['candidates']; ?>" 	
										class="form-control"
										id="<?php echo $row['ID']; ?>candidate"/>
									</td>
									<td>
										<input type="text" 
										value="<?php echo $row['amountClaim']; ?>"	
										class="form-control"
										id="<?php echo $row['ID']; ?>amount"/>
									</td>
									<td><a href="#">Upload Files</a></td>
								</tr>
								<tr>
									<td colspan="7">
										<input type="button" name="" value="Update" id="<?php echo $row['ID'] ?>" onclick="updateClaim(this.id);"/>
										<a href="#">Delete</a>
									</td>
								</tr>
								<?php
									}
								?>
								<td colspan="7">
									<p style="color:#C0392B">
										Further to my above claim, I hereby authorize the paying/disbursing authority to deduct/reduce my claim as per the Management fixation of Cap/Maximum limit from time to time.
										The above information furnished by me is true to my knowledge & the documents attached are in order.
										If any deviation found at later stage during audit, I will be held responsible
									</p>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="checkbox" 
									name="agree" 
									title="Please accept the terms and conditions">&nbsp;I Agree
								</td>
								<td colspan="5">&nbsp;&nbsp;<input type="submit" value="Save" name="saveClaim" class="btn btn-success" id="claimsubmit" style="font-weight:bold"/></td>
							</tr>
						</table>
					</form>				      	
	      		</div>
	    	</div>

	    	<!-- --------------------------- Claim Form End --------------------------- -->

				    <div id="menu3" class="container tab-pane fade"><br>
				      <!-- <h3 style="text-align:left;color:#d35400;font-weight:bold">Claim Details</h3> -->
				      <div>
					<table class="table table-striped claimdetailtable">
                                                <tr>
                                                <td><b>Claim ID</b></td>
                                                <td><b>Name</b></td>
                                                <td><b>Aadhar</b></td>
                                                <td><b>Date</b></td>
                                                <td><b>Status</b></td>
                                                <td><b>Print</b></td>
                                                <td><b>File</b></td>
                                                </tr>
						<?php
							$object = new accessorOperations();
							$claimresult = $object->SelectClaim($adhar);
							while($row=mysqli_fetch_array($claimresult))
							{
								echo "<tr>";
								echo "<td>$row[0]</td>";
								echo "<td>$row[8]</td>";
								echo "<td>$row[9]</td>";
								echo "<td>$row[2]</td>";
								if($row[20]==0)
									echo "<td style='color:red'>Pending</td>";
								else
									echo "<td style='color:green'>Approved</td>";
				
								echo "<td><a href='reports/claim.php?claimID=$row[0]' class='btn'>Print</a></td>";
								echo "<td><a href='reports/files.php?claimID=$row[0]' class='btn'>File</a></td>";
								echo "</tr>";		
							}
						?>
					</table>
				      </div>
				    
				    </div>
				  </div>
				</div>
                         <div class="footer">
                                   <!-- <h5><b>Developer Satya Prakash Nandy</b></h5> -->
                                   <h5><b>&copy;&nbsp;CUTM</b></h5>
                         </div>
			</div>
                        
		</center>
		<?php
			if(isset($_GET["navigate"]))
			{
				if($_GET["navigate"]=="request")
				{
					echo "<script>document.getElementById('requestlink').click();</script>";
				}
				if($_GET["navigate"]=="claimsave")
				{
					echo "<script>document.getElementById('claimsavelink').click();</script>";
				}
				if($_GET["navigate"]=="claimdetail")
				{
					echo "<script>document.getElementById('claimdetaillink').click();</script>";
				}
			}
		?>
	</body>
</html>