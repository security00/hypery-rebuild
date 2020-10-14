<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/13
 * Time: 0:47
 */

namespace Rebuild\Server;

use Swoole\Http\Server as SwooleHttpServer;

class Server implements ServerInterface
{

    protected $onRequestCallbacks = [];

    public function init(array $config): ServerInterface
    {
        foreach ($config['servers'] as $server) {
            $this->server = new SwooleHttpServer($server['host'], $server['port'], $server['type'], $server['sock_type']);
            $this->registerSwooleEvents($server['callbacks']);
            break;
        }
        return $this;
    }

    public function start()
    {
        $this->getServer()->start();
    }

    public function getServer()
    {
        return $this->server;
    }

    public function registerSwooleEvents(array $callbacks)
    {
        foreach ($callbacks as $swooleEvent => $callback) {
            [$class, $method] = $callback;
            $instance = new $class();
            $this->server->on($swooleEvent, [$instance, $method]);
        }
    }
}