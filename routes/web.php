<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'SiteController@home')->name('site.home');

Auth::routes();

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/saldo', 'BalanceController@balance')->name('admin.balance');

    Route::get('/deposito', 'DepositController@deposit')->name('admin.balance.deposit');
    Route::post('/deposito', 'DepositController@store')->name('admin.deposit.store');

    Route::get('/saque', 'WithdrawController@withdraw')->name('admin.withdraw');
    Route::post('/saque', 'WithdrawController@store')->name('admin.withdraw.store');
});
