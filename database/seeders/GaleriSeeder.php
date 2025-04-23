<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Galeri pertama
        $galeri1 = Galeri::create([
            // Tambahkan kolom lain yang dibutuhkan di sini
        ]);
        $galeri1->addMedia(public_path('Company/assets/img/1.jpg')) // Gambar lokal
                 ->toMediaCollection(Galeri::MEDIA_COLLECTION);

        // Galeri kedua
        $galeri2 = Galeri::create([
            // Tambahkan kolom lain yang dibutuhkan di sini
        ]);
        $galeri2->addMedia(public_path('Company/assets/img/2.webp')) // Gambar lokal
                 ->toMediaCollection(Galeri::MEDIA_COLLECTION);

        // Galeri ketiga
        $galeri3 = Galeri::create([
            // Tambahkan kolom lain yang dibutuhkan di sini
        ]);
        $galeri3->addMedia(public_path('Company/assets/img/3.webp')) // Gambar lokal
                 ->toMediaCollection(Galeri::MEDIA_COLLECTION);
    }
}
