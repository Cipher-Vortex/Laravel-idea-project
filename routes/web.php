<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});
Route::get('/hello', function () {
    // return view('hello');
    return 'Hello';
});


//  APIdog Endpoint
Route::get('/api/ideas', [IdeaController::class, 'api']);

Route::middleware('auth')->group(function () {

    // Route::get('/hello', function () {
    //     return view('hello');
    //     });
    Route::get('/ideas', [IdeaController::class, 'index']);

    // create new idea
    Route::get('/create/new', [IdeaController::class, 'create']);
    Route::post('/ideas/create', [IdeaController::class, 'store']);

    // View Idea
    Route::get('/ideas/view/{idea}', [IdeaController::class, 'show'])->name('ideas.view');

    // edit
    Route::get('/ideas/edit/{idea}', [IdeaController::class, 'edit'])->name('ideas.edit');

    // update
    Route::patch('/ideas/edit/{idea}', [IdeaController::class, 'update'])->name('ideas.update');

    // Delete Idea
    Route::delete('/ideas/delete/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'view'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

});
Route::middleware('auth')->group(function () {});
Route::post('/logout', [AuthController::class, 'logout']);
