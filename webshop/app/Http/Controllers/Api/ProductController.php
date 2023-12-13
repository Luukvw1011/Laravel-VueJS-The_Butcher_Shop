<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($type) {
        return Product::where('type', $type)->where(
            [
                ['stock', '>', 0],
                ['on_sale', '=', 0]
            ])->get();
    }
}
