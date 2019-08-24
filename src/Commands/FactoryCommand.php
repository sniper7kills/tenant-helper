<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Database\Console\Factories\FactoryMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class FactoryCommand extends FactoryMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tenant:factory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Factory';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ta = new TenantApplication();
        $ta->loadFromParent($this->getLaravel());
        $ta->useDatabasePath($ta->basePath().'/Tenant/database');
        $this->setLaravel($ta);


        parent::handle();
    }
}
