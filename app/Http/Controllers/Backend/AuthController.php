<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    
    public function index(Request $request){
        if(Auth::id() > 0){
            return redirect()->route('home');
        }
        elseif(Auth::id() == null){
            return view('backend.auth.login');
        }
    }
    public function login(AuthRequest $request){//su dung auth request de format 
        // //luu tru thong tin vua nhap tren form
        $credentials = [
            'email' => $request->input('email'),
            'password'=> $request->input('password')
        ];
        //check thong tin

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('login-success', 'Đăng nhập thành công');//gui session login-success len trang home
        }
        else {
            return redirect()->route('auth.index')->with('error','Email hoặc mật khẩu không chính xác');
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.index')->with('logout-success','Đăng xuất thành công');//gui session logout-success len trang auth.index
    }
}