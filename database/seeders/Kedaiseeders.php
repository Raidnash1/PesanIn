<?php

namespace Database\Seeders;

use App\Models\Kedai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Kedaiseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kedai::create([
            'nama_kedai' => 'PesanIn',
            'nama_pemilik' => 'raid',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 1,
            'alamat' => 'Jogja',
            'telepon' => '0812456',
        ]);
    }
}
