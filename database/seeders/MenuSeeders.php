<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeders extends Seeder
{
    public function run()
    {
        // Data Sebelumnya
        Menu::create([
            'name' => 'Teh',
            'description' => 'Deskripsi belum tersedia',
            'price' => 5000,
            'user_id' => 1,
            'image' => 'images/menu/teh.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Tubruk',
            'description' => 'Deskripsi belum tersedia',
            'price' => 5000,
            'user_id' => 1,
            'image' => 'images/menu/teh-tubruk.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Krampul',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/teh-krampul.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Lemon',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/teh-lemon.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Vanilla',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/teh-vanilla.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Jahe',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/teh-jahe.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Tarik',
            'description' => 'Deskripsi belum tersedia',
            'price' => 10000,
            'user_id' => 1,
            'image' => 'images/menu/teh-tarik.jpg'
        ]);

        Menu::create([
            'name' => 'Teh Leci',
            'description' => 'Deskripsi belum tersedia',
            'price' => 12000,
            'user_id' => 1,
            'image' => 'images/menu/teh-leci.jpg'
        ]);

        Menu::create([
            'name' => 'Jeruk Nipis',
            'description' => 'Deskripsi belum tersedia',
            'price' => 7000,
            'user_id' => 1,
            'image' => 'images/menu/jeruk-nipis.jpg'
        ]);

        Menu::create([
            'name' => 'Jeruk Peras',
            'description' => 'Deskripsi belum tersedia',
            'price' => 7000,
            'user_id' => 1,
            'image' => 'images/menu/jeruk-peras.jpg'
        ]);

        // Data Baru
        Menu::create([
            'name' => 'Kopi Sumatra Mandailing',
            'description' => 'Deskripsi belum tersedia',
            'price' => 12000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-sumatra-mandailing.jpg'
        ]);

        Menu::create([
            'name' => 'Kopi Jawa Arabika',
            'description' => 'Deskripsi belum tersedia',
            'price' => 12000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-jawa-arabika.jpg'
        ]);

        Menu::create([
            'name' => 'Kopi Klasik',
            'description' => 'Deskripsi belum tersedia',
            'price' => 11000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-klasik.jpg'
        ]);

        Menu::create([
            'name' => 'Kopi Tubruk Jinawi',
            'description' => 'Deskripsi belum tersedia',
            'price' => 9000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-tubruk-jinawi.jpg'
        ]);

        Menu::create([
            'name' => 'Kopi Tubruk',
            'description' => 'Deskripsi belum tersedia',
            'price' => 7000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-tubruk.jpg'
        ]);

        Menu::create([
            'name' => 'Kopi Tubruk Gula Aren',
            'description' => 'Deskripsi belum tersedia',
            'price' => 9000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-tubruk-gula-aren.jpg'
        ]);

        Menu::create([
            'name' => 'Kopi Susu Tubruk',
            'description' => 'Deskripsi belum tersedia',
            'price' => 1000,
            'user_id' => 1,
            'image' => 'images/menu/kopi-susu-tubruk.jpg'
        ]);

        Menu::create([
            'name' => 'Es Kopi Susu',
            'description' => 'Deskripsi belum tersedia',
            'price' => 17000,
            'user_id' => 1,
            'image' => 'images/menu/es-kopi-susu.jpg'
        ]);

        Menu::create([
            'name' => 'Es Kopsus Gula Aren',
            'description' => 'Deskripsi belum tersedia',
            'price' => 19000,
            'user_id' => 1,
            'image' => 'images/menu/es-kopsus-gula-aren.jpg'
        ]);

        Menu::create([
            'name' => 'Americano',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/americano.jpg'
        ]);

        Menu::create([
            'name' => 'Jus Alpukan',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/jus-alpukan.jpg'
        ]);

        Menu::create([
            'name' => 'Jus Strawberry',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/jus-strawberry.jpg'
        ]);

        Menu::create([
            'name' => 'Jus Pisang',
            'description' => 'Deskripsi belum tersedia',
            'price' => 12000,
            'user_id' => 1,
            'image' => 'images/menu/jus-pisang.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Jahe',
            'description' => 'Deskripsi belum tersedia',
            'price' => 6000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-jahe.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Jahe Susu',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-jahe-susu.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Tape',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-tape.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Uwuh',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-uwuh.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Secang',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-secang.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Sereh',
            'description' => 'Deskripsi belum tersedia',
            'price' => 8000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-sereh.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Seruni',
            'description' => 'Deskripsi belum tersedia',
            'price' => 9000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-seruni.jpg'
        ]);

        Menu::create([
            'name' => 'Wedang Tape Susu',
            'description' => 'Deskripsi belum tersedia',
            'price' => 11000,
            'user_id' => 1,
            'image' => 'images/menu/wedang-tape-susu.jpg'
        ]);

        Menu::create([
            'name' => 'Es Sirup',
            'description' => 'Deskripsi belum tersedia',
            'price' => 7000,
            'user_id' => 1,
            'image' => 'images/menu/es-sirup.jpg'
        ]);

        Menu::create([
            'name' => 'Susu Sirup',
            'description' => 'Deskripsi belum tersedia',
            'price' => 9000,
            'user_id' => 1,
            'image' => 'images/menu/susu-sirup.jpg'
        ]);

        Menu::create([
            'name' => 'Susu Putih',
            'description' => 'Deskripsi belum tersedia',
            'price' => 7000,
            'user_id' => 1,
            'image' => 'images/menu/susu-putih.jpg'
        ]);

        Menu::create([
            'name' => 'Susu Coklat',
            'description' => 'Deskripsi belum tersedia',
            'price' => 7000,
            'user_id' => 1,
            'image' => 'images/menu/susu-coklat.jpg'
        ]);

        Menu::create([
            'name' => 'Milo',
            'description' => 'Deskripsi belum tersedia',
            'price' => 11000,
            'user_id' => 1,
            'image' => 'images/menu/milo.jpg'
        ]);

        Menu::create([
            'name' => 'Cappuccino',
            'description' => 'Deskripsi belum tersedia',
            'price' => 11000,
            'user_id' => 1,
            'image' => 'images/menu/cappuccino.jpg'
        ]);

        Menu::create([
            'name' => 'Es Suklat Klasik',
            'description' => 'Deskripsi belum tersedia',
            'price' => 11000,
            'user_id' => 1,
            'image' => 'images/menu/es-suklat-klasik.jpg'
        ]);

        Menu::create([
            'name' => 'Soda Gembira',
            'description' => 'Deskripsi belum tersedia',
            'price' => 16000,
            'user_id' => 1,
            'image' => 'images/menu/soda-gembira.jpg'
        ]);

        Menu::create([
            'name' => 'Strawberry Blend',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/strawberry-blend.jpg'
        ]);

        Menu::create([
            'name' => 'Coklat Blend',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/coklat-blend.jpg'
        ]);

        Menu::create([
            'name' => 'Grape Blend',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/grape-blend.jpg'
        ]);

        Menu::create([
            'name' => 'Vanilla Blend',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/vanilla-blend.jpg'
        ]);

        Menu::create([
            'name' => 'Orange Squash',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/orange-squash.jpg'
        ]);

        Menu::create([
            'name' => 'Lime Squash',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/lime-squash.jpg'
        ]);

        Menu::create([
            'name' => 'Strawberry Squash',
            'description' => 'Deskripsi belum tersedia',
            'price' => 14000,
            'user_id' => 1,
            'image' => 'images/menu/lime-squash.jpg'
        ]);
    }
}
