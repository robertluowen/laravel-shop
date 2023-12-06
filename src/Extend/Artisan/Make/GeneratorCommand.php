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

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->packagePath . '/' . str_replace('\\', '/', $name) . '.php';

    }


    protected function getArguments(): array
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],

        ];
    }
}
