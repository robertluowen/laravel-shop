<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

trait GeneratorCommand
{

    protected $packagePath = __DIR__ . "/../../..";

    protected function rootNamespace()
    {
        return "Robertluowen\LaravelShop";
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            ['DummyNamespace', 'DummyRootNamespace', 'NamespacedDummyUserModel'],
            ['{{ namespace }}', '{{ rootNamespace }}', '{{ namespacedUserModel }}'],
            ['{{namespace}}', '{{rootNamespace}}', '{{namespacedUserModel}}'],
        ];

        foreach ($searches as $search) {
            $stub = str_replace(
                $search,
                [$this->getNamespace($name), $this->rootNamespace() . '\\' . $this->getPackageInput() . '\\', $this->userProviderModel()],
                $stub
            );
        }
        return $this;
    }



    // 指定创建的文件默认地址
    protected function getDefaultNamespace($rootNamespace)
    {
        return  $rootNamespace.'\\'.$this->getPackageInput().$this->defaultNamespace;
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->packagePath . '/' . str_replace('\\', '/', $name) . '.php';

    }

    //这是获取输入的组件的包目录
    protected function getPackageInput()
    {
        return str_replace('/', '\\', trim($this->argument('package')));
    }

    protected function getArguments(): array
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],

        ];
    }

}
