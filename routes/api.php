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

route::POST("operations", "App\Http\Controllers\OperationsController@create")->name('operations.store');          // create
route::PUT("operations/{id}", "App\Http\Controllers\OperationsController@update")->name('operations.update');    // update
route::GET("operations", "App\Http\Controllers\OperationsController@index")->name('operations.index');           // read list 
route::DELETE("operations/{id}", "App\Http\Controllers\OperationsController@delete")->name('operations.delete'); // delete
route::GET("operations/{id}", "App\Http\Controllers\OperationsController@show");                                 // show current

route::get("accounts", "App\Http\Controllers\AccountsController@index")->name('accounts.index');                 // list
route::post("accounts", "App\Http\Controllers\AccountsController@store")->name("accounts.create");               // create
