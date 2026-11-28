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
            ['Wisata Alam', 'Coban Rondo', 'Jl. Coban Rondo No. 30, Pujon, Kab. Malang',
                'Air terjun di lereng pegunungan dengan udara sejuk dan hutan pinus di sekitarnya.'],
            ['Wisata Alam', 'Pantai Balekambang', 'Jl. Bale kambang, Bantur, Kab. Malang',
                'Pantai berpasir dengan pura di pulau kecil yang terhubung jembatan.'],
            ['Taman Hiburan', 'Jatim Park 1', 'Jl. Dewi Sartika Atas No. 2, Kota Batu',
                'Taman rekreasi edukasi keluarga dengan wahana sains dan permainan.'],
            ['Taman Hiburan', 'Museum Angkut', 'Jl. Terusan Sultan Agung No. 2, Kota Batu',
                'Museum transportasi dengan koleksi kendaraan dan zona bertema berbagai negara.'],
            ['Budaya', 'Kampung Warna-Warni Jodipan', 'Jl. Ir. H. Juanda Gang 1 (RT 07/RT 09, RW 02), Kota Malang',
                'Perkampungan di tepi sungai yang dicat warna-warni dan jadi spot foto populer.'],
            ['Kuliner', 'Bakso President', 'Jl. Batanghari No. 3-5, Kota Malang',
                'Kuliner bakso legendaris khas Malang dengan beragam isian.'],
            ['Kuliner', 'Toko Oen', 'Jl. Jenderal Basuki Rahmat No. 5, Kota Malang',
                'Kafe dan toko es krim bergaya kolonial yang sudah ada sejak lama.'],
            ['Kafe', 'Lafayette Coffee & Eatery', 'Jl. Semeru No. 2, Klojen, Kota Malang',
                'Kafe ikonik di kawasan Kayutangan dengan fasad bangunan kolonial Belanda tahun 1940-an dan area rooftop yang luas. Menu yang disajikan sangat beragam, mulai dari kopi spesialti hingga hidangan berat seperti Nasi Rawon dan Grill Salmon.'],
            ['Kafe', 'OURA - Coffee & Dining', 'Jl. Pahlawan Trip No. A11, Klojen, Kota Malang',
                'Kafe modern yang mengusung konsep modern Asian dengan interior mewah, hangat, dan sering menampilkan live acoustic. Tempat ini terkenal dengan hidangan utamanya seperti 18 Hours Smoked Brisket serta sajian tiramisu-nya yang lembut dan manis.'],
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