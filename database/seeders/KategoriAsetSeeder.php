<?php

namespace Database\Seeders;

use App\Models\KategoriAset;
use Illuminate\Database\Seeder;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'Wakaf',
            'Hibah',
            'Pembelian Aset'
        ];

        $jenis = [
            'Sekolah',
            'Masjid',
            'Tanah',
            'Rumah Sakit',
            'Klinik',
            'Panti Asuhan',
            'Perguruan Tinggi',
            'Gedung Serba Guna',
            'Kendaraan',
            'Lainnya',
        ];

        foreach ($jenis as $itemJenis) {
            foreach ($status as $itemStatus) {
                KategoriAset::create([
                    'jenis' => $itemJenis, 
                    'status' => $itemStatus,  
                ]);
            }
        }
    }
}
