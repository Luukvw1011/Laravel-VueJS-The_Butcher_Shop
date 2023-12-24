<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\SaleController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($type) {
        $products = Product::where('type', $type)->where(
            [
                ['stock', '>', 0],
                ['on_sale', '=', 0]
            ])->get();
            
        $on_sale_products = SaleController::getSaleProducts();

        $on_sale_products = $on_sale_products->filter(function ($item) use ($type) {
            return ucfirst($type) === $item->type;
        })->values();

        return response()->json([
            'products' => $products,
            'sale' => $on_sale_products,
        ]);
    }
}
