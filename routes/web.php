<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MypageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home/index');
});

Route::get('my-page/age', [MypageController::class, 'index'])->middleware('checkage');

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {

    Route::group(['prefix' => 'dashboards', 'as'=>'dashboards.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function () {
        Route::get('/', [RoomController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('index');
    });

});


Route::group(['prefix' => 'auth', 'as'=>'auth.'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('checkifauthenticated');
    Route::post('login', [LoginController::class, 'subLogin'])->name('sublogin');
    
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('subregister');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});