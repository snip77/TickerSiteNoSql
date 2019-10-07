<?php
namespace Redis;

use Predis\Client;

class Redis
{
	public static function connect(){
		return new Client([
		    'scheme' => 'tcp',
		    'host'   => '127.0.0.1',
		    'port'   => 6379,
		]);
	}
}