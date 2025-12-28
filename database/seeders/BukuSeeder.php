<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Buku::create([
                'judul'     => $faker->sentence(3),
                'penulis'   => $faker->name(),
                'penerbit'  => $faker->company(),
                'kategori'  => $faker->randomElement(['Fiksi', 'Non-Fiksi', 'Ilmiah', 'Biografi', 'Sejarah', 'Teknologi', 'Seni', 'Budaya', 'Agama', 'Anak-anak', 'Remaja']),
                'stok'      => $faker->numberBetween(1, 20),
                'gambar'    => 'default.jpg'
            ]);
        }
    }
}
