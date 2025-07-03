<?php

use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'],function () {
    Route::group(['middleware' => 'guest'], function () {

        Route::get('login',[LoginController::class, 'index'])->name('account.login');
        Route::get('register',[LoginController::class, 'register'])->name('account.register');
        Route::post('process-register',[LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'], function (){

        Route::get('logout',[LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard',[dashboardController::class, 'index'])->name('account.dashboard');
    });

});


Route::get('admin/login',[AdminLoginController::class, 'index'])->name('admin.login');













Route::get('search_data',[OrderController::class , 'search_data'] );



Route::get('/orders', [OrderController::class, 'index']);
Route::get('/download-orders', [OrderController::class, 'downloadPDF']);

   