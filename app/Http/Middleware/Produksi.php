<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Produksi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Auth::user()->bagian == 'produksi') {
                return $next($request);
            } else {
                return redirect('/');
            }
        } catch (Exception) {
            return redirect('login');
        }
        
    }
}
