<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueryController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['middleware' => 'auth:sanctum'], function (){
//     //require tokens
//     Route::get('/products',[ProductController::class, 'getProduct']);
//     Route::post('/products/create',[ProductController::class, 'storeProduct']);
// });

Route::post("login",[UserController::class, 'index']);
Route::get('/category',[CategoryController::class, 'index']);
Route::get('/get_products',[HomeController::class, 'get_products']);
Route::get('/get_sub_products/{slug}',[HomeController::class, 'get_sub_category']);
Route::get('/steps/{category}/{subcategory?}',[HomeController::class, 'steps']);
Route::get('/shipping/{zone}',[HomeController::class, 'shipping']);
Route::get('/price/{category}',[HomeController::class, 'price']);
Route::post('/query',[QueryController::class,'query_table']);  
Route::post('/order',[QueryController::class,'order']);  
Route::post('/order/preview',[QueryController::class,'preview']);

