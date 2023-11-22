<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->role) {
            abort(403);
        }
        return $next($request);
        // // Ambil ID Kedai yang sudah login
        // $loggedInKedaiId = Auth::guard('kedai')->id();

        // // Ambil ID Kedai dari URL
        // $requestedKedaiId = $request->route('kedai');

        // // Periksa apakah Kedai yang sudah login sesuai dengan ID yang diminta
        // if ($loggedInKedaiId !== $requestedKedaiId) {
        //     abort(403, 'Unauthorized');
        // }

        // return $next($request);
    }
}
