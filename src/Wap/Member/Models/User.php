<?php
/**************************************************************
 * File Name   : User.php
 * Author      : robert
 * Create Time : 2023-11-23 2:55
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Member\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
//    use Notifiable;

    protected $table = 'sys_user';

    //不主动设置时间戳
//    public $timestamps = false;
    protected $fillable = [
        'nick_name',
        'image_head',
        'password',
        'weixin_openid',
    ];
}
