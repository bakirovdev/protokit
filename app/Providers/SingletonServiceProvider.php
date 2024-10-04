<?php

namespace App\Providers;

use App\Bindings\LanguageSingleton;
use Illuminate\Support\ServiceProvider;

class SingletonServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->app->singleton('languages', LanguageSingleton::class);

        try {
            app('languages');
        } catch (\Throwable $th) {

        }
    }
}
