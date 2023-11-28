<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Mendapatkan path yang seharusnya pengguna tuju saat mereka tidak terautentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
    // protected function redirectTo($request)
    // {
    //     // Periksa jika pengguna tidak terautentikasi
    //     if (!$request->expectsJson() && !$request->user()) {
    //         return route('login'); // Redirect ke halaman login jika tidak terautentikasi
    //     }

    //     // Periksa jika pengguna memiliki peran yang diperlukan
    //     $requiredRole = $this->getRequiredRole($request);
    //     if ($requiredRole && !$request->user()->hasRole($requiredRole)) {
    //         // Redirect ke halaman atau rute tidak diizinkan kustom
    //         return route('unauthorized');
    //     }

    //     // return null; // Jika semuanya baik, kembalikan null
    // }

    // /**
    //  * Dapatkan peran yang diperlukan dari rute atau null jika tidak ditentukan.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @return string|null
    //  */
    // private function getRequiredRole($request)
    // {
    //     $routeAction = $request->route()->getAction();

    //     return isset($routeAction['role']) ? $routeAction['role'] : null;
    // }
}
