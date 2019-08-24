<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class SeederCommand extends SeederMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Seeder';

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
