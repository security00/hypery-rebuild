<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/13
 * Time: 0:35
 */

namespace Rebuild\Server;


class ServerFactory
{
    protected array $serverConfig = [];

    /**
     * @var \Rebuild\Server\Server
     */
    protected $server;

    public function configure(array $configs)
    {
        $this->serverConfig = $configs;
        $this->getServer()->init($this->serverConfig);
    }

    public function getServer() :Server
    {
        if (! isset($this->server)) {
            $this->server = new Server();
        }
        return $this->server;
    }
}