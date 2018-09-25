<!DOCTYPE html>
<html>
<head>
	<title>All Users</title>
	<link rel="stylesheet" href="../lib/bootstrap.min.css">
	<script>
		window.print();
	</script>
	<?php
		include_once '../connection/connection.php';
		include_once '../class/controller.php';
		$object = new accessorOperations();
		$result = $object->allKYCNoJSON();
	?>
</head>
<body>
	<table class="table">
		<tr>
		<td><b>Slno</b></td>
		<td><b>Adhar ID</b></td>
		<td><b>Name</b></td>
		<td><b>Contact</b></td>
		<td><b>Email</b></td></tr>
		<?php
			$count = 1;
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['adhar']==123456789112 || $row['adhar']==124124124124)
				{
					continue;
				}
		?>
		<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $row['adhar']; ?></td>
		<td><?php echo $row['user_name']; ?></td>
		<td><?php echo $row['contact']; ?></td>
		<td><?php echo $row['email']; ?></td>
		</tr>
		<?php
				$count++;
			}
		?>
	</table>
</body>
</html>
