<html>
	<head>
		<title>Assessor Admin Login</title>
		<link rel="stylesheet" href="lib/bootstrap.min.css">
		<link rel="stylesheet" href="style/adminlogin.css">
		<script src="lib/bootstrap.min.js"></script>
		<?php
			include_once 'connection/connection.php';
			include_once 'class/controller.php';
			if(isset($_POST["login"]))
			{
				$id = $_POST["adminid"];
				$password = $_POST["adminpassword"];
				$object = new accessorOperations();
				$result = $object->AdminLogin($id,$password);
				$row = mysqli_fetch_assoc($result);
				if(mysqli_num_rows($result)>0)
				{
					session_start();
					$_SESSION["adminid"] = $id;
					$_SESSION["adminrole"] = $row["role"];
					header("Location:admindashboard.php");
				}
				else
				{
					echo "<style>.error{display:block;}</style>";
				}
			}
			else
			{
				echo "<style>.error{display:none;}</style>";
			}
		?>
	</head>
	<body>
		<center>
			<header>
				<h3><a class="mylink" href="index.php" style="color: #2e4053;" class="mylink"><b>Assessor</b></a></h3>
			</header>
			<div class="wrapper">
				<form method="POST" action="adminlogin.php" class="form">
					<table>
						<tr>
							<td><b>Admin ID</b></td>
						</tr>
						<tr>
							<td><input type="text" name="adminid" class="form-control" required/></td>
						</tr>
						<tr>
							<td><b>Password</b></td>
						</tr>
						<tr>
							<td><input type="password" name="adminpassword" class="form-control" required/></td>
						</tr>
						<tr>
							<td colspan="2"><small style="color:red" class="error"><b>Invalid Admin ID or Password<b></small></td>
						</tr>
						<tr>
							<td><input type="submit" name="login" value="login" class="btn mybutton"/></td>
						</tr>
					</table>
				</form>
			</div>
			<footer>
				<!-- <small><b>Developer Satya Prakash Nandy</b></small> -->
			</footer>
		</center>
	</body>
</html>