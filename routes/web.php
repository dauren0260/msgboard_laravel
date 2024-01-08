<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

// resource註冊
Route::get("/", [MessageController::class,"index"]);
Route::resource("/message", MessageController::class);