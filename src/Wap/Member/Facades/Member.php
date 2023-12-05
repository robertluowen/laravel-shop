<?php
/**************************************************************
 * File Name   : Member.php
 * Author      : robert
 * Create Time : 2023-12-02 3:09
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Member\Facades;

use Illuminate\Support\Facades\Facade;

class Member extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Robertluowen\LaravelShop\Wap\Member\Member::class;
    }


}