<?php
require '../vendor/autoload.php';
use Helper\Error;
use Redis\Redis;
if ( ! isset($_GET['id'])) {
	header('location:../');
	return;
}
session_start();
if ( ! isset($_SESSION['username'])) {
	Error::set('to buy ticket should login');
	header('location:../index.php');
	return;
}
$redis=Redis::connect();
$travel=$redis->get($_GET['id']);
if (is_null($travel)) {
	var_dump('null travel');
	return;
}
$travel=json_decode($travel, true);
var_dump($travel);