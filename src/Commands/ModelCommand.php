<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use sniper7kills\tenantHelper\TenantApplication;

class ModelCommand extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tenant:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Tenant Model';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->input->setArgument('name','Model/'.$this->argument('name'));

        $ta = new TenantApplication();
        $ta->loadFromParent($this->getLaravel());
        $ta->useAppPath($ta->basePath().'/Tenant');
        $this->setLaravel($ta);


        parent::handle();
    }

    /**
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createFactory()
    {
        $factory = Str::studly(class_basename($this->argument('name')));

        $this->call('tenant:factory', [
            'name' => "{$factory}Factory",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    /**
     * Create a migration file for the model.
     *
     * @return void
     */
    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('tenant:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('tenant:controller', [
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') ? $modelName : null,
        ]);
    }
}
