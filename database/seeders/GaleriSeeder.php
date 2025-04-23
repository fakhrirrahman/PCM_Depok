<?php
namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $galeri1 = Galeri::create([
        ]);
        
        $this->addMediaIfNotExists($galeri1, 'Company/assets/img/1.jpg');

        // Galeri kedua
        $galeri2 = Galeri::create([
            // Kolom lain yang dibutuhkan di sini
        ]);
        
        $this->addMediaIfNotExists($galeri2, 'Company/assets/img/2.webp');

        // Galeri ketiga
        $galeri3 = Galeri::create([
            // Kolom lain yang dibutuhkan di sini
        ]);
        
        $this->addMediaIfNotExists($galeri3, 'Company/assets/img/3.webp');
    }

    /**
     * Menambahkan media ke koleksi jika belum ada.
     *
     * @param \App\Models\Galeri $galeri
     * @param string $path
     */
    private function addMediaIfNotExists(Galeri $galeri, string $path)
    {
        // Cek apakah media sudah ada
        $exists = $galeri->media()->where('file_name', basename($path))->exists();

        if (!$exists) {
            $galeri->addMedia(public_path($path)) // Gambar lokal
                   ->toMediaCollection(Galeri::MEDIA_COLLECTION);
        }
    }
}
