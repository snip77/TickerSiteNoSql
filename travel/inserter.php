<?php
	if (
		(!isset($_POST['from']))||
		(!isset($_POST['to']))||
		(!isset($_POST['time']))||
		(!isset($_POST['date']))||
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
		"date"=>$_POST["date"],
		"time"=>$_POST["time"],
		"price"=>$_POST["price"],
		"capacity"=>$_POST["capacity"]
	];
	$redis->set($travelCode, json_encode($travel_data));
	$recentTravels=$redis->get('Recent Travels');
	if (is_null($recentTravels)) {
		$recentTravels=[];
	}else{
		$recentTravels=json_decode($recentTravels, true);
	}
	$recentTravels[$travelCode]=$travel_data;
	$redis->set('Recent Travels', json_encode($recentTravels));
	header("location:../index.php?message=travel created");
?>