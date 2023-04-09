<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Author
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * 
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role == '2'){
                return $next($request);
            }else{
                return response(['message' => 'You are not an author']);
            }
        }else{
            return response(['message' => 'Log In first']);
        }
        
    }
}