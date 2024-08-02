<?php

use App\Http\Controllers\PermissionController;
use App\Http\Middleware\CheckPermissionParameter;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    Route::middleware('can:user-management')->group(function () {
        Route::view('/permissions', 'permissions.index')->name('permissions');
        Route::controller(PermissionController::class)->prefix('/permissions')->name('permissions.')->group(function () {
            Route::get('/edit/{permission}', 'editPermission')->name('edit')->middleware(CheckPermissionParameter::class);
            Route::get('/delete/{permission}', 'deletePermission')->name('delete')->middleware(CheckPermissionParameter::class);
            Route::get('/give/{permission}', 'givePermission')->name('give');
            Route::post('/create', 'createPermission')->name('create');
            Route::post('/update/{permission}', 'updatePermission')->name('update')->middleware(CheckPermissionParameter::class);
        });

    });
});

Auth::routes();

