<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Langganan;
use App\Models\PaketLangganan;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $paketLangganan = PaketLangganan::all();
        return view('welcome', compact('paketLangganan'));
    }

    public function inputLangganan()
{
    // Tambahkan logika jika diperlukan sebelum menampilkan halaman input langganan
    return view('nama_view_input_langganan'); // Gantilah 'nama_view_input_langganan' dengan nama view yang sesuai
}

}
