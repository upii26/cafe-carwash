<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersControllers;

Route::get("/", function () {
    return view("login");
})->name("login");

Route::post("/login-process", [UsersControllers::class, "login"]);
Route::get("/logout-process", [UsersControllers::class, "logout"]);

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
    Route::delete('/menu-delete/{id}', [MenuController::class, 'destroy']);

    // Order Routes
    Route::get("/orders", [OrderController::class, "index"]);

    // User Routes
    Route::get("/users", [UsersControllers::class, "index"]);
});
