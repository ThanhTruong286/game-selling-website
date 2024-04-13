<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    
    public function index(Request $request){
        if(Auth::check()){
            return redirect()->route('home')->with('error','Bạn Đã Đăng Nhập');
        }
        elseif(!Auth::check()){
            return view('backend.auth.login');
        }
    }
    public function signup(Request $request){
        echo 1;die();
    }
    public function login(AuthRequest $request){//su dung auth request de format 
        // //luu tru thong tin vua nhap tren form
        $credentials = [
            'email' => $request->input('email'),
            'password'=> $request->input('password')
        ];
        //check thong tin
        if(Auth::attempt($credentials)){
            $user_name = DB::table('users')->where('email', $request->input('email'))->value('name');
            // dd($user_name);
            $request->session()->regenerate();
            return redirect()->route('home',['user_name' => $user_name])->with('success','Đăng Nhập Thành Công');
        }
        else {
            return redirect()->route('auth.index')->with('error','Đăng Nhập Thất Bại');
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success','Đăng xuất thành công');//gui session logout-success len trang auth.index
    }
}