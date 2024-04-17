<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function returnViewHome(Request $request){
        //lay ra san pham duoc dang tai duoi 7 ngay va tong gio choi >=1000 gio va sap xep theo created_at
        $products = Product::whereRaw("DATEDIFF('" . now() . "',created_at) <= 7")->where('total_play_time','>=',1000)->orderBy("created_at","asc")->paginate(4);
        $most_play = Product::where('total_play_time','>=',100000)->orderBy('total_play_time','desc')->paginate(10);
        $categories = Category::all();
        return view('home',compact('products','categories','most_play'));
    }
    public function returnViewShop(){
        return view('shop');
    }
}
