<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminController;


Route::get('/', [CustomerController::class, 'index']);


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('customers', AdminController::class);
});
