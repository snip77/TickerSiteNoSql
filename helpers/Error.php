<?php

namespace Helper;

class Error
{
	public static $started=false;
	public static function init(){
		if (static::$started)
			return;
		session_start();
	}

	public static function set($value)
	{
		static::init();	
		$_SESSION['Error']=$value;
	}

	public static function get()
	{
		static::init();
		$message=$_SESSION['Error'];
		unset($_SESSION['Error']);
		return $message;
	}

	public static function has()
	{
		static::init();
		return isset($_SESSION['Error']);
	}
}