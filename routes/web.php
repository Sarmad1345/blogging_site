<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return redirect()->route('blogs.index');
});

Route::get('blogs/search', [BlogController::class, 'search'])->name('blogs.search');
Route::resource('blogs', BlogController::class);
