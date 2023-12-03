<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;   

class ShoppingCartController extends Controller
{
    public function add($product_id, $quantity) {
        $this->checkExistingProduct($product_id, $quantity);
    }

    public function checkExistingProduct($product_id, $quantity) {
        $existingProduct = ShoppingCartItem::where("product_id", $product_id)->get();

        if ($existingProduct->isEmpty()) {
            $this->addNewProduct($product_id, $quantity);
        } else {
            $this->addExistingProduct($product_id, $quantity);
        }
    }

    public function addNewProduct($product_id, $quantity) {
        Product::where("id", $product_id)->decrement('stock', $quantity);

        return ShoppingCartItem::create([
            'user_id' => Auth::user()['id'],
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => 2
        ]);
    } 

    public function addExistingProduct($product_id, $quantity) {
        ShoppingCartItem::where(
            [
                "product_id" => $product_id,
                "user_id" => Auth::user()['id']
            ])
            ->increment('quantity', $quantity);

        Product::where("id", $product_id)->decrement('stock', $quantity);
    }

    public function getProducts() {
        $cart_product_objs = ShoppingCartItem::select("product_id", "quantity")->where("user_id", Auth::user()['id'])->get();
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

    public function deleteProduct($product_id) {
        //This function needs to be optimized. 
        $quantity = ShoppingCartItem::where([
            "product_id" => 1,
            "user_id" => 11
        ])->pluck("quantity")->first();

        Product::where("id", $product_id)->increment('stock', $quantity);

        return ShoppingCartItem::where([
            "product_id" => $product_id,
            "user_id" => Auth::user()['id']
        ])->forceDelete();
    }
}
