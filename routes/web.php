<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    Route::view('/permissions', 'permissions')
        ->middleware('can:user-management')
        ->name('permissions');
});

Auth::routes();

