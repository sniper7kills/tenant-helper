<?php
namespace sniper7kills\tenantHelper;

use Illuminate\Support\ServiceProvider as Provider;

use sniper7kills\tenantHelper\Commands\ControllerCommand;
use sniper7kills\tenantHelper\Commands\FactoryCommand;
use sniper7kills\tenantHelper\Commands\InitCommand;
use sniper7kills\tenantHelper\Commands\MiddlewareCommand;
use sniper7kills\tenantHelper\Commands\MigrationCommand;
use sniper7kills\tenantHelper\Commands\ModelCommand;
use sniper7kills\tenantHelper\Commands\PolicyCommand;
use sniper7kills\tenantHelper\Commands\RequestCommand;
use sniper7kills\tenantHelper\Commands\SeederCommand;

class ServiceProvider extends Provider {

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InitCommand::class,
                ControllerCommand::class,
                FactoryCommand::class,
                MiddlewareCommand::class,
                MigrationCommand::class,
                ModelCommand::class,
                PolicyCommand::class,
                RequestCommand::class,
                SeederCommand::class,
            ]);
        }
    }

    public function register()
    {

    }
}
?>