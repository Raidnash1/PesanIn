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
                if ($order) {
                    // Lakukan logging atau dump untuk debugging
                    Log::info('Order found: '.$order);
                    
                    // Periksa status transaksi sebelum memperbarui
                    if ($request->transaction_status == 'capture') {
                        // Update status pesanan
                        $order->update(['status' => '2']);
                        Log::info('Order status updated to "2"');
                    } else {
                        Log::warning('Unexpected transaction status: '.$request->transaction_status);
                    }
                } else {
                    Log::warning('Order not found with ID: '.$request->order_id);
                }
            }
        }
    }
}
