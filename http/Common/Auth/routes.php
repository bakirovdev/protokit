<?php

use Http\Common\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->group(function(){
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
