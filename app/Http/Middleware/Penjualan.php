<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Penjualan
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
            if (Auth::user()->bagian == 'penjualan') {
                return $next($request);
            } else {
                return redirect('/');
            }
        } catch (Exception) {
            return redirect('login');
        }
    }
}
