<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\SongApiController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/create', [UserController::class, 'create']);
Route::post('/songs/create ', [SongController::class, 'create']);

Route::middleware('auth:sanctum')->get('/songs', [SongApiController::class, 'getSongs']);

Route::post('/signup', [UserController::class, 'apiSignup']);
Route::post('/login', [UserController::class, 'apiLogin']);
Route::post('/logout', [UserController::class, 'apiLogout'])->middleware('auth:sanctum');
