<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/11
 * Time: 23:24
 */

use Rebuild\Command\StartCommand;
use Rebuild\Config\Config;
use Rebuild\Config\ConfigFactory;
use Symfony\Component\Console\Application;

require  "vendor/autoload.php";

!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

$application = new Application();
$config = new ConfigFactory();
$config = $config();
$commands = $config->get('commands');
foreach ($commands as $command) {
    $application->add(new $command);
}
$application->run();