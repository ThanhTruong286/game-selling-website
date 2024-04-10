<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(5);//lay ra 5 ban ghi
        $product_category = Product::find(1)->Category->name;
        $template = "backend.dashboard.product.index";
        return view("backend.dashboard.layout",compact("template","products","product_category"));
    }
}
