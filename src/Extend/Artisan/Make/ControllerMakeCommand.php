<?php
namespace Robertluowen\LaravelShop\Extend\Artisan\Make;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Symfony\Component\Console\Input\InputArgument;

class ControllerMakeCommand extends Command
{
    use GeneratorCommand;

    // trait 方法优先级大于继承
    protected $name = 'shop-make:controller';
    protected $description = '这是给laravel-shop创建控制器的';

    protected $defaultNamespace = '\Http\Controllers';


    //php artisan shop-make:controller Data\Goods GoodsController








}
