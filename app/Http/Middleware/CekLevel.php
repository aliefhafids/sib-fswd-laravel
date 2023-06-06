<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
       if (in_array($request->user()->level,$levels)){
           return $next($request);
       }
       
       if($request->user()->level == 'admin'){
           return redirect::to('dashboard');
       } elseif($request->user()->level == 'staff'){
        return redirect::to('dashboard');
       } elseif($request->user()->level == 'customer'){
        return redirect::to('dashboard');
       }
    }
}
