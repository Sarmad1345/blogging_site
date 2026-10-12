<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('blogs.index');
});
Route::prefix('blogs')->name('blogs.')->controller(BlogController::class)->group(function () {
    Route::get('search', 'search')->name('search');
    Route::get('trash', 'trash')->name('trash');
    Route::patch('{blog}/restore', 'restore')->name('restore')->withTrashed();
    Route::delete('{blog}/force', 'forceDelete')->name('force-delete')->withTrashed();
});

Route::resource('blogs', BlogController::class);

Route::view("navbar", "navbar");


Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'store'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
