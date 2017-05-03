<?php
/**
 * Created by PhpStorm.
 * User: 759517209@qq.com
 * Date: 2017/4/25
 * Time: 19:56
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Hello extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Hello';
    }
}