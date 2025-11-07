<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login',[UserController::class,'login']);
Route::post('/registro',[UserController::class,'registro']);
Route::middleware('auth:sanctum')->post('logout',[UserController::class,'logout']);