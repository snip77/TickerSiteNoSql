<?php

	if (
		(!isset($_POST['from']))||
		(!isset($_POST['to']))||
		(!isset($_POST['time']))||
		(!isset($_POST['price']))||
		(!isset($_POST['capacity']))
		) {
		header('location:insert.php');
	}
	$travelCode=time();
	require '../vendor/autoload.php';
	use Redis\Redis;
	$redis=Redis::connect();
	$travel_data=[
		"to"=>$_POST["to"],
		"from"=>$_POST["from"],
		"time"=>$_POST["time"],
		"price"=>$_POST["price"],
		"capacity"=>$_POST["capacity"]
	];
	var_dump($travel_data);
	// $redis->set($travelCode, json_encode($travel_data))
?>