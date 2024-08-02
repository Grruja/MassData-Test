<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    Route::middleware('can:user-management')->group(function () {
        Route::view('/permissions', 'permissions.index')->name('permissions');

        Route::controller(PermissionController::class)->prefix('/permissions')->name('permissions.')->group(function () {
            Route::get('/permissions/edit/{permission}', 'editPermission')->name('edit');
            Route::post('/permissions/create', 'createPermission')->name('create');
        });

    });
});

Auth::routes();

