<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
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
Route::group(['namespace' => 'App\Http\Controllers\Admin'],function () {
    Route::group(['prefix' => config('general.admin_dir'), 'middleware' => 'web', 'as' => 'admin.'], function() {
        //dashboard
        Route::get('/', [DashboardController::class,'getIndex'])->name('dashboard-view');

        //login
        Route::get('/login', [LoginController::class,'getIndex'])->name('login');
        Route::post('/login', [LoginController::class,'getIndex']);

        Route::get('/forgot-passowrd', [LoginController::class,'getIndex'])->name('forgot-password');
        Route::post('/forgot-passowrd', [LoginController::class,'getIndex']);

        //users
        Route::get('/users', [UserController::class,'getIndex'])->name('users-view');
        Route::post('/users', [UserController::class,'postIndex']);

        //members
        Route::get('/member', [MemberController::class,'getIndex'])->name('members-view');
        Route::post('/member', [MemberController::class,'postIndex']);

    });
});

