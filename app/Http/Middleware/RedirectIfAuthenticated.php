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
        // dd($guards);
        // return redirect(RouteServiceProvider::HOME);

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->is_admin == 1) {
                // return "--admin";
                return redirect()->route('admin');
            }elseif(Auth::guard($guard)->check() && Auth::user()->is_admin == 0){
                return redirect(RouteServiceProvider::HOME);
                    // return redirect()->route('home');
                    // return "--User";
            }else{
                // dd('sf');
                // return "--empty";
                // dd($next($request));
                return $next($request);
            }
        }
       
        // dd(Auth::check() && Auth::user()->is_admin==1);
        // return $next($request);
        // return redirect()->route('login');
    }
}
