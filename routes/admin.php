<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
Route::group(['prefix' => env('ADMIN_DIR'), 'middleware' => ['web'], 'as' => 'admin.'], function() {
    Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

        //dashboard
        Route::get('/', [DashboardController::class,'getIndex']);
        Route::get('/dashboard', [DashboardController::class,'getIndex'])->name('dashboard-view');

        //users
        Route::get('/users', [UserController::class,'getIndex'])->name('users-view');
        Route::post('/users', [UserController::class,'postIndex']);

        //membership
        Route::get('/member', [MemberController::class,'getIndex'])->name('members-view');
        Route::post('/member', [MemberController::class,'postIndex']);

        //posts
        Route::get('/posts-view', [PostController::class,'getIndex'])->name('posts-view');
        Route::post('/posts-view', [PostController::class,'postIndex']);

        Route::get('/view-form:post', [PostController::class,'getIndex'])->name('posts-111');
        Route::post('/view-form:post', [PostController::class,'postIndex']);

        Route::post('/posts-add', [PostController::class,'addPost'])->name('posts-add');
        Route::get('/posts-add', [PostController::class,'addPost']);

        Route::get('/posts-edit/{slug}', [PostController::class,'getIndex'])->name('posts-edit');
        Route::post('/posts-edit/{slug}', [PostController::class,'postIndex']);

        Route::post('/posts-delete/{slug}', [PostController::class,'postDelete'])->name('posts-delete');

    });

    Route::group(['namespace' => 'App\Http\Controllers\Admin\Auth'], function () {

        //login
        Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class,'login']);

        Route::get('/forgot-password', [LoginController::class,'getIndex'])->name('forgot-password');
        Route::post('/forgot-password', [LoginController::class,'getIndex']);

        Route::get('/logout', [LoginController::class,'logout'])->name('logout');
    });
});

