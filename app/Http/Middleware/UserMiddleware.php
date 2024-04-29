<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
        $user_id = Auth::user()->id;
        $user_library_id = $request->get('user_id');
        if($user_id == $user_library_id){
            return $next($request);
        }
        else{
            return redirect()->route('profile')->with('error','Bạn Không Có Quyền Truy Cập');
        }
    }
}
