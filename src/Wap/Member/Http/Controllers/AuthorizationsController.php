<?php
/**************************************************************
 * File Name   : AuthorizationsController.php
 * Author      : robert
 * Create Time : 2023-11-23 14:00
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Robertluowen\LaravelShop\Wap\Member\Facades\Member;
use Robertluowen\LaravelShop\Wap\Member\Models\User;

class AuthorizationsController extends Controller
{
    public function __construct()
    {

    }

    public function wechatStore(Request $request)
    {

        try {

        }catch(\BadFunctionCallException $e) {
            return  $e->getMessage();
        }
        $wechatUser = session('easywechat.oauth_user.default'); // 拿到授权用户资料
        $user = User::where('weixin_openid', $wechatUser['id'])->first();

        //查看是否有这个用户
        if (!$user) {
            $user = User::create([
                'nick_name' => $wechatUser['nickname'],
                'image_head' => $wechatUser['avatar'],
                'password' => bcrypt('00000000'),
                'weixin_openid' => $wechatUser['id'],
            ]);

            //登入状态-》改变
            //迁移性问题

            // 改变用户的状态设置为登入
            Member::login($user);
            if (Member::check()) {
                return "已验证";
            } else {
                return "未验证";
            }

        }

        return "登录成功";
    }
}