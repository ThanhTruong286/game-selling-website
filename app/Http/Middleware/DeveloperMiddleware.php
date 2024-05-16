<?php

namespace App\Http\Middleware;

use App\Models\Developers;
use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Auth;

class DeveloperMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->roles == 2 || Auth::user()->roles == 0) {//role = 0 nghia la co quyen admin
                if(Auth::user()->roles == 0){
                    return $next($request);
                }
                else if(Auth::user()->roles == 2){
                    $company = Developers::where('user_id',session()->get('user_id'))->value('id');
                    $product_id = $request->get('product_id');
                    if(Product::where('dev_id',$company)->where('id',$product_id)->exists()){
                        return $next($request);
                    }
                    else{
                        return redirect()->route('home')->with('error', 'Đâu Phải Sản Phẩm Thuộc Quyền Bạn');//neu chua dang nhap thi tra ve trang home
                    }
                }
            } else {
                return redirect()->route('home')->with('error', 'Bạn Không Phải Nhà Phát Triển');//neu khong co quyen admin
            }
        }
        return redirect()->route('home')->with('error', 'Bạn Phải Đăng Nhập Để Sử Dụng Chức Năng Nhà Phát Triển');//neu chua dang nhap thi tra ve trang home
    }
}
