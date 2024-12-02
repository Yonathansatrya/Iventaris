<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jabatan
{
    public function handle(Request $request, Closure $next, $position)
    {
        if (Auth::check() && Auth::user()->position === $position) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
