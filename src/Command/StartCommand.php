<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/11
 * Time: 23:56
 */

namespace Rebuild\Command;


use Rebuild\Config\Config;
use Rebuild\Server\ServerFactory;
use Swoole\Http\Server;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    /**
     * @var \Rebuild\Config\Config
     */
    protected  $config;

    public function __construct(Config $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    protected function configure()
    {
       $this->setName('start')
           ->setDescription('Start Service');
    }

    protected function execute(InputInterface $input, OutputInterface $output) :int
    {
        $config = $this->config;
        $configs = $config->get('server');
        $serverFactory = new ServerFactory();
        $serverFactory->configure($configs);
        $serverFactory->getServer()->start();
        return 123;
    }
}