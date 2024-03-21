<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('store');
    }
    public function index(){
        return view('categories.index');
    }
}
