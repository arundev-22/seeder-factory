<?php

use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'home'])->name('index');