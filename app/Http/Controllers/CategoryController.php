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
    public function index(){
        $categories = Category::all();//lay tat ca cac bang trong models category
        return view('categories.index',['category' => $categories]);
    }
    public function getCategories(){
        $categories = DB::table('categories');
        $categories = $categories->get();
        return view('categories.test',['categories' => $categories]);
    }
    public function test(){
        $categories = DB::table('categories');//tro den bang categories trong database
        $categories = $categories->get();//select * from categories
        return view('categories.index',['category' => $categories]);//tra ve view index, tao bien category co du lieu la * trong categories
    }
}
