<?php

namespace Database\Seeders;

use App\Models\Profesi;
use Illuminate\Database\Seeder;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesiList = [
            'Mahasiswa',
            'Guru',
            'Dosen',
            'Dokter',
            'Perawat',
            'Advokat',
            'PNS',
            'Karyawan Swasta',
            'Wiraswasta',
            'Seniman',
            'Atlit',
            'Pengusaha',
            'Petani',
            'Nelayan',
            'Buruh',
            'Belum/Tidak Bekerja',
            'Lainnya',
        ];

        foreach ($profesiList as $nama) {
            Profesi::create([
                'nama' => $nama,
            ]);
        }
    }
}
