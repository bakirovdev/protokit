<?php

namespace App\Console\Commands\Protokit;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\StreamOutput;

class MigrateCommand extends Command
{

    protected $signature = 'protokit:migrate';

    protected $description = 'Migrate command';

    public function handle()
    {
        $stream = fopen('php://output', 'w');

        // migrations
        app()->register(DBTableServiceProvider::class);
        Artisan::call('migrate:fresh', [],  new StreamOutput($stream));

        //seeders
        $files = glob(base_path('modules/*/Database/Seeders/*.php'));
        foreach ($files as $file) (require($file))->run();

        //relations
        app()->register(DBRelationServiceProvider::class);
        Artisan::call('migrate', [], new StreamOutput($stream));

    }
}

class DBTableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $files = glob(base_path('modules/*/Database/Migrations/*.php'));
        $this->loadMigrationsFrom($files);
    }
}

class DBRelationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $files = glob(base_path('modules/*/Database/*.php'));
        $this->loadMigrationsFrom($files);
    }
}
