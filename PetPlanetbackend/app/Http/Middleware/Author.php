<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Author
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role == '0') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}