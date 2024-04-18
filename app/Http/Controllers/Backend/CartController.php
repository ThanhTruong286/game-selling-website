<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }
    public function add($product_id)
    {
        $product = Product::find($product_id);
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $product_id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];
        session()->put('cart', $cart);
        return redirect()->route('home')->with('success', 'Product has been added to cart!');
        } 
        if (isset($cart[$product_id])) {

            $cart[$product_id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$product_id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];
        session()->put('cart', $cart);
        return redirect()->route('home')->with('success', 'Product has been added to cart!');
    }
    public function show_cart(){
        dd(session()->get('cart',[]));
    }
}
