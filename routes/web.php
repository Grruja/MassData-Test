<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/home', 'home')->name('home');

Auth::routes();

