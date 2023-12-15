<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShoppingCartController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SaleController;
use Illuminate\Http\Response;   

Route::get('products/{type}', [ProductController::class, 'index']);

Route::get('shopping-cart/add/{product_id}/{quantity}', [ShoppingCartController::class, 'add']);
Route::get('shopping-cart/get', [ShoppingCartController::class, 'getProducts']);
Route::get('shopping-cart/delete/{product_id}', [ShoppingCartController::class, 'deleteProduct']);

Route::middleware('auth:sanctum')->get('/user/authenticate', function (Request $request) {
    return $request->user();
});

Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);
Route::get('user/logout', [UserController::class, 'logout']);

Route::get('sale/get', [SaleController::class, 'getSaleProducts']);