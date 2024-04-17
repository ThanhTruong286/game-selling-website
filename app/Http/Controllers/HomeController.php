<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function returnViewHome(Request $request){
        $products = Product::all();
        $categories = Category::all();
        $a = Product::first();
        $product_categoryName = null;
        return view('home',['dataProduct' => $products,'dataCategory' => $categories,'product_category' => $product_categoryName]);
    }
    public function returnViewShop(){
        return view('shop');
    }
}
