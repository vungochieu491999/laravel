<?php

use App\Http\Controllers\Theme\CategoryController;
use App\Http\Controllers\Theme\CommunityController;
use App\Http\Controllers\Theme\HomeController;
use App\Http\Controllers\Theme\LoginController;
use App\Http\Controllers\Theme\PostController;
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

Route::group(['middleware' =>'web', 'namespace' => 'App\Http\Controllers\Theme', 'as' => 'theme.'], function() {
    Route::get('/',[HomeController::class,'getIndex'])->name('home');

    Route::get('/about-us',[HomeController::class,'about'])->name('about');

    Route::get('/contact-us',[HomeController::class,'contact'])->name('contact');

    Route::get('/store',[HomeController::class,'store'])->name('store');

    Route::group(['prefix' =>'community'], function() {
        Route::get('/',[CommunityController::class,'getIndex'])->name('community');

        Route::get('/p/{id}',[PostController::class,'postsShow'])->name('posts');

        Route::get('/c/{id}',[CategoryController::class,'categoriesShow'])->name('categories');

    });

    //login route
    Route::get('/login',[LoginController::class,'getLogin'])->name('login');
    Route::post('/login',[LoginController::class,'postLogin']);

    Route::get('/forgot-password',[LoginController::class,'getForgotPassword'])->name('forgot-password');
    Route::post('/forgot-password',[LoginController::class,'postForgotPassword']);

    //register route
    Route::get('/register',[LoginController::class,'getRegister'])->name('register');
    Route::post('/register',[LoginController::class,'postRegister']);
});
