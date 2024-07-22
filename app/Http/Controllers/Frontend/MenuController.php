<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Services\Cbrs;

class MenuController extends Controller {
    public function index() {
        // Mengambil user_id dari pelanggan yang sedang diotentikasi
        $user_id = auth()->guard('pelanggan')->user()->user_id;
        // Menggunakan Eloquent untuk mendapatkan menu dari pelanggan berdasarkan ID pengguna
        $menus = Menu::where('user_id', $user_id)->get();
        // Mengembalikan view dengan menu yang didapat
        return view('menus.index', compact('menus'));
    }

    public function show(Menu $id) {
        $menu = Menu::find($id);//get one RESULT OBJECT 
        $result = Menu::where('user_id', auth()->guard('pelanggan')->user()->user_id)->get();//get allRESULT OBJECT
        $data = [];
        foreach ($result as $row) {
            // echo $row;
            $data[$row->id] = $this->pre_process($row->name . ' ' . $row->description);
        }
        $cbrs = new Cbrs();
        $cbrs->create_index($data);
        $cbrs->idf();
        $weights = $cbrs->weight(); 

        $r = $cbrs->similarity($id->id);
        arsort($r);

        $i=0;
        foreach($r as $k => $col){
            if($i==12){break;}
            $menus[$i] = Menu::where('id', $k)->limit(12)->get();
            $i++;
        }

        return view('menus.detail', compact('menu', 'menus'));
    }

    private function pre_process($str) {
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();

        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();

        $str = strtolower($str);
        $str = $stemmer->stem($str);
        $str = $stopword->remove($str);

        return $str;
    }
}
