<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function returnViewHome(){
        $products = Product::all();
        $categories = Category::all();
        return view('home',['dataProduct' => $products,'dataCategory' => $categories]);
    }
}
