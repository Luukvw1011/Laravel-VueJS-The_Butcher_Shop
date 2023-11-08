<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShoppingCartController;

Route::get('products/{type}', [ProductController::class, 'index']);
Route::get('shopping-cart/add/{product_id}/{quantity}', [ShoppingCartController::class, 'add']);
Route::get('shopping-cart/get/{user_id}', [ShoppingCartController::class, 'getProducts']);