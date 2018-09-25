<html>
	<head>
		<title>Upload Image</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<?php
			include_once 'connection/connection.php';
			include_once 'class/controller.php';
		    session_start();
			if(isset($_SESSION["useradhar"]) || isset($_SESSION["adminid"]))
			{
				$adhar = $_SESSION["useradhar"];
				$claimID = $_GET["claimID"];
				$batchNo = $_GET["batchNo"];
				$obj = new accessorOperations();
				$result = $obj->ImageBatchHeaderDetails();
				$num_rows = $result->num_rows;
			}
			else
			{
				header("Location:../login.php");
			}
			
		?>
		<script>
			function checkImage()
			{
				var ImageOne=document.getElementById("ImageOne");
				var ImageTwo=document.getElementById("ImageTwo");
				var ImageThree=document.getElementById("ImageThree");
				var ImageFour=document.getElementById("ImageFour");
				var ImageFive=document.getElementById("ImageFive");
				var ImageSix=document.getElementById("ImageSix");
				var ImageSeven=document.getElementById("ImageSeven");
				var ImageEight=document.getElementById("ImageEight");
				var ImageNine=document.getElementById("ImageNine");
				if(ImageOne.value.length>0)
				{
					if(ImageOne.files[0].size>1000000)
					{
						document.getElementById("imageone_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imageone_error").style.display = "none";
					}
				}
				if(ImageTwo.value.length>0)
				{
					if(ImageTwo.files[0].size>1000000)
					{
						document.getElementById("imagetwo_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imagetwo_error").style.display = "none";
					}
				}
				if(ImageThree.value.length>0)
				{
					if(ImageThree.files[0].size>1000000)
					{
						document.getElementById("imagethree_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imagethree_error").style.display = "none";
					}
				}
				if(ImageFour.value.length>0)
				{
					if(ImageFour.files[0].size>1000000)
					{
						document.getElementById("imagefour_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imagefour_error").style.display = "none";
					}
				}
				if(ImageFive.value.length>0)
				{
					if(ImageFive.files[0].size>1000000)
					{
						document.getElementById("imagefive_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imagefive_error").style.display = "none";
					}
				}
				if(ImageSix.value.length>0)
				{
					if(ImageSix.files[0].size>1000000)
					{
						document.getElementById("imagesix_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imagesix_error").style.display = "none";
					}
				}
				if(ImageSeven.value.length>0)
				{
					if(ImageSeven.files[0].size>1000000)
					{
						document.getElementById("imageseven_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imageseven_error").style.display = "none";
					}
				}
				if(ImageEight.value.length>0)
				{
					if(ImageEight.files[0].size>1000000)
					{
						document.getElementById("imageeight_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imageeight_error").style.display = "none";
					}
				}
				if(ImageNine.value.length>0)
				{
					if(ImageNine.files[0].size>1000000)
					{
						document.getElementById("imagenine_error").style.display = "block";
						return false;
					}
					else
					{
						document.getElementById("imagenine_error").style.display = "none";
					}
				}
				return true;
			}
		</script>
	</head>
	<body>
		<center>
		<?php
			echo $result;
		?>
		<form method="POST" action="upload_image_controller.php" onsubmit="return checkImage()" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $claimID ?>" readonly="true" name="claim_id"/>
		<div class="panel panel-primary" style="width:50%;margin-top:5%">
		<div class="panel-heading"><h2><b>Upload Batch Image</b></h2></div>
		<div class="panel-body">
		<table class="table">
			<tr>
				<td><b>Batch Number</b></td>
				<td><input type="text" value="<?php echo $batchNo ?>" readonly="true" name="batch_no" class="form-control" required /></td>
			</tr>
			<tr>
				<td><b>Assessment Date</b></td>
				<td><input type="date" value="" name="assessment_date" class="form-control" required  /></td>
				
			</tr>
			<tr>
				<td><b>Training Provider</b></td>
				<td><input type="text" value="" name="training_provider" class="form-control" required  /></td>
				
			</tr>
			<tr>
				<td><b>Testing Center</b></td>
				<td><input type="text" value="" name="testing_center" class="form-control" required  /></td>
				
			</tr>
			<tr>
				<td><b>Image One</b></td>
				<td>
					<input type="file" name="ImageOne" id="ImageOne" required />
					<p id="imageone_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Two</b></td>
				<td>
					<input type="file" name="ImageTwo" id="ImageTwo"/>
					<p id="imagetwo_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Three</b></td>
				<td>
					<input type="file" name="ImageThree" id="ImageThree"/>
					<p id="imagethree_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Four</b></td>
				<td>
					<input type="file" name="ImageFour" id="ImageFour"/>
					<p id="imagefour_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Five</b></td>
				<td>
					<input type="file" name="ImageFive" id="ImageFive"/>
					<p id="imagefive_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Six</b></td>
				<td>
					<input type="file" name="ImageSix" id="ImageSix"/>
					<p id="imagesix_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Seven</b></td>
				<td>
					<input type="file" name="ImageSeven" id="ImageSeven"/>
					<p id="imageseven_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
				
			</tr>
			<tr>
				<td><b>Image Eight</b></td>
				<td>
					<input type="file" name="ImageEight" id="ImageEight"/>
					<p id="imageeight_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
			</tr>
			<tr>
				<td><b>Image Nine</b></td>
				<td>
					<input type="file" name="ImageNine" id="ImageNine"/>
					<p id="imagenine_error" style="display:none">Upload Image or File Must Be Less Than 1MB</p>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="Upload" name="upload" class="btn btn-success" onclick="return confirm('Upload the picture will ovewrite the old ones !')"/></td>
			</tr>
		</table>
		</div>
		</div>
		</center>
	</body>
</html>