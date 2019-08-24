<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\Str;
use sniper7kills\tenantHelper\TenantApplication;
use Symfony\Component\Console\Input\InputOption;

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
     * @return void
     */
    public function handle()
    {
        $this->input->setArgument('name','Model/'.$this->argument('name'));

        $ta = new TenantApplication();
        $ta->loadFromParent($this->getLaravel());
        $ta->useAppPath($ta->basePath().'/Tenant');
        $this->setLaravel($ta);

        $this->getStub();

        parent::handle();

        if(!$this->hasOption('not'))
            $this->addOnTenantTrait();
    }

    private function addOnTenantTrait()
    {
        $path = $this->getPath($this->qualifyClass($this->getNameInput()));
        $file = file_get_contents($path);

        $pattern = "/\nclass/";
        $replacement = "use Tenancy\Eloquent\Connection\OnTenant;\n\nclass";
        $file = preg_replace($pattern, $replacement, $file);

        $pattern = "/Model\n{\n/";
        $replacement = "Model\n{\n    use OnTenant;\n\n";
        $file = preg_replace($pattern, $replacement, $file);

        file_put_contents($path,$file);

        return;
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

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        $options = parent::getOptions();
        $options[] = ['not', 't', InputOption::VALUE_NONE, 'Do Not add the onTenant trait to model'];
        return $options;
    }
}
