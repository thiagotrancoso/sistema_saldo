<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'SiteController@home')->name('site.home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
});
