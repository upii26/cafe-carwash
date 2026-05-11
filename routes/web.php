<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersControllers;

Route::get("/", function () {
    return view("login");
});

Route::get("/dashboard", [DashboardController::class, "index"]);

// Menu routes
Route::get("/dishes", [MenuController::class, "index"]);
Route::get("/menu-add", [MenuController::class, "viewadd"]);

// Order routes
Route::get("/orders", [OrderController::class, "index"]);

// User routes
Route::get("/users", [UsersControllers::class, "index"]);
