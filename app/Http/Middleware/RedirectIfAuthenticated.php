<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'efector' :
              if (Auth::guard($guard)->check()) {
                  return redirect()->route('efector.home');
              }
              break;
            case 'prodiaba' :
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('prodiaba.home');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('medico.home');
                }
                break;
        }
        return $next($request);
    }
}
