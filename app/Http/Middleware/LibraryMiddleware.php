<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryMiddleware
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
        $product_id = $request->get("product_id");
        $user_id = Auth::user()->id;
        // dd($user_id);
        if(DB::table('library')->where('product_id',$product_id)->where('user_id',$user_id)->exists()){
            return $next($request);
        }
        return redirect()->route('profile')->with('error','Bạn Không Có Quyền Truy Cập Game');
    }
}
