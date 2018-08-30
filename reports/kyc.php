<html>
	<head>
			<script>window.print()</script>
			<link rel="stylesheet" href="../style/kyc.css"></link>
			<link rel="stylesheet" href="lib/bootstrap.min.css"></link>
	</head>
	<body>
		<center>
			<?php
				include_once '../connection/connection.php';
				include_once '../class/controller.php';
				session_start();
				$adhar = $_SESSION['useradhar'];
				$object = new accessorOperations();
				$dataarray = array();
				$dataarray = $object->SelectKYC($adhar);
			?>
      			<table class="kycdetailtable">
				<tr>
					<td><label>Assessor Name</label></td>
					<td>
						<label><?php echo $dataarray[0]; ?></label>
					</td>
					<td rowspan="4"><img src="../<?php echo $dataarray[14]; ?>" style='height:150px;width:180px'/></td>
				</tr>
				<tr>
					<td><label>Father Name</label></td>
					<td>
						<label><?php echo $dataarray[1]; ?></label>
					</td>
				</tr>
				<tr>
					<td><label>Mother Name</label></td>
					<td>
						<label><?php echo $dataarray[2]; ?></label>
					</td>
				</tr>
				<tr>
					<td><label>Date of birth</label></td>
					<td>
						<label><?php echo $dataarray[3]; ?></label>
					</td>
				</tr>
                                <tr>
					<td><label>Gender</label></td>
					<td colspan="2">
						<label><?php echo $dataarray[20]; ?></label>
					</td>
				</tr>
				<tr>
					<?php if($dataarray[4]!=null || $dataarray[4]!=""){ ?>
					<td><label>Name</label></td>
					<td colspan="2">
						<label><?php echo $dataarray[4]; ?></label>
					</td>
					<?php } ?>
				</tr>
				<tr>
					<?php if($dataarray[5]!=null || $dataarray[5]!=""){ ?>
					<td><label>Relationship</label></td>
					<td colspan="2">
						<label><?php echo $dataarray[5]; ?></label>
					</td>
					<?php } ?>
				</tr>
				<tr>
					<td><label>Present Address</label></td>
					<td colspan="2">
						<p><?php echo $dataarray[6]; ?></p>
					</td>
				</tr>
				<tr>
					<td><label>Permanent Address</label></td>
					<td colspan="2">
						<p><?php echo $dataarray[7]; ?></p>
					</td>
				</tr>
				<tr>
					<td><label>Adhar Number</label></td>
					<td colspan="2"><label><?php echo $dataarray[8]; ?></label></td>
				</tr>
				<tr>
					<?php if($dataarray[9]!=null || $dataarray[9]!=""){ ?>
					<td><label>Voter ID Number</label></td>
					<td colspan="2"><label><?php echo $dataarray[9]; ?></label></td>
					<?php } ?>
				</tr>
				<tr>
					<td><label>Pan Number</label></td>
					<td colspan="2"><label><?php echo $dataarray[10]; ?></label></td>
				</tr>
				<tr>
					<td>
						<?php if($dataarray[11]!=null || $dataarray[11]!=""){ ?>
						<img src="../<?php echo $dataarray[11]; ?>" style='height:150px;width:180px'/>
						<?php } ?>
					</td>
					<td>
						<img src="../<?php echo $dataarray[12]; ?>" style='height:150px;width:180px'/>
					</td>
					<td>
						<img src="../<?php echo $dataarray[13]; ?>" style='height:150px;width:180px'/>
					</td>
				</tr>
				<tr>
					<td><label>Account Number</label></td>
					<td colspan="2"><?php echo $dataarray[15]; ?><label></label></td>
				</tr>
				<tr>
					<td><label>Bank Name</label></td>
					<td colspan="2"><?php echo $dataarray[16]; ?><label></label></td>
				</tr>
				<tr>
					<td><label>Branch Name</label></td>
					<td colspan="2"><label><?php echo $dataarray[17]; ?></label></td>
				</tr>
				<tr>
					<td><label>IFSC Code</label></td>
					<td colspan="2"><label><?php echo $dataarray[18]; ?></label></td>
				</tr>
			</table>
		</center>
	</body>
</html>
							