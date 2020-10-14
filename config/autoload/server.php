<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/14
 * Time: 23:29
 */

use Rebuild\Server\Server;

return [
    'type'  =>  Server::class,
    'mode'  =>  SWOOLE_PROCESS,
    'servers'   => [
        [
            'name'  =>  'http',
            'type'  =>  1,
            'host'  => '0.0.0.0',
            'port'  =>  9502,
            'sock_type' =>  SWOOLE_SOCK_TCP,
            'callbacks'  =>  [
                'request'   => [\Rebuild\HttpServer\Server::class, 'onRequest'],
            ],
        ],
    ],
    'settings'  => [
        'enable_coroutine'  => true,
        'worker_num'    =>  1,
    ],
    'callback'  => [
        'worker_start'  => [Hyperf\Framework\Bootstrap\WorkStartCallBack::class, 'onWorkStart']
    ],
];