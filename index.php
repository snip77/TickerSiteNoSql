<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
	<?php if (isset($_SESSION['username'])) { ?>
		<a type="button" class="btn btn-dark logout-btn" href="auth/logout.php">Logout</a>
		<a type="button" class="btn btn-warning profile-btn" href="profile.php">Profile</a>
	<?php }else{ ?>
		<a type="button" class="btn btn-dark login-btn" href="auth/login.php">Login</a>
		<a type="button" class="btn btn-warning signup-btn" href="auth/signUp.php">SignUp</a>
	<?php } ?>
</body>
</html>