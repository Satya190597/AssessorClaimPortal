<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/upload_batch_image.css">
	<script src="lib/jquery.min.js"></script>
	<script src="javascript/claim_image_validation.js"></script>
	<title>Upload Batch Image</title>
	<?php
		include_once 'connection/connection.php';
		include_once 'class/controller.php';
		$ID	=	$_GET['batch_id'];
		$NUMBER = $_GET['batch_number'];
		if(isset($_GET['event']) && isset($_GET['ID']))
		{
			if($_GET['event']=='delete')
			{
				$DEL_ID = $_GET['ID'];
				$object = new accessorOperations();
				$result	= $object->deleteBatchImage($DEL_ID);
				header('Location:upload_batch_image.php?&batch_id='.$ID.'&batch_number='.$NUMBER.'&del_status='.$result);
			}
		}
		if(isset($_GET['status']))
		{
			if($_GET['status']=='100')
				echo "<script>alert('Image Uploaded Successfully')</script>";
			else
				echo "<script>alert('Something Went Wrong')</script>";
		}
	?>
</head>
<body>
	<div style="text-align: center;">
		<div style="margin: auto" class="panel panel-primary">
			<div class="panel-heading">
				<h1>Upload Batch Image</h1>
			</div>
			<div class="panel-body">
				<center>
					<form method="POST" action="add_batch_image.php" enctype="multipart/form-data">
						<table>
							<tr>
								<td><input type="hidden" name="batch_id" value="<?php echo $ID; ?>"/></td>
							</tr>
							<tr>
								<td><b>Batch Number</b></td>
								<td><input type="text" name="batch_number" class="form-control" value="<?php echo $NUMBER; ?>" readonly /></td>
							</tr>
							<tr>
								<td><b>Assessment Date</b></td>
								<td><input type="date" name="assessment_date" class="form-control" required /></td>
							</tr>
							<tr>
								<td><b>Training Provider</b></td>
								<td><input type="text" name="training_provider" class="form-control" required /></td>
							</tr>
							<tr>
								<td><b>Testing Center</b></td>
								<td><input type="text" name="testing_center" class="form-control" required /></td>
							</tr>
							<tr>
								<td><b>Image</b></td>
								<td>
									<input type="file" name="imageupload" class="claim_pic"/><br>
									<strong class="pic_error" style="color:red">Image size must be less than 2MB and in jpeg format</strong>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" value="Add" class="btn btn-primary submit" />
									<a href="home.php" class="btn btn-primary">Back To Home</a></td>
							</tr>
						</table>
					</form>
					<!-- Image Gallery -->
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4>Image Uploaded</h4>
						</div>
						<div class="panel-body">
							<?php
								$object = new accessorOperations();
								$result	= $object->getBatchImage($ID);
								$count	= 1;
								while($row=mysqli_fetch_assoc($result))
								{
							?>
							<table class="table">
								<tr>
									<td><?php echo $count; ?></td>
									<td><image src="<?php echo $row['image_url']; ?>" width="90px" height="120px" /></td>
									<td><a href="upload_batch_image.php?event=delete&batch_id=<?php echo $ID; ?>&batch_number=<?php echo $NUMBER; ?>&ID=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
								</tr>
							</table>
							<?php
									$count++;
								}
							?>
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>
</body>
</html>