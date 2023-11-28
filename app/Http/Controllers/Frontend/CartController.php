<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        // $carts = Cart::with(['Menu', 'User'])->where('id_user', Auth::user()->id)
        //     ->get();
        // $carts = DB::table('carts')
        //     ->where('id_user', Auth::user()->id)
        //     ->get();
        // $subtotal = 0;
        // foreach ($carts as $cart) {
        //     $subtotal += $cart->menu->price * $cart->quantity;
        // }
        // return view('user.cart.index', [
        //     'carts' => $carts,
        //     'subtotal' => $subtotal,
        // ]);
        return view('user.cart.index');
    }
    public function addToCart(Request $request)
    {
        $itemExist = DB::table('carts')
            ->where('id_pelanggan', Auth::pelanggan()->id)
            ->where('id_menu', $request->id_menu)
            ->get();
        // var_dump(sizeof($itemExist));
        // exit;
        if (sizeof($itemExist)) {
            $count = $itemExist[0]->quantity + (int)$request->quantity;
            DB::table('carts')->where('id', $itemExist[0]->id)->update([
                'quantity' => $count,
            ]);
            return redirect("/products/show/$request->item_id");
        }
        DB::table('carts')->insert([
            'id' => $request->id,
            'id_pelanggan' => $request->id_pelanggan,
            'id_menu' => $request->id_menu,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect("/products/show/$request->id_menu");
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
        $menus = DB::table('carts')
            ->where('id_user', Auth::user()->id)
            ->get();

        foreach ($menus as $menu) {
            DB::table('orders')->insert([
                'id_menu' => $menu->id_menu,
                'id_user' => $menu->id_user,
                'quantity' => $menu->quantity,
                'status' => 'pending',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            DB::table('carts')->where('id', $menu->id)->delete();
        }

        return redirect("/cart");
    }
}
