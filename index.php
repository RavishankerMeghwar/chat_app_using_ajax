<html>
	<head>
		<title>Login Account</title>
        <style>
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
		<h1 style="text-align: center;">Login Account!..</h1>
		<center>
		<fieldset>
			<legend>Login Account Now</legend>
			<form action="login_process.php" method="POST">
				<!-- <form action="server_side_form_validation.php" method="POST" onsubmit="return false"> -->
				<table cellpadding="10">
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
						<td><b>Email: </b></td>
						<td><input type="text" name="email" id="email"></td>
					</tr>
					<tr>
						<td><b>Password: </b></td>
						<td><input type="password" name="password" id="password"></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="login" value="Login Account">
						</td>
					</tr>
				</table>
                <h3><b>If You have Not Account </b><span><a href="create_account.php">Create Account</a></span></h3>		
			</form>
		</fieldset>
	</center>
	</body>
</html>