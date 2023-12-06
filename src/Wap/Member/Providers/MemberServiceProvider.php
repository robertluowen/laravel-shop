<?php
/**************************************************************
 * File Name   : MemberServiceProvider.php
 * Author      : robert
 * Create Time : 2023-11-23 2:55
 * DESC        :
 ***************************************************************/

namespace Robertluowen\LaravelShop\Wap\Member\Providers;

use EasyWeChat\OfficialAccount\Application as OfficialAccount;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider
{
    //member需要注入的中间件
    protected $routeMiddleware = [
        'easywechat.oauth' => \Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class,
    ];
    protected $middlewareGroups = [
    ];

    protected $commands = [
        \Robertluowen\LaravelShop\Wap\Member\Console\Commands\InstallCommand::class,
    ];
    /**
     从laravel的执行来说，所有操作都可以写在一个方法中，
     * 意义 方法名的意义
     * register 注册文件 注册服务提供者
     * boot 开启事件，启动某些功能
     */


    public function register()
    {

        //注册路由文件
        $this->registerRoutes();
        //指定了组件的名称，自定义资源目录地址
//        $this->loadViewsFrom(__DIR__ . '/../../Resources/Views', 'junit');
         // 怎么加载config配置文件
        // 怎么根据配置文件去加载auth信息
        $this->mergeConfigFrom(__DIR__ . '/../Config/member.php', 'wap.member');
        //注册中间件
        $this->registerRouteMiddleware();
        // php artisan vendor:publish --provider=" Robertluowen\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        $this->registerPublishing();



    }

    public function boot()
    {
        //加载配置文件
        $this->loadMemberConfig();
        //加载迁移文件
        $this->loadMigrations();
        //加载命令
        $this->commands($this->commands);


        //重新绑定easywechat 配置文件
        $this->app->bind("easywechat.official_account.default", function ($laravelApp) {
            $app = new OfficialAccount(array_merge(config('easywechat.official_account.default', []), config('wechat.official_account.default')));

            if (\is_callable([$app, 'setCache'])) {
                $app->setCache($laravelApp['cache.store']);
            }

            if (\is_callable([$app, 'setRequestFromSymfonyRequest'])) {
                $app->setRequestFromSymfonyRequest($laravelApp['request']);
            }

            return $app;
        });

//        dd(app('easywechat.official_account.default'));

    }

    public function loadMigrations()
    {

        if ($this->app->runningInConsole()){
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }

    }

    public function loadMemberConfig(){
       config(Arr::dot(config('wap.member.auth', []), 'auth.')) ;
       config(Arr::dot(config('wap.member.wechat', []),'wechat.')) ;

    }


    public function registerPublishing()
    {
        // 判断是否在命令行中运行
        if ($this->app->runningInConsole()) {
            //                  [当前组件的配置文件路径 =》 这个配置复制那个目录] , 文件标识
            // 1. 不填就是默认的地址 config_path 的路径 发布配置文件名不会改变
            // 2. 不带后缀就是一个文件夹
            // 3. 如果是一个后缀就是一个文件
            $this->publishes([__DIR__.'/../Config' => config_path('wap')], 'laravel-shop-wap-member');
        }
    }

    protected function registerRouteMiddleware()
    {

        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }
    }
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        });
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            // 定义路由访问的域名
//            'domain' => config('telescope.domain', null),
            // 定义路由的命名空间
            'namespace' => 'Robertluowen\LaravelShop\Wap\Member\Http\Controllers',
            // 这是前缀
            'prefix' => 'wap/member',
            // 这是中间件
            'middleware' => 'web', //laravel的用户组中间件，开启session
        ];
    }


}