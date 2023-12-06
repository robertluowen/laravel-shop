<?php

namespace Robertluowen\LaravelShop\Extend\Artisan\Make;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as Command;

class MigrateMakeCommand extends Command
{
    use GeneratorCommand;

    protected $signature = 'shop-make:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    protected $description = 'Create a new migration file';

    // php artisan shop-make:migration createTable --path=Data\Goods
    protected function getMigrationPath()
    {
        return $this->packagePath.'/'.$this->input->getOption('path').'/Database/'.'migrations';
    }



}
