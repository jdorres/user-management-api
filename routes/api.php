<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//pessoas não logadas
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

//pessoas logadas
Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/me', [AuthController::class, 'me']);
    });

    Route::group(['prefix' => 'auth'], function ($router) {
        Route::get('/users', [UserController::class, 'index'])->middleware('list-users');
        Route::post('/users', [UserController::class, 'store'])->middleware('store-users');
        Route::get('/users/{id}', [UserController::class, 'show'])->middleware('show-users');
        Route::post('/users/{id}', [UserController::class, 'update'])->middleware('update-users');
        Route::delete('/users/{id}', [UserController::class, 'delete'])->middleware('delete-users');
        Route::post('/users/{id}/address', [UserAddressController::class, 'store']);
    });
});