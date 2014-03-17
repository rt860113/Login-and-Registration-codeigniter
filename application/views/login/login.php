<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login and Registration</title>
</head>
<body>
	<?php echo $this->session->userdata['error_lm'];?>
	<div>
		<p>Login:</p>
		<form action="<?php echo base_url('/login/log_in')?>" method="post">
		<label>Email Address:</label><input type="email" name="email" placeholder="Email"><br>
		<label>Password:</label><input type="password" name="password" placeholder="Password"><br>
		<input type="submit" value="Log in">
		</form>
	</div>
	<?php echo $this->session->userdata['error_rm'];?>
	<div>
		<p>Registration:</p>
		<form action="<?php echo base_url('/login/register')?>" method="post">
			<label>First Name:</label><input type="text" name="first_name" placeholder="First Name"><br>
			<label>Last Name:</label><input type="text" name="last_name" placeholder="Last Name"><br>
			<label>Email Address:</label><input type="email" name="email" placeholder="Email"><br>
			<label>Passwrod:</label><input type="password" name="password" placeholder="Password"><br>
			<label>Confirm Password:</label><input type="password" name="c_password" placeholder="Confirm Password"><br>
			<input type="submit" value="Register">
		</form>
	</div>

</body>
</html>