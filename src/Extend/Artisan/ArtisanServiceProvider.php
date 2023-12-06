<?php
/**************************************************************
 * File Name   : ArtisanServiceProvider.php
 * Author      : robert
 * Create Time : 2023-12-04 6:57
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Extend\Artisan;


use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider
{

    /**
     * php artisan shop-make:class Extend\Artisan\Make\ModelMakeCommand
     * php artisan shop-make:model Data\Goods GoodsModel
     * php artisan shop-make:controller Data\Goods GoodsController
     * php artisan shop-make:migration createTable --path=Data\Goods
     * php artisan shop-make:seeder Data\Goods createTableSeeder
     *
     * @var string[]
     * @author robert 2023-12-07
     */

    protected $command = [
        Make\ClassMakeCommand::class,
        Make\ModelMakeCommand::class,
        Make\ControllerMakeCommand::class,
        Make\MigrateMakeCommand::class,
        Make\SeederMakeCommand::class,
        Make\ObserverMakeCommand::class
    ];

    public function register()
    {
        //Unresolvable dependency resolving [Parameter #1 [ <required> $customStubPath ]] in class Illuminate\Database\Migrations\MigrationCreator
        //加载命令
        $this->commands($this->command);


    }

    public function boot()
    {
        // 解决迁移文件问题
        $this->app->when(MigrationCreator::class)
            ->needs('$customStubPath')
            ->give(function ($app) {
                return $app->basePath('stubs');
            });
    }


}