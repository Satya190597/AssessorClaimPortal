<html>
	<head>
		<link rel='stylesheet' href='style/index.css'  />
		<link rel='stylesheet' href='lib/bootstrap.min.css'  />
		<script src="lib/jquery.min.js"></script>
		<title>Assessor</title>
		<script>
			$(document).ready(function(){
				$(".forgetPasswordButton").click(function(){
					$(".forgetPassword").toggle();
				});
				$(".forgetPasswordClose").click(function(){
					$(".forgetPassword").toggle();
				});
				//------------ Open new user div ---------------
				$(".newUserButton").click(function(){
					$(".newUser").toggle();
				});
				//------------ Close new user div --------------
				$(".newUserClose").click(function(){
					$(".newUser").toggle();
				});
			});
		</script>
	</head>
	<image src="style/image/bg6.jpeg" style="position:absolute;width:100%;height:100%;top:0px;left:0px"></image>
	<body>
	<div>
		<div class="wrapper">
		<center>
			<h1 class="assessor"><img src="style/image/Logo.png" style="width:90px;height:100px"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminlogin.php" class="mylink">Assessor KYA And Claim Portal</a></h1>
			<div class="login">
				<form method='POST' action='login.php'>
					<table class="logintable">
						<tr>
							<td><label><b>Aadhar Number</b></label></td>
						</tr>
						<tr>
							<td><input type='text' name='adhar' class="form-control" required pattern="^[0-9]{4,20}" minlength="12"/></td>
						</tr>
						<tr>
							<td><label><b>Password</b></label></td>
						</tr>
						<tr>
							<td><input type='password' name='password' class="form-control" required/></td>
						</tr>
						<tr>
							<td style="padding-top:20px"><input type='submit' name='login' value='Login' class="btn btn-success"/></td>
						</tr>
						<tr>
							<td><input type='button' value='New User' class="newUserButton btn btn-primary" style="float:left"/>
							<input type='button' value='Forget Password' class="forgetPasswordButton btn btn-danger" 
							style="float:right"/></td>
						</tr>
						<tr>
							<?php
								if(isset($_GET["message"])!=null)
								{
									$message = $_GET["message"];
									echo "<td style='color:#f4d03f'><b>$message</b></td>";
								}
							?>
						</tr>
					</table>
				</form>
			</div>
			<!-- <h6 style="font-weight: bolder;margin-top:50px"><a href="https://www.linkedin.com/in/satya-prakash-nandy-606531133/" class="mylink" style="color:white">Developer Satya Prakash Nandy</a></h6> -->
			<div class='newUser' style='display: none'>
				<div>
					<form method='POST' action='mail/sendLink.php'>
						<table class='newUser-table'>
							<tr>
								<td><b>Email</b></td>
							</tr>
							<tr>
								<td colspan="2"><input type='text' name='email' class="form-control" required/></td>
							</tr>
							<tr>
							    <td><input type="radio" name="user_type" value="assessor"/>&nbsp;<b>Assessor</b></td>
							    <td><input type="radio" name="user_type" value="coordinator"/>&nbsp;<b>Coordinator</b></td>
							</tr>
							<tr>
								<td colspan="2">
    								<input type='submit' value='Send Link' class="btn btn-primary" style="float:left"/>
    								<input type='button' value='Close' class='newUserClose btn btn-danger' style="float:right"/>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class='forgetPassword' style='display: none'>
				<form method='POST' action='forgetPassword.php'>
					<table class='forgetPassword-table'>
						<tr>
							<td><b>Aadhar ID</b></td>
						</tr>
						<tr>
							<td><input type='text' name='adhar' class="form-control" required pattern="^[0-9]{4,20}"/></td>
						</tr>
						<tr>
							<td>
								<input type='submit' value='Send Password' class="btn btn-primary" style="float:left"/>
								<input type='button' value='Close' class='forgetPasswordClose btn btn-danger' style="float:right"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</center>
		</div>
	</body>
</html>