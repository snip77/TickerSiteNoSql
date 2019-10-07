<?php
	require '../vendor/autoload.php';
	use Redis\Redis;
	$redis=(new Redis())->connect();
	$user=($redis->get('omid'));
	echo($user);
?>