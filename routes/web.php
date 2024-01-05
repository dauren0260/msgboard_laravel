<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

// resource註冊
Route::resource("/message", MessageController::class);