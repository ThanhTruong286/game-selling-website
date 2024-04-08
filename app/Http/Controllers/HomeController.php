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
        $product_categoryName = Product::find(1)->Category->name;//lay ra name cua bang categories thong qua phuong thuc Category trong Models Product
        return view('home',['dataProduct' => $products,'dataCategory' => $categories,'product_category' => $product_categoryName]);
    }
    public function returnViewShop(){
        return view('shop');
    }
}
