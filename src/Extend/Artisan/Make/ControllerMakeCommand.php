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


    public function getStub()
    {
        return __DIR__ . '/stubs/Controller.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return  $rootNamespace.'\\'.$this->getPackageInput().'\Http\Controllers';
    }


    protected function getPackageInput(){
        return trim($this->argument('package'));
    }
}
