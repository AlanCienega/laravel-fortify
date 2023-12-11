<?php

use App\Http\Controllers\{ImpersonateController, UserController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/impersonate/{user}', [ImpersonateController::class, 'impersonate']);
    Route::post('/stop-impersonating/{user}', [ImpersonateController::class, 'stopImpersonating']);
});
