<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddUsernameToPrefix
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = optional(auth()->user())->id;
        $request->attributes->add(['username' => $username]);

        return $next($request);
    }
}
