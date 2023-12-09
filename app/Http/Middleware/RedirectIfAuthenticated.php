<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (auth()->user()->role) {
                    case 'client':
                        return redirect()->route('client.home');
                    case 'kasir':
                        return redirect()->route('order.index');
                    case 'manager':
                        return redirect()->route('manager.index');
                        // Add more roles as needed
                    default:
                        return redirect(RouteServiceProvider::HOME);
                        // return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}
