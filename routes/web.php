<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportController;

Route::get("/", function () {
    return view("login");
})->name("login");

Route::post("/login-process", [UsersController::class, "login"]);
Route::get("/logout-process", [UsersController::class, "logout"]);

Route::middleware(["auth"])->group(function () {
    // Dashboard Routes
    Route::get("/dashboard", [DashboardController::class, "index"]);
    Route::get("/dashboard-carwash", [
        DashboardController::class,
        "indexcarwash",
    ]);

    // Menu Routes
    Route::get("/dishes", [MenuController::class, "index"]);
    Route::get("/menu-add", [MenuController::class, "viewadd"]);
    Route::post("/addMenu", [MenuController::class, "store"]);
    Route::get('/dishes/{id}/edit', [MenuController::class, 'edit']);
    Route::put('/dishes/{id}', [MenuController::class, 'update']);
    Route::delete('/menu-delete/{id}', [MenuController::class, 'destroy']);

    // Order Routes
    Route::get("/orders", [OrderController::class, "index"]);
    Route::post('/orders/store', [OrderController::class, 'store']);

    // User Routes
    Route::get('/users',           [UsersController::class, 'index']);
    Route::get('/users/create',    [UsersController::class, 'create']);
    Route::post('/users',          [UsersController::class, 'store']);
    Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
    Route::put('/users/{id}',      [UsersController::class, 'update']);
    Route::delete('/users/{id}',   [UsersController::class, 'destroy']);

    //Report Routes
    Route::get('/reports', [ReportController::class, 'index']);
});
