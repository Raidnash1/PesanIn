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
            'name' => 'Gratis',
            'description' => 'Paket ini memberikan akses dasar secara gratis.',
            'price' => 0.00,
            'type' => 'free',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed paket berlangganan bulanan
        PaketLangganan::create([
            'name' => 'Bulanan',
            'description' => 'Paket ini memberikan akses penuh dengan berlangganan bulanan.',
            'price' => 19.99, // Gantilah dengan harga yang sesuai
            'type' => 'monthly',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan sebanyak paket berlangganan yang diperlukan
    }
};
