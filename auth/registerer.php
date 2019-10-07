<?php
	require '../vendor/autoload.php';
	if ((!isset($_POST['username'])) || (!isset($_POST['password'])) || (!isset($_POST['email']))) {
		header('location:signup.php');
	}
	use Redis\Redis;
	$redis=Redis::connect();
	if ( ! is_null($redis->get($_POST['username']))) {
		header('location:signup.php?error=username exists');
		return;
	}
	$user_data=['password'=>$_POST['password'],'email'=>$_POST['email']];
	$redis->set($_POST['username'], json_encode($user_data));
	header('location:../index.php?message=user registered');
?>