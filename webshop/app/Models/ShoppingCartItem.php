<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ShoppingCartItem extends Model
{
    protected $table = "cart";

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity', 
        'price',
    ];
}
