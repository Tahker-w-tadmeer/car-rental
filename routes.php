<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegistrateController;
use App\Route;


Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [LoginController::class, "show"]);
Route::post("/login", [LoginController::class, "check"]);

Route::get("/registrate",[RegistrateController::class,"show"]);
Route::post("/registrate",[RegistrateController::class,"store"]);

Route::post("/logout", [LoginController::class, "logout"]);

//Route::get("/users/(\\d+)", [HomeController::class, "show"]);