<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class MigrationCommand extends MigrateMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Migration';


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
