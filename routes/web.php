<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


Route::get('/message', [MessageController::class, "index"]);
Route::get('/edit',[MessageController::class,'edit']);


