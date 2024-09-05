<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;

Route::get("/", [MessageController::class, "index"])->middleware('auth');
Route::resource("/message", MessageController::class)->middleware('auth');

Route::get("login", [LoginController::class, "index"])->name("login");
Route::post("login", [LoginController::class, "authenticate"]);
Route::get("logout", [LoginController::class, "logout"]);
Route::get("signup", [SignupController::class, "create"]);
Route::post("signup", [SignupController::class, "store"]);


Route::get("user", [UserController::class, "index"])->middleware('auth');
Route::post("avatar", [UserController::class, "update"])->middleware('auth');

Route::get("changePassword", [UserController::class, "changePassword"])->middleware('auth');
Route::patch("changePassword", [UserController::class, "changePasswordUpdate"])->middleware('auth');
