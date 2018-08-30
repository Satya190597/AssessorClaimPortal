<?php
	if(isset($_GET['useremail'])==null || isset($_GET['useremail'])=='')
	{
		header("Location:login.php");
	}
	else
	{
		$email = rawurldecode($_GET['useremail']);
		session_start();
		$_SESSION['email'] = $email;
	}

?>
<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="lib/bootstrap.min.css"></link>
		<script>
			function validate()
			{
				password = document.getElementById('password').value;
				confirmpassword = document.getElementById('confirmpassword').value;
				if(password!=confirmpassword)
				{
					document.getElementById('error_1').style.display='block';
					return false;
				}
				else
				{
					return true;
				}
			}
		</script>
		<style>
			table
			{
				margin-top: 100px;
			}
			table td
			{
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<center>
			<div>
				<form method='POST' action='addUser.php' onsubmit="return validate();">
					<table>
						<tr>
							<td><b>Aadhar ID</b></td>
							<td><input type='text' name='adhar' required required pattern="^[0-9]{5,13}" class="form-control" minlength="12"/></td>
						</tr>
						<tr>
							<td><b>Password</b></td>
							<td><input type='password' 
							name='password' 
							id='password' 
							required minlength="8"
							title="Password must be eight character long" class="form-control"/></td>
						</tr>
						<tr>
							<td><b>Confirm Password</b></td>
							<td>
								<input type='password' 
								name='confirmpassword' 
								id='confirmpassword' 
								required minlength="8"
								title="Password must be eight character long" class="form-control"/>
							</td>
						</tr>
						<tr>
							<td><input type='submit' name='signup' value='SignUp' class="btn btn-success"/></td>
						</tr>
						<tr>
							<td style='display: none;font-weight:bold;color:red' id='error_1'><label>Password Mismatch</label></td>
						</tr>
					</table>
				</form>
			</div>
		</center>
	</body>
</html>