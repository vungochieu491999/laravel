<?php

use App\Http\Controllers\Theme\CategoryController;
use App\Http\Controllers\Theme\CommunityController;
use App\Http\Controllers\Theme\HomeController;
use App\Http\Controllers\Theme\LoginController;
use App\Http\Controllers\Theme\PostController;
use App\Http\Controllers\Theme\RegisterController;
use App\Http\Controllers\Theme\TagController;
use App\Http\Controllers\Theme\UserController;
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

    Route::get('/about',[HomeController::class,'about'])->name('about');

    Route::get('/contact',[HomeController::class,'contact'])->name('contact');

    Route::get('/store',[HomeController::class,'store'])->name('store');

    Route::get('/user/profile/{username}',[UserController::class,'getProfile'])->name('user-profile');

    Route::group(['prefix' =>'community'], function() {
        Route::get('/',[CommunityController::class,'getIndex'])->name('community');

        Route::get('/p/{slug}',[PostController::class,'postShow'])->name('posts');

        Route::get('/c/{slug}',[CategoryController::class,'categoryShow'])->name('categories');

        Route::get('/tag/{slug}',[TagController::class,'postTag'])->name('post-tag');

        Route::get('/year/{year}',[CommunityController::class,'getTopicYear'])->name('community-year');

    });

    //login route
    Route::get('/login',[LoginController::class,'getLogin'])->name('login');
    Route::post('/login',[LoginController::class,'postLogin']);

    Route::get('/forgot-password',[LoginController::class,'getForgotPassword'])->name('forgot-password');
    Route::post('/forgot-password',[LoginController::class,'postForgotPassword']);

    //register route
    Route::get('/register',[RegisterController::class,'getRegister'])->name('register');
    Route::post('/register',[RegisterController::class,'postRegister']);
});
