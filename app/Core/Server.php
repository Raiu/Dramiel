<?php
namespace Dramiel\Core;

use Discord\Discord;
use Discord\Parts\User\Game;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;
use Dramiel\Core\Config;
use Dramiel\Core\Logger;

class Server
{

    public $Discord;

    public $Plugins;

    public function __construct()
    {
        // check what this does: chdir(__DIR__);
        // $this->startTime = time();
        $this->Discord = new Discord(['token' => Config::read('discord', 'token')]);
    }

    private function setErrorHandler()
    {
        $this->Discord->on(
            'error', function($error) {
                Logger::add('error', $error);
                exit(1);
            }
        );
        return true;
    }

    private function setReconnectSate()
    {
        $this->Discord->on(
            'reconnecting', function($message) {
                Logger::add('info', 'Websocket is reconnecting..');
        });

        $this->Discord->on(
            'reconnected', function($message) {
                Logger::add('info', 'Websocket was reconnected..');
        });

        return true;
    }

    private function setReadyState()
    {
         $this->Discord->on('ready', function ($discord) {

            Logger::add('info', 'Discord WebSocket is ready!' . PHP_EOL);

            $discord->on('message', function ($message) {

                    echo "{$message->author->username}: {$message->content}",PHP_EOL;
                    var_dump($message);

            });        
        });

        return true;
    }

    public function run()
    {
        
        $this->setErrorHandler();
        $this->setReconnectSate();
        $this->setReadyState();

        $this->Discord->run(); 
    }
}