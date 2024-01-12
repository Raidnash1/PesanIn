<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use App\Models\Langganan;
use App\Models\PaketLangganan;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $paketLangganan = PaketLangganan::all();
        $request->validate([
            'nama_user' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $user = [
        //     'nama_user' => $request->nama_user,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     // 'email_verified_at' => now(),
        //     // 'remember_token' => Str::random(10),
        //     'role' => $request->role

        // ];
        // return view('langganan.index', compact('user', 'paketLangganan'));


        $user = User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => $request->role

        ]);
        // return redirect('/login');
        event(new Registered($user));

        Auth::login($user);
        // Mengambil data user dari tabel user setelah dibuat
        $user = User::find($user->id);
        return view('langganan.index', compact('user', 'paketLangganan'));
    }

    public function berlanggananSucces(Request $request){
        $user = User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => $request->role
        ]);
        // return redirect('/login');
        event(new Registered($user));

        Auth::login($user);
        // Mengambil data user dari tabel user setelah dibuat
        $user = User::find($user->id);
        
        DB::table('langganans')->insert([
            'id_user' => $user->id_user,
            'id_paketlangganan' => $request->id_paketLangganan,
            'price' => $request->price,
            'status' => '1',
            'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'end_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect("/login");
    }

    public function kiwkiw(){
        $paketLangganan = PaketLangganan::all();
        return view('langganan.index', compact('paketLangganan'));
    }

}
