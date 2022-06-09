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

    Route::get('/transferir', 'TransferController@transfer')->name('admin.transfer');
    Route::post('/transferir', 'TransferController@store')->name('admin.transfer.store');

    Route::get('/historico', 'HistoricController@index')->name('admin.historic.index');
    Route::post('/historico', 'HistoricController@search')->name('admin.historic.search');
});
