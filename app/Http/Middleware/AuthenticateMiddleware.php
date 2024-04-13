<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //kiem tra dang nhap
        if(Auth::check()) {
            if(Auth::user()->roles == 0){//role = 0 nghia la co quyen admin
                return $next($request);
            }
            else{
                return redirect()->route('home')->with('error','Bạn Không Có Quyền Admin');//neu khong co quyen admin
            }
        }
        return redirect()->route('home')->with('error','Bạn Phải Đăng Nhập Để Sử Dụng Chức Năng Admin');//neu chua dang nhap thi tra ve trang home
    }
}
