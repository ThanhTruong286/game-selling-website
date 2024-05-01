<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function contact(Request $request){
        $user_id = session()->get("user_id");
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($user_id . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        return view("contact",compact("qty"));
    }
    public function session(){
        dd(session()->all());
    }
    public function search(Request $request){
        $search = $request->get("keyword");
        dd($search);
    }
    public function returnViewHome(Request $request){
        $user_id = session()->get("user_id");
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($user_id . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        //lay ra san pham duoc dang tai duoi 7 ngay va tong gio choi >=1000 gio va sap xep theo created_at
        $products = Product::whereRaw("DATEDIFF('" . now() . "',created_at) <= 7")->where('total_play_time','>=',1000)->orderBy("created_at","asc")->paginate(4);
        $most_play = Product::where('total_play_time','>=',100000)->orderBy('total_play_time','desc')->paginate(6);
        $categories = Category::paginate(3);
        return view('home',compact('products','categories','most_play','qty'));
    }
    public function returnViewShop(){
        return view('shop');
    }
}
