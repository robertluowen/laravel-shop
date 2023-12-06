<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;


use Illuminate\Console\GeneratorCommand as Command;

use Robertluowen\LaravelShop\Extend\Artisan\Make\GeneratorCommand;

class ClassMakeCommand extends Command
{
    use GeneratorCommand;

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


    //php artisan shop-make:class Extend\Artisan\Make\ModelMakeCommand


    public function getStub()
    {
        return __DIR__ . '/stubs/Class.stub';
    }




}
