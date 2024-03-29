<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;

class PelangganAuthController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('guest:pelanggan');
    }

    protected function guard()
    {
        return Auth::guard('pelanggan');
    }

    public function create()
    {
        return view('auth.loginPelanggan');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(LoginRequest $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } elseif (Auth::guard('pelanggan')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user_id = auth()->guard('pelanggan')->user()->user_id;
        return redirect()->route('menus.index', ['user_id' => $user_id]);
        }

        return redirect()->route('pelanggan.login');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
