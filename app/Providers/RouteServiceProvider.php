<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->group(function() {
                        Route::prefix('admin')
                            ->middleware(['auth:suctum'])
                            ->group(glob(base_path('http/Admin/*/routes.php')));

                        Route::prefix('common')
                            ->group(glob(base_path('http/Common/*/routes.php')));
                });
        });
    }
}
