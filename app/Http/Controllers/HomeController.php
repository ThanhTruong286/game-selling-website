<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($page = 'index'){
        return view('home');
    }
    public function getCategory(){
        $categories = Category::all();//lay tat ca cac bang trong models category
        return $categories;
    }
    public function getProduct(){
        $product = DB::table('products')->get();//lay du lieu tu bang products
        return $product;
    }
}
