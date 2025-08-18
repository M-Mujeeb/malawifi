<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('access_token')) {
            return redirect()->route('profiles.create');
        }

        return $next($request);
    }
}
