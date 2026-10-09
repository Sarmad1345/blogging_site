<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
