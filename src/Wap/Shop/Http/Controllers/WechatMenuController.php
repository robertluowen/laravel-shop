<?php
/**************************************************************
 * File Name   : WechatMenuController.php
 * Author      : robert
 * Create Time : 2023-12-04 6:52
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Shop\Http\Controllers;

class WechatMenuController extends Controller
{
    public function index()
    {
        $jsonButton = [
            "button" => [
                [
                    "type" => "view",
                    "name" => "laravel-shop",
                    "url" => "http://gh2hw4.natappfree.cc/wap/shop"
                ],
                [
                    "type" => "view",
                    "name" => "测试访问",
                    "url" => "http://gh2hw4.natappfree.cc/wap/member/wechatStore"
                ],

            ]
        ];
        $client = app('easywechat.official_account')->getClient();
        return $client->postJson('cgi-bin/menu/create', $jsonButton);


    }
}