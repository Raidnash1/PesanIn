<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil data pesanan dari database
        $orders['orders'] = Order::all();
        // Tampilkan view index_order dengan data pesanan
        return view('admin.pesanan.index', $orders);
    }
    public function pembayaran()
    {
        // Ambil data pesanan dari database
        // Ambil data pesanan dari database dengan status = 1
    $orders['orders'] = Order::where('status', 1)->get();
        // Tampilkan view index_order dengan data pesanan
        return view('admin.pesanan.index', $orders);
    }
    public function dimasak()
    {
        // Ambil data pesanan dari database
        // Ambil data pesanan dari database dengan status = 1
    $orders['orders'] = Order::where('status', 3)->get();
        // Tampilkan view index_order dengan data pesanan
        return view('admin.pesanan.index', $orders);
    }
    public function antri()
    {
        // Ambil data pesanan dari database
        $orders['orders'] = Order::where('status', 2)->get();
        // Tampilkan view index_order dengan data pesanan
        return view('admin.pesanan.index', $orders);
    }
    public function selesai()
    {
        // Ambil data pesanan dari database
        $orders['orders'] = Order::where('status', 4)->get();
        // Tampilkan view index_order dengan data pesanan
        return view('admin.pesanan.index', $orders);
    }
    public function updateStatus($orderId)
    {
        // Temukan pesanan berdasarkan ID
        $order = Order::find($orderId);

        // Periksa apakah pesanan ditemukan
        if (!$order) {
            // Tambahkan logika atau respons sesuai kebutuhan Anda
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }

        // Ambil status saat ini dan tambahkan 1
        $newStatus = $order->status + 1;

        // Update status pesanan
        $order->update(['status' => $newStatus]);

        // Tambahkan logika atau respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Status pesanan diperbarui');
    }
    public function dataAntrian()
    {
        echo json_encode(Order::where('status', '!=', 2)->get());
    }

    public function dataAntrianSelesai()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d', strtotime('today')) . " 00:00:00";
        echo json_encode(Order::where(["status" => 2, "tanggal >=" =>  $tanggal])->get());
    }

    public function proses(Request $request)
    {
        $id = $request->input("idTransaksi");
        $status = $request->input("statusTransaksi");
        $data = ["status" => $status + 1];
        if ($status == 0) {
            $data["idUser"] = session()->get('id');
            date_default_timezone_set("Asia/Jakarta");
            $data["tanggal"] = date('Y-m-d h:m:s', strtotime('today'));
        }

        Order::where('id', $id)->update($data);

        echo json_encode("");
    }

    public function rincianPesanan(Request $request)
    {
        $idAntrian = $request->input("idAntrian");

        $pesanan = Order::where("id", $idAntrian)->get();

        foreach ($pesanan as $key => $item) {
            $menu = Menu::where("id", $item["idMenu"])->first();
            $pesanan[$key]["nama"] = $menu["nama"];
            $pesanan[$key]["harga"] = $menu["harga"];
        }

        echo json_encode($pesanan);
    }
}
