<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

Route::get("/", [MessageController::class,"index"]);
Route::resource("/message", MessageController::class);

Route::get("login",[LoginController::class,"index"]);
Route::post("login",[LoginController::class,"authenticate"]);
Route::get("signup",[SignupController::class,"create"]);
Route::post("signup",[SignupController::class,"store"]);