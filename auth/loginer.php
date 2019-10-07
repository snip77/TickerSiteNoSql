<?php
	require '../vendor/autoload.php';
	if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
		header('location:login.php');
		return;
	}
	session_start();
	use Redis\Redis;
	$redis=Redis::connect();
	$user=json_decode($redis->get($_POST['username']), true);
	if (is_null($user)) {
		header('location:login.php?error=invalid username');
		return;
	}
	if ($user['password']!=$_POST['password']) {
		header('location:login.php?error=invalid password');
		return;
	}
	$_SESSION['username']=$user['email'];
	header('location:../index.php?message=loged in');
?>