<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {});
Route::get('v1/customer', [CustomerController::class, 'index']);
Route::get('v1/customer/{id}', [CustomerController::class, 'show']);
Route::post('v1/customer', [CustomerController::class, 'store']);
Route::put('v1/customer/{id}', [CustomerController::class, 'update']);
Route::delete('v1/customer/{id}', [CustomerController::class, 'destroy']);
//
Route::group(['middleware' => 'auth:api', 'prefix'=>'v1'], function ($router) {
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/{id}', [ProductController::class, 'show']);
    Route::post('product', [ProductController::class, 'store']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy']);
    //tes relasi antar tabel
    Route::get('producR', [ProductController::class, 'indexRelasi']);
    // untuk tabel Categories tanpa penggunaan resource
    Route::get('categorie', [CategorieController::class, 'index']);
    Route::get('categorie/{id}', [CategorieController::class, 'show']);
    Route::post('categorie', [CategorieController::class, 'store']);
    Route::put('categorie/{id}', [CategorieController::class, 'update']);
    Route::delete('categorie/{id}', [CategorieController::class, 'destroy']);
    //tes relasi antar tabel
    Route::get('categoriR', [CategorieController::class, 'indexRelasi']); 
});
//
Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

    Route::get('password',function(){
        return bcrypt('wisnu123');
    });
});
