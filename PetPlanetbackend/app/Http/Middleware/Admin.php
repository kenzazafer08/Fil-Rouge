<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role !== '1') {
        return response()->json(['message' => 'Unauthorized'], 401);
       } else  return $next($request);
    }
}
