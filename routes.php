<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegistrateController;
use App\Route;


Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [LoginController::class, "show"]);
Route::post("/login", [LoginController::class, "store"]);
Route::get("/registrate",[RegistrateController::class,"show"]);
Route::post("/registrate",[RegistrateController::class,"store"]);

//Route::get("/users/(\\d+)", [HomeController::class, "show"]);