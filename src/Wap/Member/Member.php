<?php
/**************************************************************
 * File Name   : Member.php
 * Author      : robert
 * Create Time : 2023-12-02 2:54
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Member;
use Illuminate\Support\Facades\Auth;


class Member
{
    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|mixed
     * @desc 提供给用户的工具类
     * @author robert 2023-12-02
     */
    public  function guard()
    {
        return Auth::guard(config('wap.member.auth.guard'));
    }

    public function __call($funName, $arguments){
        return $this->guard()->$funName(...$arguments);
    }
}