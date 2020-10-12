<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/12
 * Time: 23:29
 */

namespace Rebuild\Config;


use Rebuild\Contract\ConfigInterface;

class Config implements ConfigInterface
{
    protected array $configs = [];

    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    public function get(string $key, $default = null)
    {
        return $this->configs[$key] ?? $default;
    }

    public function has(string $keys)
    {
        return isset($this->configs[$keys]);
    }

    public function set(string $key, $value)
    {
        $this->configs[$key] = $value;
    }
}