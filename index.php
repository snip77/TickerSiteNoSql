<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
	<?php if (isset($_GET['error'])): ?>
		<div class="alert alert-danger alrt" role="alert">
		  <?= $_GET['error'] ?>
		</div>
	<?php elseif (isset($_GET['message'])):?>
		<div class="alert alert-primary alrt" role="alert">
		  <?= $_GET['message'] ?>
		</div>
	<?php endif ?>
	<?php if (isset($_SESSION['username'])): ?>
		<a type="button" class="btn btn-dark logout-btn" href="auth/logout.php">Logout</a>
		<a type="button" class="btn btn-warning profile-btn" href="travel/insert.php">Add Travel</a>
	<?php else: ?>
		<a type="button" class="btn btn-dark login-btn" href="auth/login.php">Login</a>
		<a type="button" class="btn btn-warning signup-btn" href="auth/signUp.php">SignUp</a>
	<?php endif ?>
	<br>
	<?php
		require 'vendor/autoload.php';
		use Redis\Redis;
		$redis=Redis::connect();
		$recentTravels=json_decode($redis->get('Recent Travels'), true);
		if (is_null($recentTravels)): ?>
		<div class="empty-title">
			<h2>N</h2>
			<div class="empty-little-title">
				o
			</div>
			<h2 class="big-title">
				T
			</h2>
			<div class="empty-little-title">
				ravel
			</div>
		</div>
	<?php else: ?>
		<div class="title">
			<h2>R</h2>
			<div class="little-title">
				ecent
			</div>
			<h2 class="big-title">
				T
			</h2>
			<div class="little-title">
				ravels
			</div>
		</div>
	<?php endif ?>
	<?php foreach ($recentTravels as $travel): ?>
		
	<?php endforeach ?>
</body>
</html>