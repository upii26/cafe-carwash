<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('login');
});

Route::get ('/orders', [OrdersController::class, 'index']);
Route::get ('/dashboard', [DashboardController::class, 'index']);