<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class CommunityController extends Controller
{
    public function community(){
        $user_id = session()->get('user_id');
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($user_id . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $users = User::paginate(4);
        return view('backend.user.community',compact('users','qty'));
    }
}
