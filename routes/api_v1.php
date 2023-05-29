<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\UserController;
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

Route::get('check', function () {
    return 'OK lullen';
});

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->middleware('throttle:restrictRegisters');
    Route::post('login', [AuthController::class, 'auth']);
    Route::post('restore', [AuthController::class, 'restore'])->middleware('guest');
    Route::post('restore/conform', [AuthController::class, 'confirmRestoredPassword']);
});

Route::get('/reset-password/{token}', function ($token) {
    dd($token);
})->middleware('guest')->name('password.reset');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('departments', [DepartmentController::class, 'Departments']);
    Route::get('workers', [UserController::class, 'Workers']);
});

