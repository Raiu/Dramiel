<?php

use Dramiel\Core\Config;
use Dramiel\Core\Logger;

date_default_timezone_set('UTC');

set_time_limit(0);

ini_set('memory_limit', '512M');

gc_enable();

Config::load();
Logger::init();

$app = new Dramiel\Core\Server();

return $app;