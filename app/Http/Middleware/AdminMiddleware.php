<?php

namespace App\Http\Middleware;
// namespace App\Http\Middleware\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        
if (Auth::check() && Auth::user()->users_type === 'admin') {
            return $next($request);
        }
return redirect('/')->with('error', 'Access denied. Admins only.');
    }
}
