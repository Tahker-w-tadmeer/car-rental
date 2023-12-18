<?php

use App\Controllers\HomeController;
use App\Route;


Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [HomeController::class, "login"]);

//Route::get("/users/(\\d+)", [HomeController::class, "show"]);