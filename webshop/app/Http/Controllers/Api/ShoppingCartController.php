<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCartItem;

class ShoppingCartController extends Controller
{
    public function add($product_id, $quantity) {
        //test value
        $user_id = 0;
        
        $this->checkExistingProduct($product_id, $quantity, $user_id);
    }

    public function checkExistingProduct($product_id, $quantity, $user_id) {
        $existingProduct = ShoppingCartItem::where("product_id", $product_id)->get();

        if ($existingProduct->isEmpty()) {
            $this->addNewProduct($product_id, $quantity, $user_id);
        } else {
            $this->addExistingProduct($product_id, $quantity, $user_id);
        }
    }

    public function addNewProduct($product_id, $quantity, $user_id) {
        Product::where("id", $product_id)->decrement('stock', $quantity);

        return ShoppingCartItem::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => 2
        ]);
    } 

    public function addExistingProduct($product_id, $quantity, $user_id) {
        ShoppingCartItem::where("product_id", $product_id)->increment('quantity', $quantity);
        Product::where("id", $product_id)->decrement('stock', $quantity);
    }

    public function getProducts($user_id) {
        $cart_product_objs = ShoppingCartItem::select("product_id", "quantity")->where("user_id", $user_id)->get();
        $cart_products = [];

        foreach($cart_product_objs as $object) {
            $product = Product::where("id", $object->product_id)->get();;

            $product->map(function ($item) use ($object) {
                $item['quantity'] = $object->quantity;
                return $item;
            });

            array_push($cart_products, $product);
        }

        return $cart_products;
    }
}
