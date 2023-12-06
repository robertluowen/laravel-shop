<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;


use Illuminate\Console\GeneratorCommand;

use Robertluowen\LaravelShop\Extend\Artisan\Make\GeneratorCommand as Command;

class ClassMakeCommand extends GeneratorCommand
{
    use Command;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop-make:class {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '这是给laravel-shop创建类的';


    protected $type = 'Class';


    public function getStub()
    {
        return __DIR__ . '/stubs/Class.stub';
    }

    //php artisan shop-make:class Extend\Artisan\Make\ModelMakeCommand

}
