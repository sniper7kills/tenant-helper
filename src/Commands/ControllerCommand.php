<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use sniper7kills\tenantHelper\TenantApplication;

class ControllerCommand extends ControllerMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tenant:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new tenant controller class';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if($this->option('api'))
            $this->input->setArgument('name','Api/'.$this->argument('name'));

        $ta = new TenantApplication();
        $ta->loadFromParent($this->getLaravel());
        $ta->useAppPath($ta->basePath().'/Tenant');
        $this->setLaravel($ta);


        parent::handle();
    }


}
