<?php
namespace App\redis;

use Predis\Client;

class Redis
{
	public function connect(){
		return new Client([
		    'scheme' => 'tcp',
		    'host'   => '10.0.0.1',
		    'port'   => 6379,
		]);
	}
}