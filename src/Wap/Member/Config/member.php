<?php
/**************************************************************
 * File Name   : member.php
 * Author      : robert
 * Create Time : 2023-11-23 2:43
 * DESC        :
 ***************************************************************/
return [
    'wechat'=>[
        'official_account' => [
            'default' => [
                'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID', 'you-id'),     // AppID
                'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET', 'your-secret'),    // AppSecret
                'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', ''),     // Token
                'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),   // EncodingAESKey

                /*
                 * OAuth 配置
                 *
                 * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
                 * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
                 * enforce_https：是否强制使用 HTTPS 跳转
                 */
                'oauth'   => [
                    'scopes'        => array_map('trim', explode(',', env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_SCOPES', 'snsapi_userinfo'))),
                    'callback'      => env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
                    'enforce_https' => true,
                ],
            ],
        ],
    ],

    'auth' => [
        // 事先的配置
        'controller' => Robertluowen\LaravelShop\Wap\Member\Http\Controllers\AuthorizationsController::class,
        'guard' => 'member',
        'guards' => [
            'member' => [
                'driver' => 'session',
                'provider' => 'member',
            ],
        ],
        'providers' => [
            'member' => [
                'driver' => 'eloquent',
                'model' => Robertluowen\LaravelShop\Wap\Member\Models\User::class,
            ],

        ],
    ],


];