<?php

use Illuminate\Support\Facades\Route;
use Http\Admin\User\Controllers\UserController;

Route::prefix('user')
    ->group(function(){
        Route::resource('users', UserController::class);
    });
