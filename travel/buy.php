<?php
if ( ! isset($_GET['id'])) {
	header('location:../');
	return;
}
session_start();
if ( ! isset($_SESSION['username'])) {
	header('location:../index.php?error=to buy ticket should login');
	return;
}
require '../vendor/autoload.php';
use Redis\Redis;
$redis=Redis::connect();
$travel=$redis->get($_GET['id']);
if (is_null($travel)) {
	var_dump('null travel');
	return;
}
$travel=json_decode($travel, true);
var_dump($travel);