<?php

namespace App\Http\Middleware;

use App\Models\Developers;
use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Route;


class DeveloperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
    
            // Check if the user has the required role
            if ($user->roles == 0 || $user->roles == 2) { // role 0 means admin, role 2 means developer
                // Admin users can proceed without further checks
                if ($user->roles == 0) {
                    return $next($request);
                }
                // Developer users need additional checks
                else if ($user->roles == 2) {
                    $company = Developers::where('user_id', $user->id)->value('id');
                    $product_id = $request->get('product_id');
    
                    // Check the current route name
                    $currentRouteName = Route::currentRouteName();
    
                    if ($currentRouteName == 'product.add.form' || $currentRouteName == 'developer.dashboard' || $currentRouteName == 'user.product') {
                        // Handle the add product form route case here if necessary
                        return $next($request);
                    }
    
                    // Check if the product belongs to the developer
                    if (Product::where('dev_id', $company)->where('id', $product_id)->exists()) {
                        return $next($request);
                    } else {
                        return redirect()->route('home')->with('error', 'Đâu Phải Sản Phẩm Thuộc Quyền Bạn'); // Not the developer's product
                    }
                }
            } else {
                return redirect()->route('home')->with('error', 'Bạn Không Phải Nhà Phát Triển'); // Not a developer or admin
            }
        }
    
        return redirect()->route('home')->with('error', 'Bạn Phải Đăng Nhập Để Sử Dụng Chức Năng Nhà Phát Triển'); // Not logged in
    }
}
