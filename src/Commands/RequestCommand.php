<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Foundation\Console\RequestMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class RequestCommand extends RequestMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tenant:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Request';

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
