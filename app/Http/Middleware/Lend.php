<?php

namespace App\Http\Middleware;

use Closure;

class Lend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        dd(\Auth::id());
        if(\Auth::id()!=null)
        {
            return $next($request);

        }else{
            return redirect('login')->withErrors("请先登陆");
        }
    }
}
