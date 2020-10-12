<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/12
 * Time: 23:25
 */

namespace Rebuild\Contract;


interface ConfigInterface
{
    public function get(string $key, $default = null);

    public function has(string $keys);

    public function set(string $key, $value);
}