<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function trending(Request $request){
        $template = "backend.category.trending";
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session("cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session('cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $product = Product::whereRaw("DATEDIFF('" . now() . "',created_at) <= 7")->where('total_play_time','>=',1000)->orderBy("created_at","asc")->paginate(4);
        $categories = DB::table("categories")->get();
        $count = count($product);
        return view("backend.category.layout",compact("product",'categories','qty','count','template'));
    }
    public function index(Request $request){
        $template = "backend.category.index";
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session("cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session('cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $product = Product::where('slug','like','%' . $request->get('name') . '%')->paginate(8);
        $categories = DB::table("categories")->get();
        $count = count($product);
        return view("backend.category.layout",compact("product",'categories','qty','count','template'));
    }
}
