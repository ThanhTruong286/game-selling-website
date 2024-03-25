<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function categories_product($slug = ''){
        $products = DB::table('products')->get();//truy van cach 2
        return $products;
    }
}
