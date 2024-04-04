<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index(Request $request){
        return view("backend/auth/login");
    }
    public function login(AuthRequest $request){//su dung auth request de format 
        //luu tru thong tin vua nhap tren form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //check thong tin
        if(Auth::attempt($credentials)){
            dd('thanh cong');
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công');
        }
        dd($credentials);
        return redirect()->route('auth.index')->with('error','Email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.index'))->with('success','Đăng xuất thành công');
    }
}