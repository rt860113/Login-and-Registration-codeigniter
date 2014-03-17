<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Profile</title>
</head>
<body>
<?php var_dump($this->session->all_userdata());?>
	<h1>Welcome <?= $this->session->userdata['first_name']?></h1> 
	<h2>User Information</h2>
	<p>First Name:<?= $this->session->userdata['first_name']?></p>
	<p>Last Name:<?= $this->session->userdata['last_name']?></p>
	<p>Email Address:<?= $this->session->userdata['email']?></p>
	<form action="<?php echo base_url('/login/log_out')?>" method='post'>
		<input type="submit" value="logout">
	</form>
</body>
</html>