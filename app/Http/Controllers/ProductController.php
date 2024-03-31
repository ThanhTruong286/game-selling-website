<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProduct($slug){
        $products = DB::table('products')->select('*')
        ->where('slug','like','%' . $slug . '%')
        ->get();
        return $products;
    }
}
