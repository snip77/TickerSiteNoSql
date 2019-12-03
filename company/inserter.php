<?php
require '../vendor/autoload.php';

use Redis\Redis;
use Helper\Message;
if (!isset($_POST['name']))
	header('location:insert.php');

$redis=Redis::connect();
$companys=Redis::getArray($redis, 'companies');
$company_id=time();
$companies[$company_id]=['name'=>$_POST['name']];
Redis::setArray($redis, 'companies', $companies);
Message::set('Company created');
header("location:../index.php");