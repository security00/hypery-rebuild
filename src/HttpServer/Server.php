<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/15
 * Time: 0:02
 */

namespace Rebuild\HttpServer;


class Server
{
    public function onRequest($request, $response)
    {
        $response->header("Content-Type", "text/html; charset=utf-8");
        $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
    }
}