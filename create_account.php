<html>
	<head>
		<title>Create Account</title>
        <style>
        	span{
        		color: red;
        	}
			body{
				background-color: lightgray;
			}
        fieldset{
			background-color: teal;
			width: 50%;
			color: white;

		}
        </style>
	</head>
	<body>
		<h1 style="text-align: center;">Create Account!..</h1>
		<center>
		<fieldset>
			<legend>Create Account Now</legend>
			<form action="create_acc_process.php" method="POST" enctype="multipart/form-data"">
				<table cellpadding="10">
					<tr>
						<td colspan="3">Field Marked With (*) Are Required</td>
					</tr>
					<?php
					if(isset($_REQUEST['msg'])){
						?>
						<tr>
							<td colspan="3" style="color:red">
								<ul>
									<?= $_REQUEST['msg']?>
								</ul>
							</td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td><b>First Name: </b></td>
						<td><input type="text" name="first_name" id="first_name"></td>
					</tr>
					<tr>
						<td><b>Last Name: </b></td>
						<td><input type="text" name="last_name" id="last_name"></td>
					</tr>
					<tr>
						<td><b>Email: </b></td>
						<td><input type="text" name="email" id="email"></td>
					</tr>
					<tr>
						<td><b>Password: </b></td>
						<td><input type="text" name="password" id="password"></td>
					</tr>
						<tr>
						<td><b>Profile Image: </b></td>
						<td><input type="file" name="image_path" id="image_path" accept="images/*"></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="register" value="Create Account">
						</td>
					</tr>
				</table>
				<h3><b>If You have already Account </b><span><a href="index.php">Create Account</a></span></h3>		
			</form>
		</fieldset>
	</center>
	</body>
</html>