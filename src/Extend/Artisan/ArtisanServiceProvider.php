<?php
/**************************************************************
 * File Name   : ArtisanServiceProvider.php
 * Author      : robert
 * Create Time : 2023-12-04 6:57
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Extend\Artisan;


use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider
{

    protected $command = [
        Make\ClassMakeCommand::class,
        Make\ModelMakeCommand::class,
        Make\ControllerMakeCommand::class
    ];

    public function register()
    {

        //加载命令
        $this->commands($this->command);


    }

    public function boot()
    {

    }


}