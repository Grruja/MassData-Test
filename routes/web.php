<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    Route::middleware('can:user-management')->group(function () {
        Route::view('/permissions', 'permissions.index')->name('permissions');

        Route::controller(PermissionController::class)->prefix('/permissions')->name('permissions.')->group(function () {
            Route::get('/edit/{permission}', 'editPermission')->name('edit');
            Route::post('/create', 'createPermission')->name('create');
            Route::post('/update/{permission}', 'updatePermission')->name('update');
        });

    });
});

Auth::routes();

