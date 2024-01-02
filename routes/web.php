<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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
    Route::get("/profile",[ProfileController::class,"show"])->name("profile");
    Route::get("report", [ReportController::class, "show"])->name("reports");
    Route::get("/rentals", [DashboardController::class, "rentals"])->name("rentals");
});

Route::middleware(["auth", "admin"])->group(function () {
    Route::get("/users", [UserController::class, "index"])->name("users.index");
    Route::get("/users/{user}", [UserController::class, "show"])->name("users.show");
    Route::get("/payment", [ReportController::class, "payments"])->name("payments");
    Route::get("/status", [ReportController::class, "status"])->name("status");
});

