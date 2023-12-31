<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProfileController;


Route::get("/", HomeController::class)->name("home");

Route::get("/login", [LoginController::class, "show"])->name("login");
Route::post("/login", [LoginController::class, "check"]);

Route::get("/register", [RegistrationController::class, "show"])->name("register");
Route::post("/register", [RegistrationController::class, "store"]);

Route::post("/logout", [LoginController::class, "logout"]);

Route::middleware(["auth"])->group(function () {
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");

    Route::resource("cars", CarController::class);
    Route::post("cars/{car}/rent", [CarController::class, "rent"])->name("cars.rent");
    Route::patch("cars/{car}/status", [CarController::class, "status"])->name("cars.status");
    Route::get("/profile",[ProfileController::class,"show"]);
});

