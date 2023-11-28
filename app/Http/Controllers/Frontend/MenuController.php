<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $menus = auth()->user()->menus;
        return view('menus.index', compact('menus'));
    }
    public function show(Menu $id)
    {
        $menus = Menu::find($id);
        return view('menus.detail', compact('menus'));
    }
}
