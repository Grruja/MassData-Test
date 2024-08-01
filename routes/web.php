<?php

use App\Http\Middleware\CheckUserManagementPermission;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    Route::view('/permissions', 'permissions')
        ->middleware(CheckUserManagementPermission::class)
        ->name('permissions');
});

Auth::routes();

