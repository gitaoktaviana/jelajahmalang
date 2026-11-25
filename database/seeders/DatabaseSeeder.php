<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin (GANTI password sebelum online)
        User::create([
            'name' => 'Admin JelajahMalang',
            'npm' => '0000000000',
            'email' => 'admin@jelajahmalang.test',
            'password' => 'admin12345',
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Kategori
        $categories = [];
        foreach (['Wisata Alam', 'Kuliner', 'Budaya', 'Taman Hiburan', 'Kafe'] as $name) {
            $categories[$name] = Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }

        // Destinasi contoh
        $destinations = [
            ['Wisata Alam', 'Coban Rondo', 'Pujon, Kab. Malang',
                'Air terjun di lereng pegunungan dengan udara sejuk dan hutan pinus di sekitarnya.'],
            ['Wisata Alam', 'Pantai Balekambang', 'Bantur, Kab. Malang',
                'Pantai berpasir dengan pura di pulau kecil yang terhubung jembatan.'],
            ['Taman Hiburan', 'Jatim Park 1', 'Kota Batu',
                'Taman rekreasi edukasi keluarga dengan wahana sains dan permainan.'],
            ['Taman Hiburan', 'Museum Angkut', 'Kota Batu',
                'Museum transportasi dengan koleksi kendaraan dan zona bertema berbagai negara.'],
            ['Budaya', 'Kampung Warna-Warni Jodipan', 'Kota Malang',
                'Perkampungan di tepi sungai yang dicat warna-warni dan jadi spot foto populer.'],
            ['Kuliner', 'Bakso President', 'Kota Malang',
                'Kuliner bakso legendaris khas Malang dengan beragam isian.'],
            ['Kuliner', 'Toko Oen', 'Kota Malang',
                'Kafe dan toko es krim bergaya kolonial yang sudah ada sejak lama.'],
        ];

        foreach ($destinations as [$cat, $name, $location, $desc]) {
            Destination::create([
                'category_id' => $categories[$cat]->id,
                'name' => $name,
                'slug' => Str::slug($name),
                'location' => $location,
                'description' => $desc,
            ]);
        }
    }
}