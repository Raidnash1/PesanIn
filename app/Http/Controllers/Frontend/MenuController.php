<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

// Mengambil user_id dari pelanggan yang sedang diotentikasi
$user_id = auth()->guard('pelanggan')->user()->user_id;

    // Menggunakan Eloquent untuk mendapatkan menu dari pelanggan berdasarkan ID pengguna
    $menus = Menu::where('user_id', $user_id)->get();

    // Mengembalikan view dengan menu yang didapat
    return view('menus.index', compact('menus'));
    }
    public function show(Menu $id)
    {
        $menus = Menu::find($id);
        return view('menus.detail', compact('menus'));
    }
}
