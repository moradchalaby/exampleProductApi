<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::apiResource('products', \App\Http\Controllers\Product\ProductController::class);
});
