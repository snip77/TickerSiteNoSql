<?php

use Helper\Error;
	require '../vendor/autoload.php';
	session_start();
	if (isset($_SESSION['username']))
		header('location:../');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style/auth.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
</head>
<body>
	<?php if (Error::has()): ?>
		<div class="alert alert-danger alrt" role="alert">
		  <?= Error::get() ?>
		</div>
	<?php endif ?>
	<form class="form" action="loginer.php" method="POST">
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input name="username" type="text" class="form-control" id="username" placeholder="Enter username">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-warning login-btn">Log in</button>
	</form>
</body>
</html>