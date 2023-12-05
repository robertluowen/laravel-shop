<?php
/**************************************************************
 * File Name   : shop.php
 * Author      : robert
 * Create Time : 2023-12-04 6:50
 * DESC        :
 ***************************************************************/

use Illuminate\Support\Facades\Route;

Route::any("/wechat-menu", "WechatMenuController@index");
Route::get("/", function (){
    return "商城首页";
})->middleware("easywechat.oauth:default,snsapi_userinfo");

Route::get("/","IndexController@index" );