<?php
/**
 * Created by PhpStorm.
 * User: 消逝文字
 * Date: 2020/10/11
 * Time: 23:37
 */

namespace App;

class Bar
{
    public function bar() {
        echo (new Foo())->foo();
    }
}