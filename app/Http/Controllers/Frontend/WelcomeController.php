<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\PaketLangganan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $paketLangganan = PaketLangganan::all(); // Ambil data paket langganan dari database
        return view('welcome', compact('paketLangganan'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
