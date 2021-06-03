<?php

use App\Http\Controllers\Theme\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Theme Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'getIndex'])->name('theme.home');

Route::get('/posts/{id}',[HomeController::class,'postsShow'])->name('theme.post');

Route::get('/categories/{id}',[HomeController::class,'categoriesShow'])->name('theme.category');
// Route::get('/',[HomeController::class,'getIndex'])->name('theme.home');