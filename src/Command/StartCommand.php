<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/11
 * Time: 23:56
 */

namespace Rebuild\Command;


use Swoole\Http\Server;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    protected function configure()
    {
       $this->setName('start')
           ->setDescription('Start Service');
    }

    protected function execute(InputInterface $input, OutputInterface $output) :int
    {
        $http = new Server('0.0.0.0', '80');
        $http->on('request', function ($request, $response) {
            $response->header("Content-Type", "text/html;charset=utf-8");
            $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
        });
        $http->start();
        return 123;
    }
}