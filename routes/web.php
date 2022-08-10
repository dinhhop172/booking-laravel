<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\auth\FaceBookController;
use App\Http\Controllers\auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\auth\VerifyController;
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

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'checklogin'], function () {

    Route::group(['prefix' => 'dashboards', 'as'=>'dashboards.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');
        Route::get('/create', [AccountController::class, 'create'])->name('create');
        Route::get('/edit', [AccountController::class, 'edit'])->name('edit');
        Route::get('/destroy', [AccountController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function () { 
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::get('/create', [RoomController::class, 'create'])->name('create');
        Route::get('/edit', [RoomController::class, 'edit'])->name('edit');
        Route::get('/destroy', [RoomController::class, 'destroy'])->name('destroy');
    });
    
    Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        // Route::get('/create', [BookingController::class, 'create'])->name('create')->middleware('haspermission:booking-create');
        Route::get('/edit', [BookingController::class, 'edit'])->name('edit');
        Route::get('/destroy', [BookingController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('edit');
        Route::post('store', [PermissionController::class, 'store'])->name('store');
        Route::get('destroy', [PermissionController::class, 'destroy'])->name('destroy');
        Route::post('add-show-list/{id}', [PermissionController::class, 'addShowList'])->name('add-list-booking');
        Route::post('add-edit-list/{id}', [PermissionController::class, 'addEditList'])->name('add-edit-booking');
    });

});


Route::group(['prefix' => 'auth', 'as'=>'auth.'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('checkifauthenticated');
    Route::post('login', [LoginController::class, 'subLogin'])->name('sublogin');
    
    Route::get('verify-admin', [VerifyController::class, 'index'])->name('view-verify-admin')->middleware('checkverify');
    Route::post('verify-admin', [VerifyController::class, 'verify_admin'])->name('verify-admin');

    Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('checkifauthenticated');
    Route::post('register', [RegisterController::class, 'store'])->name('subregister');

    
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('actived-user/{account}/{token}', [VerifyController::class, 'verify_user'])->name('actived-user');
Route::get('test/{account}/{token}', [VerifyController::class, 'test'])->name('test-user');

// Route::get('/redirect/{social}', [FacebookController::class, 'redirect'])->name('facebook.redirect');
// Route::get('/callback/{social}', [FacebookController::class, 'callback']);

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginUsingGoogle'])->name('login');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('testa', [VerifyController::class, 'testa']);