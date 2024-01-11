<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\MemberController;

Route::get("/", [MessageController::class,"index"]);
Route::resource("/message", MessageController::class);

Route::get("login",[LoginController::class,"index"]);
Route::post("login",[LoginController::class,"authenticate"]);
Route::get("logout",[LoginController::class,"logout"]);
Route::get("signup",[SignupController::class,"create"]);
Route::post("signup",[SignupController::class,"store"]);
Route::get("memberCenter",[MemberController::class,"index"]);
Route::patch("memberCenter",[MemberController::class,"update"]);