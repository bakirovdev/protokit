<?php

use Illuminate\Support\Facades\Route;
use Http\Admin\User\Controllers\UserController;
use Http\Admin\User\Controllers\UserRoleController;

Route::prefix('user')
    ->group(function(){
        Route::resource('users', UserController::class);
        Route::resource('user-roles', UserRoleController::class);
    });
