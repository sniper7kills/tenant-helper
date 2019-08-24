<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class MiddlewareCommand extends MiddlewareMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tenant:middleware';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Middleware';

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
