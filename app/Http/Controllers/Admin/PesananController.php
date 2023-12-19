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
        $orderModel = new Order();
        $orders['orders'] = $orderModel->get();
        

        // Tampilkan view index_order dengan data pesanan
        return view('admin.pesanan.index', $orders);
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
