<?php
/**
 * Created by PhpStorm.
 * User: 759517209@qq.com
 * Date: 2017/4/25
 * Time: 16:03
 */

namespace App\Services;


use App\Contracts\Hello;

class HelloWorld implements Hello
{
    function hello(){
        return "Hello!~~";
    }
}