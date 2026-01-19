<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $kategori = [
            'Teknologi',
            'Fiksi',
            'Ilmiah',
            'Motivasi',
            'Komik',
            'Sejarah',
            'Anak-anak',
            'Romantis'
        ];

        $penerbit = [
            'Gramedia Pustaka Utama',
            'Elex Media Komputindo',
            'Bentang Pustaka',
            'GagasMedia',
            'Mizan',
            'Erlangga',
            'Deepublish',
            'Bhuana Ilmu Populer',
            'Andi Publisher',
            'HarperCollins Indonesia',
            'Kepustakaan Populer Gramedia',
            'Pastel Books',
            'Loveable',
            'Bukune'
        ];

        // jumlah data
        for ($i = 1; $i <= 500; $i++) {

            Buku::create([
                'judul' => $faker->sentence(3),
                'penulis' => $faker->name,
                'penerbit' => $faker->randomElement($penerbit),
                'kategori' => $faker->randomElement($kategori),
                'harga' => $faker->numberBetween(3000, 15000),
                'stok' => $faker->numberBetween(1, 20),
                'deskripsi' => $faker->paragraph,
                'gambar' => 'default.jpg'
            ]);
        }
    }
}
