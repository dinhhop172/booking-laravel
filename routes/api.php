<?php

use App\Http\Controllers\api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('rooms', RoomController::class);
Route::get('test/{id}', [RoomController::class, 'test']);
// Route::post('rooms', [RoomController::class, 'store']);
// Route::get('room/{id}', [RoomController::class, 'show']);
// Route::put('room/{id}', [RoomController::class, 'update']);
// Route::delete('room/{id}', [RoomController::class, 'destroy']);
