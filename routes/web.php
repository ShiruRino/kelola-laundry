<?php

use App\Models\User;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Customer;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('login',[AuthController::class, 'login'])->name('auth.login');
Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        $outlets = Outlet::count();
        $products = Product::count();
        $users = User::count();
        $customers = Customer::count();
        return view('index', compact(['outlets', 'products', 'users', 'customers']));
    })->name('index');
    Route::resource('users', UserController::class)->middleware('role:admin');
    Route::resource('products', ProductController::class)->middleware('role:admin');
    Route::resource('outlets', OutletController::class)->middleware('role:admin');
    Route::resource('customers', CustomerController::class)->middleware('role:admin,kasir');
    Route::resource('transactions', TransactionController::class)->middleware('role:admin,kasir');
    Route::put('transactions/{id}/pickup', [TransactionController::class, 'pickup'])->name('transactions.pickup')->middleware('role:admin,kasir');
    Route::resource('outlets', OutletController::class)->only(['index','show'])->middleware('role:admin,kasir');
    Route::resource('histories', HistoryController::class)->only(['index'])->middleware('role:admin');

    Route::post('logout',[AuthController::class, 'logout'])->name('auth.logout');
});
