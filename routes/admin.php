<?php

use App\Http\Admin\Controllers\DashboardController;
use App\Http\Admin\Controllers\MemberController;
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
Route::group(['namespace' => 'App\Http\Admin\Controllers'],function () {
    Route::group(['prefix' => config('general.admin_dir'), 'middleware' => 'web'], function() {
        //dashboard
        Route::get('/', [DashboardController::class,'getIndex'])->name('dashboard-view');

        //member
        Route::get('/member', [MemberController::class,'getIndex'])->name('member-view');
        Route::post('/member', [MemberController::class,'postIndex']);

    });
});

