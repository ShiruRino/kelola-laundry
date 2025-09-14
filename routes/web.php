<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('login',[AuthController::class, 'login'])->name('auth.login');
Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('index');
    })->name('index');
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('outlets', OutletController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);

    Route::post('logout',[AuthController::class, 'logout'])->name('auth.logout');
});
