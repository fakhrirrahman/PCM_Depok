<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $galeri1 = Galeri::create([]);
        $this->addMediaIfExists($galeri1, 'Company/assets/img/1.jpg');

        $galeri2 = Galeri::create([]);
        $this->addMediaIfExists($galeri2, 'Company/assets/img/2.webp');

        $galeri3 = Galeri::create([]);
        $this->addMediaIfExists($galeri3, 'Company/assets/img/3.webp');
    }

 
    private function addMediaIfExists(Galeri $galeri, string $relativePath)
    {
        $fullPath = public_path($relativePath);

        if (file_exists($fullPath)) {
            $alreadyExists = $galeri->media()->where('file_name', basename($relativePath))->exists();

            if (!$alreadyExists) {
                $galeri->addMedia($fullPath)
                    ->preservingOriginal() 
                    ->toMediaCollection(Galeri::MEDIA_COLLECTION);
            }
        } else {
            echo "File tidak ditemukan: $fullPath\n";
        }
    }
}
