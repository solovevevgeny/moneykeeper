<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

route::GET("operations", "App\Http\Controllers\OperationsController@index")->name('operations.index');
route::POST("operations", "App\Http\Controllers\OperationsController@store");

// route::PUT("operations", "App\Http\Controllers\OperationsController@update");
// route::DELETE("operations", "App\Http\Controllers\OperationsController@destroy");


route::get("accounts", "App\Http\Controllers\AccountsController@index")->name('accounts.index');