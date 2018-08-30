<html>
	<head>
		<title>Claim Files</title>
		<script>
			window.print();
		</script>
		<?php
			include_once '../connection/connection.php';
			include_once '../class/controller.php';
			session_start();
			if(isset($_SESSION["useradhar"]) || isset($_SESSION["adminid"]))
			{
				$adhar = $_SESSION["useradhar"];
				$claimID = $_GET["claimID"];
				$object = new accessorOperations();
				$result = $object->GetClaimFilesTemp($claimID);
			}
			else
			{
				header("Location:../login.php");
			}
		?>
	</head>
	<body>
		<center>
			<?php 
				while($row = mysqli_fetch_assoc($result))
				{
			?>
			<table>
				<tr>
					<td><?php echo $row['Batch Number'] ?></td>
				</tr>
				<tr>
					<td><?php echo $row['AssessmentDate'] ?></td>
					<td><?php echo $row['TrainingProvider'] ?></td>
					<td><?php echo $row['TestingCenter'] ?></td>
				</tr>
				<tr>
					<td><image src="../<?php echo $row['ImageOne'] ?>" width="400px" height="350px" /></td>
					<td><image src="../<?php echo $row['ImageTwo'] ?>" width="400px" height="350px" /></td>
					<td><image src="../<?php echo $row['ImageThree'] ?>" width="400px" height="350px" /></td>
				</tr>
				<tr>
					<td><image src="../<?php echo $row['ImageFour'] ?>" width="400px" height="350px" /></td>
					<td><image src="../<?php echo $row['ImageFive'] ?>" width="400px" height="350px" /></td>
					<td><image src="../<?php echo $row['ImageSix'] ?>" width="400px" height="350px" /></td>
				</tr>
				<tr>
					<td><image src="../<?php echo $row['ImageSeven'] ?>" width="400px" height="350px" /></td>
					<td><image src="../<?php echo $row['ImageEight'] ?>" width="400px" height="350px" /></td>
					<td><image src="../<?php echo $row['ImageNine'] ?>" width="400px" height="350px" /></td>
				</tr>
			</table>
			<?php
				}
			?>
		</center>
	</body>
	
</html>