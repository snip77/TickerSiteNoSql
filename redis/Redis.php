<?php
namespace Redis;

use Predis\Client;

class Redis
{
	public static function connect(){
		return new Client([
		    'scheme' => 'tcp',
		    'host'   => '127.0.0.1',
		    'port'   => 6379
		]);
	}

	public static function getArray($redis, $key){
		$data=$redis->get($key);
		if (is_null($data))
			return [];
		return json_decode($data, true);
	}
}