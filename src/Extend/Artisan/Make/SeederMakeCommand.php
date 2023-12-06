<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as Commad;


class SeederMakeCommand extends Commad
{
    use GeneratorCommand;

    protected $name = 'shop-make:seeder';

    protected $description = '这是给laravel-shop创建批量生成数据文件的';

    protected $defaultNamespace = '\Database\Seeders';

    protected function getPath($name)
    {
        $inputName = trim($this->argument('name'));
        return $this->packagePath.'/'.$this->getPackageInput().'/Database/Seeders/'.$inputName.'.php';
    }


}
