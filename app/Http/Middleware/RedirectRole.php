<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna sudah login dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika role tidak sesuai, tampilkan halaman 403 (Forbidden)
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
