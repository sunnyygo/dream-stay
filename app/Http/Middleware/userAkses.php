<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userAkses
{
    /**
     * Menangani permintaan yang masuk.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            // Periksa apakah pengguna memiliki role yang sesuai
            if (Auth::user()->role == 'superadmin') {
                return $next($request); // Pengguna dengan role 'superadmin', lanjutkan
            }

            // Jika role tidak sesuai, arahkan ke halaman lain
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Jika pengguna tidak terautentikasi, arahkan ke login
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
    }
}
