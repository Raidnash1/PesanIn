<?php

namespace Database\Seeders;

use App\Models\PaketLangganan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Paketseeders extends Seeder
{
    public function run()
    {
        // Seed paket berlangganan gratis
        PaketLangganan::create([
            'nama_paket' => 'Silver',
            'description' => 'Paket ini memberikan akses dasar .',
            'price' => 10000,
            'type' => 'Silver',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed paket berlangganan bulanan
        PaketLangganan::create([
            'nama_paket' => 'Gold',
            'description' => 'Paket ini memberikan akses penuh.',
            'price' => 20000, // Gantilah dengan harga yang sesuai
            'type' => 'Gold',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan sebanyak paket berlangganan yang diperlukan
    }
};
