<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'api','prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/me', [AuthController::class, 'me']);
    });

    Route::post('/users', [UserController::class, 'store'])->middleware('permission:store-users');
    Route::post('/users/{id}', [UserController::class, 'update'])->middleware('permission:store-users');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->middleware('permission:delete-users');
    Route::get('/users', [UserController::class, 'index'])->middleware('permission:list-users');
    Route::get('/users/{id}', [UserController::class, 'show'])->middleware('permission:show-users');
    Route::post('/users/{id}/address', [UserAddressController::class, 'store']);
});