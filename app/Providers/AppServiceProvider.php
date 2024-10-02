<?php

namespace App\Providers;

use Laravel\Sanctum\Sanctum;
use Illuminate\Support\ServiceProvider;
use Modules\User\Models\UserAccessToken;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(UserAccessToken::class);
    }
}
