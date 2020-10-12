<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/13
 * Time: 0:38
 */

namespace Rebuild\Server;


use Psr\Container\ContainerInterface;

interface ServerInterface
{
    const SERVER_HTTP = 1;

    const SERVER_WEBSOCKET = 2;

    const SERVER_BASE = 3;

    public function init(array $config) :ServerInterface;

    public function start();

    public function getServer();
}