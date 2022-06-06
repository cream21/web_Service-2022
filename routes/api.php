<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {});
Route::get('v1/customer', [CustomerController::class, 'index']);
Route::get('v1/customer/{id}', [CustomerController::class, 'show']);
Route::post('v1/customer', [CustomerController::class, 'store']);
Route::put('v1/customer/{id}', [CustomerController::class, 'update']);
Route::delete('v1/customer/{id}', [CustomerController::class, 'destroy']);

Route::get('v1/product', [ProductController::class, 'index']);
Route::get('v1/product/{id}', [ProductController::class, 'show']);
Route::post('v1/product', [ProductController::class, 'store']);
Route::put('v1/product/{id}', [ProductController::class, 'update']);
Route::delete('v1/product/{id}', [ProductController::class, 'destroy']);
