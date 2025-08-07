<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Models\Song;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/create', [UserController::class, 'create']);
Route::post('/songs/create ',[SongController::class, 'create']);
Route::get('/songs', [SongController::class, 'show']);
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');