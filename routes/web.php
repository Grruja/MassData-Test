<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    Route::middleware('can:user-management')->group(function () {
        Route::view('/permissions', 'permissions.index')->name('permissions');
        Route::post('/permissions/create', [PermissionController::class, 'createPermission'])->name('permissions.create');
    });
});

Auth::routes();

