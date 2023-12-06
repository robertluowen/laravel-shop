<?php
/**************************************************************
 * File Name   : GoodsServiceProvider.php
 * Author      : robert
 * Create Time : 2023-12-06 13:46
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Data\Goods\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Arr;
use Robertluowen\LaravelShop\Data\Goods\Models\Category;
use Robertluowen\LaravelShop\Data\Goods\Observers\CategoryObserver;

class GoodsServiceProvider extends ServiceProvider
{

    public function register()
    {
        // 预习内容
        // 注册
        // Illuminate\Database\Eloquent\Concerns\HasEvents::observe();

        // 所有注册的事件绑定 Illuminate\Events\Dispatcher 中的 $listeners属性

        // 查找并执行
        // Illuminate\Database\Eloquent\Concerns\HasEvents::fireModelEvent();
        //注册观察者
        Category::observe(CategoryObserver::class);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/goods.php', 'data.goods'
        );
    }

    public function boot()
    {
        $this->loadGoodsConfig();
        //加载迁移文件
        $this->loadMigrations();
    }


    public function loadGoodsConfig()
    {
//        dd(config());
//        dd(config('database.connections.'.config('data.goods.database.connection.type')));
        // 根据默认连接的信息去database.php配置分属于goods组件的连接信息
        config(
            Arr::dot(
                config('database.connections.'.config('data.goods.database.connection.type'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
        // 在把goods组件的单独信息 放到 database中的goods连接的信息
        config(
            Arr::dot(
                config('data.goods.database.'.config('data.goods.database.connection.name'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
    }

    public function loadMigrations()
    {

        if ($this->app->runningInConsole()){
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }

    }
}