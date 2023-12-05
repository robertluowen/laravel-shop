<?php
/**************************************************************
 * File Name   : shop.php
 * Author      : robert
 * Create Time : 2023-11-23 2:44
 * DESC        :
 ***************************************************************/

use Illuminate\Support\Facades\Route;

Route::get("/wechatStore", "AuthorizationsController@wechatStore")
    ->middleware("easywechat.oauth:default,snsapi_userinfo");

//为什么会死循环，因为没有用到web中间件，所以没有开启session，所以会一直跳转到授权页面
//laravel的session如何使用，在kernel.php中web中间件中有session的中间件

Route::get("/index", "AuthorizationsController@wechatStore")
    ->middleware("easywechat.oauth:default,snsapi_userinfo");