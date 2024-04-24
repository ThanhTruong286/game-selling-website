<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function delete($product_id){
        $user_id = session()->get('user_id');
        $cart = session()->get($user_id . 'cart');

        if(!$cart) {
            return redirect()->route('show.cart')->with('error', 'Giỏ Hàng Không Tồn Tại');
        }
        foreach($cart as $key => $value){
            if ($value['id'] == $product_id) {
                // dd($cart);
                unset($cart[$key]);//xoa phan tu thu key trong mang session cart
                session()->put($user_id . 'cart',$cart);//day lai du lieu session user id cart bang cart moi
                return redirect()->route('show.cart')->with('success', 'Xoá Sản Phẩm Thành Công');
            }
        }
        return redirect()->route('show.cart')->with('error', 'Xoá Sản Phẩm Thất Bại');
    }
    public function updateCart(Request $request)
    {
        $user_id = session()->get('user_id');
        if($request->id && $request->quantity){
            $cart = session()->get($user_id . 'cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put($user_id . 'cart', $cart);
            session()->flash('success', 'Product added to cart.');
        }
    }
    public function add($product_id)
    {
        $user_id = session()->get('user_id');
        $product = Product::find($product_id);
        $cart = session()->get($user_id . 'cart');
        if(!$cart) {
            $cart = [
                $product_id => [
                    'id' => $product_id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->image,
                    'description'=> $product->description,
                ]
        ];
        session()->put($user_id . 'cart', $cart);
        return redirect()->route('show.cart')->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng');
        } 
        if (isset($cart[$product_id])) {

            // $cart[$product_id]['quantity']++;

            // session()->put('cart', $cart);

            return redirect()->route('show.cart')->with('error', 'Sản Phẩm Đã Có Trong Giỏ Hàng');
        }

        $cart[$product_id] = [
            'id' => $product_id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->image,
            'description'=> $product->description
        ];
        session()->put($user_id . 'cart', $cart);
        return redirect()->route('show.cart')->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng');
    }
    public function show_cart(){
        $template = 'backend.cart.payment';
        $user = session()->get('user');
        $user_id = session()->get('user_id');
        $result = json_decode($user, true);//Để conver giá trị chỉ định thành định dạng JSON,
        foreach($result as $key => $value) {
            $provine = $value['province'];
            $user_image = $value['image'];
        }
        $cart = session()->get($user_id . 'cart');
        $totalPrice = 0;
        // dd($cart);
        if($cart){
            foreach ($cart as $key => $value) {
                $totalPrice += $value['price'];
            }
        }
        $totalProduct = 0;
        if($cart){
            $totalProduct = count($cart);
        }
        // dd($cart);
        return view('backend.cart.index',compact('cart','template','totalPrice','totalProduct','user_image'));
    }
}
