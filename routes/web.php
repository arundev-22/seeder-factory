<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [StudentController::class, 'home'])->name('pages.index');
Route::post('/post', [StudentController::class, 'store'])->name('post.store');
Route::put('/post/{student}', [StudentController::class, 'update'])->name('post.update');
Route::delete('/post/{student}', [StudentController::class, 'destroy'])->name('post.destroy');
Route::get('/products', [StudentController::class, 'product'])->name('pages.product');