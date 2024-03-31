<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function add(){
        return view('categories.add');//tra ve view add
    }
    public function getCategories($slug = "index"){
        $categories = Category::all();//lay tat ca cac bang trong models category
        return view('home',['category' => $categories]);//tra ve view
    }
}
