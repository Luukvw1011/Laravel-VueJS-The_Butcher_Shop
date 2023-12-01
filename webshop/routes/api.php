<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShoppingCartController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Response;   

Route::get('products/{type}', [ProductController::class, 'index']);

Route::get('shopping-cart/add/{product_id}/{quantity}', [ShoppingCartController::class, 'add']);
Route::get('shopping-cart/get/{user_id}', [ShoppingCartController::class, 'getProducts']);

Route::middleware('auth:sanctum')->get('/user/authenticate', function (Request $request) {
    $object = new stdClass();
    $object->name = $request->user()['full_name'];
    $object->email = $request->user()['email'];

    return $object;
});

Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);