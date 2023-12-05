<?php

namespace Robertluowen\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wap-member:install ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '这是wap下的member组件安装命令';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        echo "这是在wap-member的安装命令";
        $this->call('migrate');
        $this->call('vendor:publish',[
            "--provider"=>"Robertluowen\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        ]);
    }
}
