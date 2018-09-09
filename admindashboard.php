<?php
	session_start();
	if(isset($_GET["logout"])=="yes")
	{
		session_destroy();
		header("Location:adminlogin.php");
	}
	if(!isset($_SESSION['adminid']))
	{
		header("Location:adminlogin.php");
	}
?>
<html>
	<head>
		<title>Welcome Admin</title>
		<link rel="stylesheet" href="lib/bootstrap.min.css">
		<link rel="stylesheet" href="style/admindashboard.css">
		<script src="lib/jquery.min.js"></script>
		<script src="lib/popper.min.js"></script>
		<script src="lib/bootstrap.min.js"></script>
		<script src="javascript/UpdateValidation.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		<script src="javascript/admindashboard.js"></script>
	</head>
	<body>
		<center>
			<div class="wrapper" ng-app="assessor" ng-controller="mycontroller">
				<div class="header">
					<h2><b>Assessor Admin Panel</b></h2>
				</div>
				<div class="body">
					<div class="navbar">
						<ul class="nav nav-pills">
						  <li class="nav-item">
						    <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu1" ng-click="getApprove();">Pending Claims</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu2" ng-click="getDeapprove();">Approved Claims</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu8" ng-click="getRedeem();">Redeem Claims</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu3" ng-click="getAllRequest();" >Request</a>
						  </li>
						  <?php if($_SESSION['adminrole']!=0){ ?>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu4" id="editkyc">Edit KYA</a>
						  </li>
						  <?php } ?>
						  <?php if($_SESSION['adminrole']!=0){ ?>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu5" id="tracker">Tracker</a>
						  </li>
						  <?php } ?>
						  <?php if($_SESSION['adminrole']!=0){ ?>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu6" id="block">Block User</a>
						  </li>
						  <?php } ?>
                                                  <?php if($_SESSION['adminrole']!=0){ ?>
						  <li class="nav-item">
						    <a class="nav-link" data-toggle="pill" href="#menu7" id="block" ng-click="getAllClaim();">Delete Claim</a>
						  </li>
						  <?php } ?>
						  <li class="nav-item">
						    <a class="nav-link" href="admindashboard.php?logout=yes">Logout</a>
						  </li>
						</ul>
					</div>
					<div class="content">
						<div class="tab-content">
						  <div class="tab-pane active container" id="home">
						  		<h4 class="welcome">Welcome To Assessor Admin Panel</h4>
						  		<br>
						  		<br>
						  		<div style="float:left">
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="search" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;" />
						  				</td>
						  				<td>
						  					<a href='../reports/kya_user_report.php'><input type="button" class="btn btn-success" value="All Record" /></a>
						  				</td>
						  			</tr>
					  			</table>
						  		</div>
						  		<table class="table table-striped" style="font-weight:bolder">
						  			<tr>
						  				<td style="color:#2471A3">Slno.</td>
						  				<td style="color:#2471A3">Adhar ID</td>
							  			<td style="color:#2471A3">Name</td>
							  			<td style="color:#2471A3">Contact</td>
							  			<td style="color:#2471A3">Email</td>
						  			</tr>
						  			<tr ng-repeat="element in alluser | filter:search">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.user_name}}</td>
						  				<td>{{element.contact}}</td>
						  				<td>{{element.email}}</td>
						  			</tr>
						  		</table>
						  </div>
						  <div class="tab-pane container" id="menu1">
						  	<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="adhar" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;" />
						  				</td>						  				
						  			</tr>
					  			</table>
						  	</div>
						  	<div>
						  		<table class="table table-striped">
						  			<tr style="font-weight: bolder;color: #1f618d">
						  				<td>Index</td>
						  				<td>Claim ID</td>
						  				<td>Aadhar</td>
						  				<td>Username</td>
						  				<td>Date</td>
						  				<td style="color: #8e44ad">Print</td>
						  				<td style="color: #8e44ad">File</td>
						  				<td style="color: #229954">Approve</td>
						  				<td style="color: #229954">Redeem</td>
					  				</tr>
						  			<tr ng-repeat="element in claimpending | filter:adhar" style="font-weight: bold">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.claimID}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.userName}}</td>
						  				<td>{{element.date}}</td>
						  				<td>
						  					<a ng-href="reports/claim.php?claimID={{element.claimID}}" class="btn">Print</a>
						  				</td>
						  				<td>
						  					<a ng-href="reports/files.php?claimID={{element.claimID}}" class="btn">File</a>
						  				</td>
						  				<td>
						  					<input type="button" value="Approve" ng-click="approvedClaim(element.claimID);" class="btn btn-success"/>
						  				</td>
						  				<td>
						  					<input type="button" value="Redeem" ng-click="reedemClaim(element.claimID);" class="btn btn-primary" ng-if="element.status!=2"/>
						  				</td>
					  				</tr>
					  			</table>
					  		</div>
						  </div>
						  <div class="tab-pane container" id="menu2">
						  	<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="deadhar"
						  					class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"/>
						  				</td>
						  			</tr>
					  			</table>
						  	</div>
						  	<div>
						  		<table class="table table-striped">
						  			<tr style="font-weight: bolder;color: #1f618d">
						  				<td>Index</td>
						  				<td>Claim ID</td>
						  				<td>Aadhar</td>
						  				<td>Username</td>
						  				<td>Date</td>
						  				<td style="color: #8e44ad">Print</td>
						  				<td style="color: #8e44ad">File</td>
						  				<td style="color: #229954">Approve</td>
					  				</tr>
						  			<tr ng-repeat="element in claimapproved | filter:deadhar" style="font-weight: bold">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.claimID}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.userName}}</td>
						  				<td>{{element.date}}</td>
						  				<td>
						  					<a ng-href="reports/claim.php?claimID={{element.claimID}}" class="btn">Print</a>
						  				</td>
						  				<td>
						  					<a ng-href="reports/files.php?claimID={{element.claimID}}" class="btn">File</a>						  
						  				</td>
						  				<td>
						  					<input type="button" value="Disapprove" ng-click="deapprovedClaim(element.claimID);" class="btn btn-danger" />
						  				</td>
					  				</tr>
					  			</table>
					  		</div>
						  </div>
						  <!----------------- Reedem Claims --------------------------------->
						  <div class="tab-pane container" id="menu8">
						  	<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="deadhar"
						  					class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"/>
						  				</td>
						  			</tr>
					  			</table>
						  	</div>
						  	<div>
						  		<table class="table table-striped">
						  			<tr style="font-weight: bolder;color: #1f618d">
						  				<td>Index</td>
						  				<td>Claim ID</td>
						  				<td>Aadhar</td>
						  				<td>Username</td>
						  				<td>Date</td>
						  				<td style="color: #8e44ad">Print</td>
						  				<td style="color: #8e44ad">File</td>
						  				<td style="color: #229954">Approve</td>
					  				</tr>
						  			<tr ng-repeat="element in claimredeem | filter:deadhar" style="font-weight: bold">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.claimID}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.userName}}</td>
						  				<td>{{element.date}}</td>
						  				<td>
						  					<a ng-href="reports/claim.php?claimID={{element.claimID}}" class="btn">Print</a>
						  				</td>
						  				<td>
						  					<a ng-href="reports/files.php?claimID={{element.claimID}}" class="btn">File</a>		  
						  				</td>
						  				<td>
						  					<input type="button" value="Approve" ng-click="approvedClaim(element.claimID);" class="btn btn-success"/>
						  				</td>
					  				</tr>
					  			</table>
					  		</div>
						  </div>
						  <!----------------------------------------------------------------->
						  <div class="tab-pane container" id="menu3">
						  	<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="cadhar" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"/>
						  				</td>
						  			</tr>
					  			</table>
						  	</div>
						  	<div>
						  		<table class="table table-striped">
						  			<tr style="font-weight: bolder;color: #1f618d">
						  				<td>Index</td>
						  				<td>Aadhar</td>
						  				<td>Fields</td>
						  				<td>Detail</td>
						  				<td>Date</td>
						  				<td>Reply</td>
					  				</tr>
						  			<tr ng-repeat="element in request | filter:cadhar">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.name}}</td>
						  				<td style="max-width: 100px">{{element.detail}}</td>
						  				<td>{{element.date}}</td>
						  				<!--- Working on reply back -->
						  				
						  				<td ng-show="element.reply_status!=1">
						  					<input type="text" name="reply" class="form-control" id="reply_{{element.adhar}}" /><br>
						  					<input type="button" value="Reply" ng-click="sendReply(element.adhar,element.requestID)" class="btn btn-success" />
						  				</td>
						  				<td ng-show="element.reply_status==1" style="color:green">
						  					<b>Replied !</b>
						  				</td>
						  				<!--- -->
					  				</tr>
					  			</table>
					  		</div>
						  </div>
						  <div class="tab-pane container" id="menu4">
				  			<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Aadhar ID</b></td>
						  				<td>
						  					<input type="text" ng-model="adharid" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"
						  					class="form-control"/>
						  				</td>
						  				<td>
						  					<input type="button" value="Get" class="btn btn-primary" ng-click="getKYC(adharid)" class="form-control"/>
					  					</td>
					  					<td style="font-weight: bolder;color:green">
					  						<?php
					  							if(isset($_GET["message"]))
					  							{
					  								echo $_GET["message"];
					  							}
					  						?>
				  						</td>
						  			</tr>
					  			</table>
						  	</div>
						  	<div>
						  		<form method="POST" action="updatekyc.php" enctype="multipart/form-data">
						  		<table class="table">
						  		<tr>
									<td><label><b>Accessor Name</b></label></td>
									<td>
										<input type="text" ng-value="kyc.user_name" name="user_name" class="form-control"/>
									</td>
									<td rowspan="8" style="text-align:center">
										<img ng-src="{{kyc.pic_url}}" style='height:150px;width:180px'/><br><br>
										<input type="button" class="btn btn-danger" ng-click="DeleteImage(kyc.adhar,'pic_url',kyc.pic_url)" value="DELETE" />
									</td>
								</tr>
								<tr>
									<td><label><b>Father Name</b></label></td>
									<td>
										<input type="text" ng-value="kyc.user_father_name" name="user_father_name" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td><label><b>Mother Name</b></label></td>
									<td>
										<input type="text" ng-value="kyc.user_mother_name" name="user_mother_name" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td><label><b>Date of birth</b></label></td>
									<td>
										<input type="date" ng-value="kyc.dob" name="dob" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td><label><b>Organization Name</b></label></td>
									<td colspan="2">
										<input type="text" ng-value="kyc.organization_name" name="organization_name" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td><label><b>Organization Relationship</b></label></td>
									<td colspan="2">
										<input type="text" ng-value="kyc.organization_relationship" name="organization_relationship" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td><label><b>Present Address</b></label></td>
									<td colspan="2">
										<input type="text" ng-value="kyc.present_address" name="present_address" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td><label><b>Permanent Address</b></label></td>
									<td colspan="2">
										<input type="text" ng-value="kyc.permanent_address" name="permanent_address" class="form-control" />
									</td>
								</tr>
								<tr>
									<td><label><b>Voter ID / DL Number</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.voterid" name="voterid" class="form-control"/></td>
								</tr>
								<tr>
									<td><label><b>Aadhar Number</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.adhar" name="adhar" class="form-control" readonly="true"/></td>
								</tr>
								<tr>
									<td><label><b>Pan Number</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.pan" name="pan" class="form-control"/></td>
								</tr>
								<tr>
									<td style="text-align:center">
										<img ng-src="{{kyc.voterid_url}}" style='height:150px;width:180px'/><br><br>
										<input type="button" class="btn btn-danger" ng-click="DeleteImage(kyc.adhar,'voter_url',kyc.voterid_url)" value="DELETE" />
									</td>
									<td style="text-align:center">
										<img ng-src="{{kyc.adhar_url}}" style='height:150px;width:180px'/><br><br>
										<input type="button" class="btn btn-danger" ng-click="DeleteImage(kyc.adhar,'adhar_url',kyc.adhar_url)" value="DELETE" />
									</td>
									<td style="text-align:center">
										<img ng-src="{{kyc.pan_url}}" style='height:150px;width:180px'/><br><br>
										<input type="button" class="btn btn-danger" ng-click="DeleteImage(kyc.adhar,'pan_url',kyc.pan_url)" value="DELETE" />
									</td>
								</tr>
								<tr>
									<td><label><b>Account Number</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.account_number" name="account_number" class="form-control"/></td>
								</tr>
								<tr>
									<td><label><b>Bank Name</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.bank_name" name="bank_name" class="form-control"/></td>
								</tr>
								<tr>
									<td><label><b>Branch Name</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.branch_name" name="branch_name" class="form-control" /></td>
								</tr>
								<tr>
									<td><label><b>IFSC Code</b></label></td>
									<td colspan="2"><input type="text" ng-value="kyc.ifc_code" name="ifc_code" class="form-control"/></td>
								</tr>
								<tr>
									<td><b>Contact</b></td>
									<td colspan="2"><input type="text" ng-value="kyc.contact" name="contact" class="form-control"/></td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td colspan="2"><input type="text" ng-value="kyc.email" name="email" class="form-control"/></td>
								</tr>
								<tr>
									<td><label><b>Photo</b></label></td>
									<td colspan="2"><input type='file' name='pic_url' class='pic_url' id='pic_url' /></td>
								</tr>
								<tr class='pic_error' style='display: none'>
									<td colspan="3"style="font-weight:bold;color:red"><label>Photo size must be less than 200kb and in jpeg format</label></td>
								</tr>
								<tr>
									<td><b>Aadhar ID</b></td>
									<td colspan="2"><input type='file' name='adhar_url' class='adhar_url' id='adhar_url' /></td>
								</tr>
								<tr class='adhar_error' style='display: none'>
									<td colspan="3" style="font-weight:bold;color:red"><label>Photo size must be less than 200kb and in jpeg format</label></td>
								</tr>
								<tr>
									<td><b>Voter ID</b></td>
									<td colspan="2"><input type='file' name='voterid_url' class='voterid_url' id='voterid_url' /></td>
								</tr>
								<tr class='voterid_error' style='display: none'>
									<td colspan="3" style="font-weight:bold;color:red"><label>Photo size must be less than 200kb and in jpeg format</label></td>
								</tr>
								<tr>
									<td><b>Pan</b></td>
									<td colspan="2"><input type='file' name='pan_url' class='pan_url' id='pan_url' /></td>
								</tr>
								<tr class='pan_error' style='display: none'>
									<td colspan="3" style="font-weight:bold;color:red"><label>Photo size must be less than 200kb and in jpeg format</label></td>
								</tr>
								<tr>
									<td colspan="3"><input type='submit' value='Submit' class='submit btn btn-primary' name="addkyc" /></td>
								</tr>
					  			</table>
					  			</form>
					  		</div>
						  </div>
						  <div class="tab-pane container" id="menu5">
				  			<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Aadhar ID</b></td>
						  				<td>
						  					<input type="text" ng-model="adharidTrack" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"
						  					class="form-control"/>
						  				</td>
						  				
						  				<td><b>Month</b></td>
						  				<td>
						  					<input type="date" ng-model="adharidMonth" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"
						  					class="form-control"/>
						  				</td>
						  				<td>
						  					<input type="button" value="Get" class="btn btn-primary" ng-click="getClaimTracker(adharidTrack,adharidMonth)" class="form-control"/>
					  					</td>
						  			</tr>
					  			</table>
						  	</div>
						  	<div>
						  		<table class="table table-striped">
						  			<tr style="font-weight: bolder;color: #1f618d">
						  				<td>Index</td>
						  				<td>Claim ID</td>
						  				<td>Aadhar</td>
						  				<td>Username</td>
						  				<td>Date</td>
						  				<td>Status</td>
						  				<td style="color: #8e44ad">Print</td>
						  				<td style="color: #8e44ad">File</td>
					  				</tr>
						  			<tr ng-repeat="element in claimTrcaker" style="font-weight: bold">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.claimID}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.userName}}</td>
						  				<td>{{element.date}}</td>
						  				<td ng-if="element.status!=0" style="color:green">
						  					Approved
						  				</td>
						  				<td ng-if="element.status==0" style="color:red">
						  					Not Approved
						  				</td>
						  				<td>
						  					<a ng-href="reports/claim.php?claimID={{element.claimID}}" class="btn">Print
						  					</a>
						  				</td>
						  				<td>
						  					<a ng-href="{{element.imageUrl}}" class="btn">File
						  					</a>
						  				</td>
					  				</tr>
					  				<tr>
					  					<td colspan="2">Total Amount</td>
					  					<td>{{noamount}}</td>
					  					<td>Total Candidates</td>
					  					<td>{{nocandidates}}</td>
					  					<td>Total Claim</td>
					  					<td>{{totalclaim}}</td>
					  				</tr>
					  			</table>
						  	</div>
						  </div>
						  <div class="tab-pane container" id="menu6">
						  	<div>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="blockadhar" class="form-control" 
						  					style="background-color: #34495e;color: #fdfefe;font-weight: bold;"/>
						  				</td>
						  				<td>
						  					<input type="button" value="Block" class="btn btn-danger" ng-click="block(blockadhar)"/>
						  				</td>
						  				<td>
						  					<input type="button" value="Un-Block" class="btn btn-success" ng-click="unblock(blockadhar)"/>
						  				</td>
						  				<td style="color:#d35400;font-weight:bolder">
						  					{{messageblockUnblock}}
						  				</td>
						  			</tr>
					  			</table>
						  	</div>
						  </div>
						  <div class="tab-pane container" id="menu7">
						  	<div>
						  		<h4 style="color:red"><b>Delete A Claim</b></h4>
						  		<table class="searchControl">
						  			<tr>
						  				<td><b>Search</b></td>
						  				<td>
						  					<input type="text" ng-model="searchclaim" class="form-control" 
				style="background-color: #34495e;color: #fdfefe;font-weight: bold;" />
						  				</td>
						  			</tr>
						  		</table>
						  	</div>
						  	<div>
						  		<table class="table table-striped">
						  			<tr style="font-weight: bolder;color: #1f618d">
						  				<td>Index</td>
						  				<td>Claim ID</td>
						  				<td>Adhar</td>
						  				<td>Username</td>
						  				<td>Date</td>
						  				<td style="color: #8e44ad">Print</td>
						  				<td style="color: #8e44ad">File</td>
						  				<td style="color: #229954">Delete</td>
						  			</tr>
						  			<tr ng-repeat="element in allclaim | filter:searchclaim" style="font-weight: bold">
						  				<td>{{$index+1}}</td>
						  				<td>{{element.claimID}}</td>
						  				<td>{{element.adhar}}</td>
						  				<td>{{element.userName}}</td>
						  				<td>{{element.date}}</td>
						  				<td>
						  					<a ng-href="reports/claim.php?claimID={{element.claimID}}" class="btn">Print</a>
						  				</td>
						  				<td>
						  					<a ng-href="reports/files.php?claimID={{element.claimID}}" class="btn">File</a>
						  				</td>
						  				<td>
						  					<input type="button" value="Delete" ng-click="DeleteClaim(element.claimID);" class="btn btn-danger"/>
						  				</td>
					  				</tr>
						  		</table>
						  	</div>
						  </div>
						</div>
					</div>
				</div>
				<div class="footer">
					<!-- <h5>Developer Satya Prakash Nandy</h5> -->
					<h5>CUTM</h5>
				</div>
			</div>
		</center>
                <?php
			if(isset($_GET["navigate"]))
			{
				echo "<script>document.getElementById('editkyc').click();</script>";
			}
		?>
	</body>
	
</html>