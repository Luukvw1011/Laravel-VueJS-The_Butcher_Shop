<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function getSaleProducts() {
        return Sale::join('product', 'product.id', '=', 'sale.product_id')->get();
    }
}
