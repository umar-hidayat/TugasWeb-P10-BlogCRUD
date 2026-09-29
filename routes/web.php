<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Resource route otomatis mencakup 7 method CRUD + Named Routes
Route::resource('posts', PostController::class);