<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Developers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user_product(){
        $company = Developers::where('user_id',session()->get('user_id'))->value('id');
        $products = Product::where('dev_id',$company)->paginate(5);
        return view('backend.user.product.index',compact('products'));
    }
    public function dashboard(){
        $company = Developers::where('user_id',session()->get('user_id'))->value('id');
        $products = Product::where('dev_id',$company)->paginate(5);
        $template = 'backend.user.product.index';
        return view('backend.user.layout',compact('template','products'));
    }
    public function __construct(){

    }
    public function index(){
        $users = User::paginate(5);//lay ra 5 ban ghi
        $template = 'backend.dashboard.user.index';
        return view('backend.dashboard.layout',compact('template','users'));
    }
}
