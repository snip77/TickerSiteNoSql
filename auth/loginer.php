<?php
require '../vendor/autoload.php';

use Redis\Redis;
use Helper\Error;
use Helper\Message;
use Helper\Session;

if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
	header('location:login.php');
}
$redis=Redis::connect();
$user=json_decode($redis->get($_POST['username']), true);
if (is_null($user)) {
	Error::set('invalid username');
	header('location:login.php');
	return;
}
if ($user['password']!=$_POST['password']) {
	Error::set('invalid password');
	header('location:login.php');
	return;
}
Session::set('username', $user['email']);
Message::set('loged in');
header('location:../index.php');
?>