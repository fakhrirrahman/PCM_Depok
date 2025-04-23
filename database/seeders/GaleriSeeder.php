<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        // Galeri pertama
        $galeri1 = Galeri::create([]);
        $this->addMediaIfExists($galeri1, 'images/1.jpg');

        // Galeri kedua
        $galeri2 = Galeri::create([]);
        $this->addMediaIfExists($galeri2, 'images/2.webp');

        // Galeri ketiga
        $galeri3 = Galeri::create([]);
        $this->addMediaIfExists($galeri3, 'images/3.webp');
    }

    /**
     * Menambahkan file media jika file-nya benar-benar ada dan belum ditambahkan.
     */
    private function addMediaIfExists(Galeri $galeri, string $relativePath)
    {
        $fullPath = public_path($relativePath);

        if (file_exists($fullPath)) {
            $alreadyExists = $galeri->media()->where('file_name', basename($relativePath))->exists();

            if (!$alreadyExists) {
                $galeri->addMedia($fullPath)
                    ->preservingOriginal() // jangan pindahkan file aslinya
                    ->toMediaCollection(Galeri::MEDIA_COLLECTION);
            }
        } else {
            echo "File tidak ditemukan: $fullPath\n";
        }
    }
}
