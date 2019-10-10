<?php

namespace Helper;

class Message
{
	public static function init(){
		session_start();
	}

	public static function set($value)
	{
		static::init();	
		$_SESSION['Message']=$value;
	}

	public static function get()
	{
		static::init();
		$message=$_SESSION['Message'];
		unset($_SESSION['Message']);
		return $message;
	}

	public static function has()
	{
		static::init();
		return isset($_SESSION['Message']);
	}
}