<?php

namespace Dramiel\Core;

use Dramiel\Core\Logger;

class Config
{

	protected static $configArray = [
		'debug' => false
	];

	public static function read($set, $key)
	{
		if (!self::$configArray)
			{ self::load(); }

		return self::$configArray[$set][$key];

	}

	public static function set()
	{

	}

	public static function load()
	{
		if (file_exists(__DIR__.'/../../config/config.php')) {
            self::$configArray = require_once __DIR__.'/../../config/config.php';
         } else {
            Logger::add('error', 'config.php not found (you might wanna start by editing and renaming config_new.php)');
            die();
        }
        return true;
	}
}