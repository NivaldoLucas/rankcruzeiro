<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminNavigatorController;


Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [AdminCustomerController::class, 'login']);

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('customers', AdminCustomerController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('navigators', AdminNavigatorController::class);
});