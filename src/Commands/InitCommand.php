<?php

namespace sniper7kills\tenantHelper\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize Folder Structure';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $directories = [
            'Tenant',

            'Tenant/database',
            'Tenant/database/factories',
            'Tenant/database/seeds',
            'Tenant/database/migrations',

            'Tenant/Http',
            'Tenant/Http/Controllers',
            'Tenant/Http/Controllers/Api',
            'Tenant/Http/Middleware',
            'Tenant/Http/Requests',

            'Tenant/Model',

            'Tenant/Policies',

            'Tenant/resources',
            'Tenant/resources/js',
            'Tenant/resources/lang',
            'Tenant/resources/sass',
            'Tenant/resources/views',
            'Tenant/resources/views/layouts',

            'Tenant/routes'

        ];

        foreach($directories as $directory)
            File::makeDirectory($directory);
    }
}
