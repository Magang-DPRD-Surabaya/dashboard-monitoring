<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle request berdasarkan role
     */
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {

        /**
         * Cek apakah role user sesuai
         */
        if (auth()->user()->role != $role) {

            // Redirect jika role tidak sesuai
            return redirect('/dashboard')
                ->with('error', 'Akses ditolak');
        }

        return $next($request);
    }
}