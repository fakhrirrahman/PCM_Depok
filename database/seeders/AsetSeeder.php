<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Sekolah
            ['KB ABA Pringwulung', 'Jl Pringwulung, Condongcatur, Depok, Sleman','1.png'],
            ['KB \'Aisyiyah Maguwoharjo', 'Jl Raya Pasekan, Setan, Maguwoharjo, Depok, Sleman','2.png'],
            ['KB \'Aisyiyah Perumnas', 'Jl Sambirejo, Gempol, Condongcatur, Depok, Sleman','3.png'],
            ['TK ABA Perumnas', 'Jl Sawo Kecik, Gempol, Condongcatur, Depok, Sleman','4.png'],
            ['TK ABA Karangmalang', 'Jl Lembah UGM, Karangmalang, Condongcatur, Depok, Sleman','5.png'],
            ['TK ABA Pringwulung', 'Jl Pringwulung, Condongcatur, Depok, Sleman'],
            ['TK ABA Kentungan', 'Jl Krakatau, Kolombo, Joho, Condongcatur, Depok, Sleman'],
            ['SD Muhammadiyah Condongcatur', 'Jl Perumnas, Ringroad Utara, Gorongan, Condongcatur, Depok, Sleman'],
            ['SD Muhammadiyah Condongcatur 2', 'Jl Rajawali, Demangan Baru, Mrican, Caturtunggal, Depok, Sleman'],
            ['SD Muhammadiyah Kayen', 'Gg Kemuning, Kayen, Condongcatur, Depok, Sleman'],
            ['SMP Muhammadiyah 1 Depok', 'Jl Raya Pasekan, Setan, Maguwoharjo, Depok, Sleman'],
            ['SMP Muhammadiyah 2 Depok', 'Jl Swadaya, Karangasem, Condongcatur, Depok, Sleman'],
            ['SMP Muhammadiyah 3 Depok', 'Jl Rajawali, Demangan Baru, Mrican, Caturtunggal, Depok, Sleman'],

            // Masjid
            ['Masjid Baiturrahman Pringgolayan', 'Jl Indraparasta, Pringgolayan, Condongcatur, Depok, Sleman'],
            ['Masjid Darussalam Pringwulung', 'Gg Merpati, Pringwulung, Condongcatur, Depok, Sleman'],
            ['Masjid Bakti Abdi Dabag', 'Jl Masjid, Dabag, Condongcatur, Depok, Sleman'],
            ['Masjid Al-Arqom Karangasem', 'Jl Swadaya, Karangasem, Condongcatur, Depok, Sleman'],
            ['Masjid Al-Mujahidin Karangasem', 'Jl Super Raya, Karangasem, Condongcatur, Depok, Sleman'],
            ['Masjid An-Nuur Perumnas', 'Jl Menur, Perumnas, Condongcatur, Depok, Sleman'],
            ['Masjid Al Amin Sambisari', 'Jl Agung Sedayu, Sambisari, Joho, Condongcatur, Depok, Sleman'],
            ['Masjid Nurul Hidayah Kayen', 'Gg Kemuning, Kayen, Condongcatur, Depok, Sleman'],
            ['Masjid Baiturrohim Kentungan', 'Gg Anjarmoro, Kentungan, Condongcatur, Depok, Sleman'],
            ['Masjid Raudhatul Jannah Gandok', 'Gg Ampel, Gandok, Condongcatur, Depok, Sleman'],
            ['Masjid Baiturrahmat Setan', 'Jl Raya Pasekan, Setan, Maguwoharjo, Depok, Sleman'],
            ['Masjid Ar-Rasyid Al-Amin Maguwo', 'Jl Raya Tajem, Depok, Maguwoharjo, Depok, Sleman'],
            ['Masjid Al-Qomar Gowok', 'Jl Nogomudo, Gowok, Caturtunggal, Depok, Sleman'],
            ['Masjid Al Fath Seturan', 'Perum APH, Seturan, Caturtunggal, Depok, Sleman'],
            ['Masjid Al Muttaqin Tawangsari', 'Tawangsari, Caturtunggal, Depok, Sleman'],
        ];

        foreach ($data as $item) {
            [$nama, $alamat, $gambar] = array_pad($item, 3, null); 

            $tipe = str_starts_with($nama, 'Masjid') ? 'Masjid' : 'Sekolah';

            $asset = Asset::create([
                'nama' => $nama,
                'alamat' => $alamat,
                'tipe' => $tipe,
                'status' => 'Wakaf',
            ]);

            if ($gambar) {
                $sourcePath = public_path("images/aset/{$gambar}");
                $tempDir = storage_path('app/temp');
                $copyPath = "{$tempDir}/{$gambar}";
            
                if (file_exists($sourcePath)) {
                    if (!file_exists($tempDir)) {
                        mkdir($tempDir, 0755, true);
                    }
                    copy($sourcePath, $copyPath);
                    $asset->addMedia($copyPath)
                        ->toMediaCollection(Asset::MEDIA_COLLECTION);
                }
            }
            
        }
    }
}
