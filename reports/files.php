<html>
	<head>
		<title>Claim Files</title>
		<link rel="stylesheet" href="../lib/bootstrap.min.css">
		<script>
			window.print();
		</script>
		<?php
			include_once '../connection/connection.php';
			include_once '../class/controller.php';
			$claimID = $_GET["claimID"];
			$object = new accessorOperations();
			$result = $object->getClaimImages($claimID);
		?>
	</head>
	<body>
		<center>
			<table class="table">
				<tr>
					<td><b>Image</b></td>
					<td><b>Batch Number</b></td>
					<td><b>Assessment Date</b></td>
					<td><b>Training Provider</b></td>
					<td><b>Testing Cneter</b></td>
				</tr>
			<?php 
				while($row = mysqli_fetch_assoc($result))
				{
			?>
				<tr>
					<td><image src="../<?php echo $row['image_url'] ?>" width="400px" height="350px" /></td>
					<td><?php echo $row['batch_number'] ?></td>
					<td><?php echo $row['assessment_date'] ?></td>
					<td><?php echo $row['training_provider'] ?></td>
					<td><?php echo $row['testing_center'] ?></td>
				</tr>
			<?php
				}
			?>
			</table>
		</center>
	</body>
	
</html>