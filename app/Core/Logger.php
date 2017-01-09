<?php

namespace Dramiel\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as MLogger;

class Logger
{

	private static $log;

	public static function init()
	{
        self::$log = new MLogger('Dramiel');
        self::$log->pushHandler(new StreamHandler(
            __DIR__.'/../../storage/logs/log.log',
            MLogger::INFO
        ));
        self::add('info', 'Logger Initiated');
	}


	public static function add($type, $message)
	{
		if ($type === 'info')
			{ self::$log->addInfo($message); return true; }
		if ($type === 'error')
			{ self::$log->addError($message); return true; }
		
		return false;
	}

	public static function read()
	{

	}
}