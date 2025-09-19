<?php

use App\Models\Customer;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutletController;
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
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('outlets', OutletController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
    Route::put('transactions/{id}/pickup', [TransactionController::class, 'pickup'])->name('transactions.pickup');

    Route::post('logout',[AuthController::class, 'logout'])->name('auth.logout');
});
