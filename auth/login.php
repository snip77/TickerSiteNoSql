<?php
if (isset($_SESSION['username'])) {
	header('location:../');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style/login.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
</head>
<body>
	<form class="form"action="loginer.php" method="POST">
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input name="username" type="text" class="form-control" id="username" placeholder="Enter username">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-warning login-btn">Login</button>
	</form>
</body>
</html>