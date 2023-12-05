<?php
/**************************************************************
 * File Name   : Controller.php
 * Author      : robert
 * Create Time : 2023-11-23 2:48
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests,DispatchesJobs;
}