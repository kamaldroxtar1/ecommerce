<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\BannerApiController;
use App\Http\Controllers\Api\AttributeApiController;


use App\Http\Controllers\Api\JWTController;


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
Route::group(['middleware'=>'api'],function($router){
    Route::post('/register',[JWTController::class,'register']);
    Route::post('/login',[JWTController::class,'login']);
    Route::post('/logout',[JWTController::class,'logout']);
    Route::post('/profile',[JWTController::class,'profile']);
  }); 

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource("product",ProductApiController::class);
Route::apiResource("category",CategoryApiController::class);
Route::apiResource("contact",ContactApiController::class);
Route::apiResource("banner",BannerApiController::class);
Route::apiResource("attribute",AttributeApiController::class);
