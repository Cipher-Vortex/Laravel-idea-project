<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class , 'view']);
    Route::post('/login', [AuthController::class, 'login']);

    
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
  
});
Route::get('/hello', function () {
    return view('hello');
});
Route::post('/logout', [AuthController::class, 'logout']);
