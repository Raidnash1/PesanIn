<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            return redirect("cart/$request->id_menu");
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
        $carts = Cart::with(['Menu', 'Pelanggan'])->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();
        $order = Order::with(['Menu', 'Pelanggan'])->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();
        $pelanggan = Order::with(['Pelanggan'])->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();

        $totalHarga = $carts->sum(function ($cart) {
            return $cart->menu->price * $cart->quantity;
        });
        foreach ($carts as $menu) {
            DB::table('orders')->insert([
                'id_menu' => $menu->id_menu,
                'id_pelanggan' => $menu->id_pelanggan,
                'quantity' => $menu->quantity,
                'total_harga' => $totalHarga,
                'status' => 'pending',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            DB::table('carts')->where('id', $menu->id)->delete();
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            'customer_details' => array(
                'first_name' => $pelanggan->nama,
                'email' => $pelanggan->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.cart.index', [
            'order' => $order,
            'snapToken' => $snapToken,
        ]);
    }
}
