<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Langganan;
use App\Models\PaketLangganan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanggananController extends Controller
{
    public function index()
    {
        $paketLangganan = PaketLangganan::all();
        return view('langganan.index', compact('paketLangganan'));
    }

    public function berlangganan(Request $request)
{
    // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        
        $user = User::find(Auth::guard('user')->id());
        
            $langganan = Langganan::create([
                'id_user' => $request->id_user,
                'id_paketlangganan' => $request->id_paketLangganan,
                'price' => $request->harga,
                'status' => '1',
                'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'end_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            
            // // Simpan ID order ke dalam array
            // $langgananIds[] = $langganan->id;

            

            // // Set your Merchant Server Key
            // \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            // \Midtrans\Config::$isProduction = false;
            // // Set sanitization on (default)
            // \Midtrans\Config::$isSanitized = true;
            // // Set 3DS transaction for credit card to true
            // \Midtrans\Config::$is3ds = true;

            // // Gunakan ID order terakhir dalam array sebagai referensi
            // $latestLanggananId = end($langgananIds);

            // $params = array(
            //     'transaction_details' => array(
            //         'order_id' => $latestLanggananId,
            //         'gross_amount' => $request->harga,
            //     ),
            //     'customer_details' => array(
            //         'first_name' => $user->nama_user,
            //         'email' => $user->email,
            //     ),
            // );
            // // dd($params);
            // $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('langganan.paymentLangganan');
        
}

}
