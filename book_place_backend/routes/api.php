<?php

use App\Http\Controllers\Api\v1\AdminController;
use App\Http\Controllers\Api\v1\AdminNotificationController;
use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\BookLoansController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\NotificationController;
use App\Models\Admin;
use App\Models\BookLoans;
use App\Models\Cart;
use App\Models\User;
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

Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\v1'], function(){
    Route::post('users/login', 'App\Http\Controllers\Api\v1\AuthController@user_login')->name('auth.user_login');
    Route::post('admin/login', 'App\Http\Controllers\Api\v1\AuthController@admin_login')->name('auth.admin_login');
});

Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\v1','middleware'=> 'auth:sanctum'], function(){

    Route::apiResource('admin', AdminController::class);    
    Route::apiResource('users', UserController::class);
    Route::apiResource('books', BookController::class);
    Route::apiResource('book-loans', BookLoansController::class);
    Route::apiResource('cart', CartController::class);
    Route::apiResource('notification', NotificationController::class);
    Route::apiResource('admin-notification', AdminNotificationController::class);
});
