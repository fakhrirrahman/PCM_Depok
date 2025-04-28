<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemasukan = [
            'Infaq',
            'Iuran Anggota',
            'UIG dan UIS',
            'Bantuan Kegiatan',
            'Hibah',
            'Hasil Usaha',
            'Sponsor',
        ];

        $pengeluaran = [
            'Kegiatan',
            'Bantuan',
            'Pelatihan',
            'Perawatan dan Pemeliharaan',
            'Administrasi',
            'Sekretariat'
        ];

        $saldo = [
            'Saldo Awal',
            'Saldo Akhir',
        ];

        foreach ($pemasukan as $nama) {
            Kategori::create([
                'nama' => $nama,
                'jenis' => 'Pemasukan',
            ]);
        }
        foreach ($pengeluaran as $nama) {
            Kategori::create([
                'nama' => $nama,
                'jenis' => 'Pengeluaran',
            ]);
        }

        foreach ($saldo as $nama) {
            Kategori::create([
                'nama' => $nama,
                'jenis' => 'Saldo',
            ]);
        }
    }
}
