<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user sudah login dan merupakan admin
        if(auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Jika user bukan admin, tampilkan alert dan redirect
        Alert::toast('Kamu bukan admin', 'error');
        return redirect('/');  // Redirect ke halaman utama atau halaman login
    }
}
