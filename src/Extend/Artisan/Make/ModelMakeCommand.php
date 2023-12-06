<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;
use Illuminate\Support\Str;

class ModelMakeCommand extends Command
{

    use GeneratorCommand;

    // trait 方法优先级大于继承
    protected $name = 'shop-make:model';

    protected $description = '这是给laravel-shop创建模型的';


    protected $defaultNamespace = '\Models';

    //  php artisan shop-make:model Data\Goods\Models\GoodsModel


    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('shop-make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--fullpath' => true,
            '--path'=> $this->getPackageInput()
        ]);
    }

}
