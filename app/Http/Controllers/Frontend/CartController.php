<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Langganan; 
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['Menu', 'Pelanggan'])->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();
        $subtotal = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart->price * $cart->quantity;
        }
        $totalHarga = $carts->sum(function ($cart) {
            return $cart->menu->price * $cart->quantity;
        });
        
        return view('user.cart.index', [
            'carts' => $carts,
            'subtotal' => $subtotal,
            'totalHarga' => $totalHarga,
        ]);
    }
    
    public function addToCart(Request $request)
    {
        if (Auth::guard('pelanggan')->check()) {
            $itemExist = DB::table('carts')
                ->where('id_pelanggan', Auth::guard('pelanggan')->id())
                ->where('id_menu', $request->id_menu)
                ->get();

            if (sizeof($itemExist)) {
                $count = $itemExist[0]->quantity + (int)$request->quantity;
                DB::table('carts')->where('id', $itemExist[0]->id)->update([
                    'quantity' => $count,
                ]);
                return redirect("cart/$request->id_menu");
            }

            DB::table('carts')->insert([
                'id_pelanggan' => Auth::guard('pelanggan')->id(),
                'id_menu' => $request->id_menu,
                'quantity' => $request->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back();
            // return redirect("cart/$request->id_menu");
        } else {
            // Pengguna belum login, arahkan ke halaman login
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan ke keranjang.');
        }
    }

    public function updateCart(Request $request)
    {
        $menu = DB::table('carts')
            ->where('id_user', Auth::user()->id)
            ->where('id_menu', $request->id_menu)
            ->get();
        $count = (int)$request->quantity;
        if (!isset($request->minus) && !isset($request->plus)) {
            $count += 1;
        }
        if (sizeof($menu)) {
            DB::table('carts')->where('id', $menu[0]->id)->update([
                'quantity' => $count,
            ]);
            return redirect("/cart");
        }
        return redirect("/cart");
    }

    public function checkout()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        $carts = Cart::with(['Menu', 'Pelanggan'])->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();

        $pelanggan = Pelanggan::find(Auth::guard('pelanggan')->id());
        $totalHarga = $carts->sum(function ($cart) {
            return $cart->menu->price * $cart->quantity;
        });
        
        foreach ($carts as $menu) {
            $order = Order::create([
                'id_menu' => $menu->id_menu,
                'id_pelanggan' => $menu->id_pelanggan,
                'quantity' => $menu->quantity,
                'total_harga' => $totalHarga,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            
            // Simpan ID order ke dalam array
            $orderIds[] = $order->id;

            DB::table('carts')->where('id', $menu->id)->delete();

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            // Gunakan ID order terakhir dalam array sebagai referensi
            $latestOrderId = end($orderIds);

            $params = array(
                'transaction_details' => array(
                    'order_id' => $latestOrderId,
                    'gross_amount' => $totalHarga,
                ),
                'customer_details' => array(
                    'first_name' => $pelanggan->nama,
                    'email' => $pelanggan->email,
                ),
            );
            // dd($params);
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('user.orders.index', compact('snapToken', 'params', 'carts'));
        }
    }
    
    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' ){
                $order = Order::find($request->order_id);
                        $order->update(['status' => '2']);
                }
            }
        
    }
    public function berlangganan(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key2');
            
            // $user = User::find(Auth::guard('user')->id());

            $user = [
                'id_paketLangganan' => $request->id_paketLangganan,
                'nama_paket' => $request->nama_paket,
                'price' => $request->price,
                'nama_user' => $request->nama_user,
                'email' => $request->email,
                'password' => $request->password,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role' => $request->role
            ];
            $langganan = Langganan::create([
                'user_id' => $request->user_id,
                    'paket_langganan_id' => $request->id_paketLangganan,
                    'status' => '1',
                    'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
                    'end_date' => Carbon::now()->format('Y-m-d H:i:s'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
                // DB::table('langganans')->insert([
                //     'id_user' => $request->id_user,
                //     'id_paketlangganan' => $request->id_paketLangganan,
                //     'price' => $request->harga,
                //     'status' => '1',
                //     'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'end_date' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                // ]);
                
                // Simpan ID order ke dalam array
                $langgananIds[] = $langganan->id;
    
                // Membaca tabel "langganan" dan mendapatkan ID terbesar
                $maxId = Langganan::max('id');
                // Menginkremen ID terbesar untuk membuat ID baru
                $newId = $maxId + 1;
    
                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('midtrans.server_key2');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;
    
                // Gunakan ID order terakhir dalam array sebagai referensi
                $latestLanggananId = $langganan->id;
    
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $latestLanggananId,
                        'gross_amount' => $request->price,
                    ),
                    'customer_details' => array(
                        'first_name' => $user['nama_user'],
                        'email' => $user['email'],
                    ),
                );
                // dd($params);
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('langganan.paymentLangganan', compact('snapToken', 'params', 'user') );
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
    public function callback2(Request $request){
        $serverKey = config('midtrans.server_key2');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' ){
                $langganan = Langganan::find($request->order_id);
                        $langganan->update(['status' => '2']);
                }
            }
        
    }
}
