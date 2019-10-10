<?php

	use Helper\Error;
	use Helper\Message;

	require '../vendor/autoload.php';
	if ((!isset($_POST['username'])) || (!isset($_POST['password'])) || (!isset($_POST['email']))) {
		header('location:signup.php');
	}
	use Redis\Redis;
	$redis=Redis::connect();
	if ( ! is_null($redis->get($_POST['username']))) {
		Error::set('username exists');
		header('location:signup.php');
		return;
	}
	$user_data=['password'=>$_POST['password'],'email'=>$_POST['email']];
	$redis->set($_POST['username'], json_encode($user_data));
	Message::set('user registered');
	header('location:../index.php');
?>