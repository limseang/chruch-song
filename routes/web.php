<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/',function() {
    return view('index');
});
Route::get('/sighup',function() {
    return view('sighup');
});

Route::get('/logein', [UserController::class, 'index']);// This will call the index method in UserController