<?php
namespace Dramiel\App;

use Discord\Discord;
use Discord\Parts\User\Game;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class App
{

    public $discord;

    public $plugins;

    public $logger;

    private $configArray;

    public function __construct()
    {
        ini_set('memory_limit', '1024M');
        chdir(__DIR__);
        gc_enable();
        $this->startTime = time();
        $this->getConfig();
        $this->discord = new Discord(['token' => $this->configArray['discord']['token']]);
    }

    public function config()
    {

    }

    public function getConfig()
    {
        if (file_exists('config/config.php')) {
            $this->configArray = require_once 'config/config.php';
        } else {
            $this->logger->error('config.php not found (you might wanna start by editing and renaming config_new.php)');
            die();
        }
        return true;
    }

    public function setLogger()
    {
        $this->logger = new Logger('Dramiel');
        $this->logger->pushHandler(new StreamHandler(
            __DIR__ . '/storage/logs/log.log',
            Logger::INFO
        ));
        $this->logger->addInfo('Logger Initiated');

        return true;
    }

    public function setErrorHandler()
    {
        $this->discord->on(
            'error',
            function($error) use ($logger) {
                $this->logger->addError($error);
                exit(1);
            }
        );
        return true;
    }

    public function setReconnectSate()
    {
        $this->discord->on(
            'reconnecting',
                function() use ($logger) {
                    $this->logger->addInfo('Websocket is reconnecting..');
        });

        $this->discord->on(
            'reconnected',
                function() use ($logger) {
                    $this->logger->addInfo('Websocket was reconnected..');
        });

        return true;
    }

    public function setReadyState()
    {
        $this->discord->on(
            'ready',
            function($discord) use ($logger, $config, $plugins, $pluginsT, $discord) {
            $this->logger->addInfo('Discord WebSocket is ready!' . PHP_EOL);
            $this->logger->addInfo('Memory usage: '.round(memory_get_usage() / 1024 / 1024, 3) . 'MB'.PHP_EOL);
        });

        return true;
    }

    public function run()
    {
        $this->setLogger();
        $this->setErrorHandler();
        $this->setReadyState();

        $this->discord->run(); 
    }
}