<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FreezerController;
use App\Http\Controllers\Api\V1\FreezerItemController;
use App\Http\Controllers\Api\V1\LocationCityController;
use App\Http\Controllers\Api\V1\LocationCountryController;
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

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('restore-password', [AuthController::class, 'restorePassword'])
        ->name('restore-password');

    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware(['auth:sanctum'])
        ->name('logout');

    Route::patch('user', [AuthController::class, 'userUpdate'])
        ->middleware(['auth:sanctum'])
        ->name('user');
});

Route::group(['prefix' => 'locations', 'as' => 'locations.'], function () {
    Route::apiResource('countries', LocationCountryController::class)
        ->only(['index', 'show']);

    Route::apiResource('cities', LocationCityController::class)
        ->only(['index', 'show']);
});

Route::group(['prefix' => 'freezers', 'as' => 'freezers.'], function () {
    Route::apiResource('items', FreezerItemController::class)
        ->only(['index', 'show']);

    Route::get('/', [FreezerController::class, 'index'])
        ->name('index');

    Route::get('/{freezer}', [FreezerController::class, 'show'])
        ->name('show');
});
