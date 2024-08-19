<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna terautentikasi atau tamu (guest)
        if (Auth::check() && in_array(Auth::user()->roleId, $roles)) {
            // Jika pengguna terautentikasi dan memiliki peran yang diizinkan, lanjutkan
            return $next($request);
        } elseif (!Auth::check()) {
            // Jika pengguna tamu, lanjutkan
            return $next($request);
        }

        // Jika pengguna terautentikasi tetapi tidak memiliki peran yang diizinkan, redirect
        return redirect('/redirect');
    }
}
