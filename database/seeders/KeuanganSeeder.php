<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keuangan;
use App\Models\Kategori;
use Carbon\Carbon;

class KeuanganSeeder extends Seeder
{
    public function run()
    {
        // Mapping nama kategori ke id kategori
        $kategoriMap = Kategori::pluck('id', 'nama')->toArray();

        $data = [
            // Saldo Awal
            [
                'tanggal_transaksi' => '2016-04-01',
                'tipe' => 'saldo',
                'kategori' => 'Saldo Awal',
                'jumlah' => 59346370,
                'saldo_awal' => 59346370
            ],

            // Pemasukan
            [
                'tanggal_transaksi' => '2016-04-03',
                'tipe' => 'pemasukan',
                'kategori' => 'Infaq',
                'jumlah' => 1235000
            ],
            [
                'tanggal_transaksi' => '2016-04-03',
                'tipe' => 'pemasukan',
                'kategori' => 'UIG dan UIS',
                'jumlah' => 3049200
            ],
            [
                'tanggal_transaksi' => '2016-04-03',
                'tipe' => 'pemasukan',
                'kategori' => 'UIG dan UIS',
                'jumlah' => 120876000
            ],

            // Pengeluaran
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 4824500
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 2121000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 600000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 3903700
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 2274000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Bantuan',
                'jumlah' => 850000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Pelatihan',
                'jumlah' => 3700000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Administrasi',
                'jumlah' => 1571000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Administrasi',
                'jumlah' => 639900
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Pelatihan',
                'jumlah' => 1000000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 1950000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 6712500
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 24000000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Perawatan dan Pemeliharaan',
                'jumlah' => 1050000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kegiatan',
                'jumlah' => 19893000
            ],
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Bantuan',
                'jumlah' => 5200000
            ],

            // Saldo Akhir
            [
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'saldo',
                'kategori' => 'Saldo Akhir',
                'jumlah' => 104216970,
                'saldo_akhir' => 104216970,
            ],
        ];

        foreach ($data as &$entry) {
            $entry['saldo_awal'] = $entry['saldo_awal'] ?? null;
            $entry['saldo_akhir'] = $entry['saldo_akhir'] ?? null;
            $entry['created_at'] = Carbon::now();
            $entry['updated_at'] = Carbon::now();
        }

        Keuangan::insert($data);
    }
}
