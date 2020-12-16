<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::get('/user-profile', [AuthController::class, 'userProfile']);



Route::get('/products', [ProductsController::class, 'index']);
Route::post('/product/save', [ProductsController::class, 'productSave']);
Route::get('/product/{id}', [ProductsController::class, 'productShow']);
Route::put('/product/{id}', [ProductsController::class, 'productUpdate']);
Route::delete('/product/{id}', [ProductsController::class, 'productDelete']);