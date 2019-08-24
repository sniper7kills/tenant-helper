<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class PolicyCommand extends PolicyMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tenant:policy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Policy';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ta = new TenantApplication();
        $ta->loadFromParent($this->getLaravel());
        $ta->useAppPath($ta->basePath().'/Tenant');
        $this->setLaravel($ta);


        parent::handle();
    }
}
