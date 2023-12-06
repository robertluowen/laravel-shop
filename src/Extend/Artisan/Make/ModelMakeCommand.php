<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{

    use GeneratorCommand;

    // trait 方法优先级大于继承
    protected $name = 'shop-make:model';

    protected $description = '这是给laravel-shop创建模型的';


}
