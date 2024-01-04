<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


Route::get("/", [MessageController::class, "index"]);
Route::get("/message", [MessageController::class, "index"]);
Route::get("/message/{commentNo}/edit",[MessageController::class,"edit"]);
Route::post("/message/store",[MessageController::class,"store"]);
Route::put('/message/{commentNo}',[MessageController::class,"update"]);
Route::delete("/message/{commentNo}",[MessageController::class,"destroy"]);

