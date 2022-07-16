<?php

use App\Http\Controllers\Api\V1\AuthController;
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

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('restore-password', [AuthController::class, 'restorePassword']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
    Route::patch('user', [AuthController::class, 'userUpdate'])->middleware(['auth:sanctum']);
});

