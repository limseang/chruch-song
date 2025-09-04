<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;
// Route::get('/',function() {
//     return view('index');
// });

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');// This will call the index method in UserController
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/signup', [UserController::class, 'signup'])->name('signup.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/upload_song', function () {
        return view('dashboard/upload_song');
    })->name('upload_song');

    Route::get('/',function(){
        return Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    });
    Route::get('/song_list', [SongController::class, 'showWeb'])->name('song_list');

    Route::post('/songs12', [SongController::class, 'store'])->name('songs.store');

    Route::get('/songs/{id}/edit', [SongController::class, 'edit'])->name('songs.edit');

    Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update');

    Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.delete');
});
