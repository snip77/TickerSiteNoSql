<?php
require 'vendor/autoload.php';
use Helper\Error;
use Helper\Message;
use Redis\Redis;
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
	<?php if (Error::has()): ?>
		<div class="alert alert-danger alrt" role="alert">
		  <?= Error::get() ?>
		</div>
	<?php elseif (Message::has()):?>
		<div class="alert alert-primary alrt" role="alert">
		  <?= Message::get() ?>
		</div>
	<?php endif ?>
	<?php if (isset($_SESSION['username'])): ?>
		<a type="button" class="btn btn-dark logout-btn" href="auth/logout.php">Log out</a>
		<a type="button" class="btn btn-warning profile-btn" href="travel/insert.php">Add Travel</a>
		<a type="button" class="btn btn-danger profile-btn" href="travel/search.php">Search</a>
	<?php else: ?>
		<a type="button" class="btn btn-dark login-btn" href="auth/login.php">Log in</a>
		<a type="button" class="btn btn-warning signup-btn" href="auth/signUp.php">Sign Up</a>
	<?php endif ?>
	<br>
	<?php
		$redis=Redis::connect();
		$recentTravels=Redis::getArray($redis, 'Recent Travels');
		if (count($recentTravels)==0): ?>
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
	<br>
	<?php foreach ($recentTravels as $travel_id => $travel): ?>
		<div class="card w-75">
		  <div class="card-body">
		  	<div class="travel-info">
			    <h5 class="card-title">
			    	<img src="images/train.svg">
			    	<?= $travel['from'].' - '.$travel['to'] ?>
			    </h5>
			    <data class="card-text">
			    	<img src="images/time.svg">
			    	<?= $travel['time'] ?>
			    </data>
			    <data class="card-text date">
			    	<img src="images/date.svg">
			    	<?= $travel['date'] ?>
			    </data>
			    <data class="card-text date">
			    	<img src="images/money.svg">
			    	<?= $travel['price'].' Tooman' ?>
			    </data>
		    </div>
		  </div>
		</div>
		<br>
	<?php endforeach ?>
</body>
</html>