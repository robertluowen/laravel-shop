<?php
/**************************************************************
 * File Name   : IndexController.php
 * Author      : robert
 * Create Time : 2023-12-04 23:02
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Shop\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        return view('wap.shop::index');
    }
}