<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckPermissionParameter;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');

    // Users
    Route::controller(UserController::class)->prefix('/users')->name('users.')->group(function () {
        Route::view('/add', 'users.add')->name('add');
        Route::get('/', 'allUsersList')->name('all');
        Route::get('/search', 'searchUsers')->name('search');
        Route::post('/create', 'createUser')->name('create');
    });

    Route::middleware('can:user-management')->group(function () {
        // Permissions
        Route::view('/permissions', 'permissions.index')->name('permissions');
        Route::controller(PermissionController::class)->prefix('/permissions')->name('permissions.')->group(function () {
            Route::get('/edit/{permission}', 'editPermission')->name('edit')->middleware(CheckPermissionParameter::class);
            Route::get('/give/{permission}', 'givePermission')->name('give');
            Route::get('/delete/{permission}', 'deletePermission')->name('delete')->middleware(CheckPermissionParameter::class);
            Route::post('/create', 'createPermission')->name('create');
            Route::post('/update/{permission}', 'updatePermission')->name('update')->middleware(CheckPermissionParameter::class);
            Route::post('/grant/{permission}', 'grantPermission')->name('grant');
        });
    });
});

Auth::routes();

