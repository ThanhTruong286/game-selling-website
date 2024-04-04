<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function __construct(){

    }
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('home',['dataProduct' => $products,'dataCategory' => $categories]);
    }
}
