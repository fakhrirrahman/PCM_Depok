<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keuangan;
use Carbon\Carbon;
use Illuminate\Support\Str;

class KeuanganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-01',
                'tipe' => 'saldo',
                'kategori' => 'Saldo Awal',
                'jumlah' => 59346370,
                'saldo_awal' => 59346370
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-03',
                'tipe' => 'pemasukan',
                'kategori' => 'Infak Pengajian Ahad 3',
                'jumlah' => 1235000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-03',
                'tipe' => 'pemasukan',
                'kategori' => 'UIG, UIK',
                'jumlah' => 3049200
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-03',
                'tipe' => 'pemasukan',
                'kategori' => 'UIS',
                'jumlah' => 120876000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Rapat Rutin',
                'jumlah' => 4824500
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Pengajian Ahad 3',
                'jumlah' => 2121000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Pengajian PDM',
                'jumlah' => 600000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Pembinaan dan pengajian di AUM',
                'jumlah' => 3903700
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Muspimcab/Muspimsus',
                'jumlah' => 2274000
            ],


            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Bantuan Ortom, AUM dan Masjid',
                'jumlah' => 850000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Beasiswa',
                'jumlah' => 3700000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Kesekretariatan',
                'jumlah' => 1571000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Listrik',
                'jumlah' => 639900
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Bisaroh pemateri Pengajian / pelatihan',
                'jumlah' => 1000000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Longmarch Kokam',
                'jumlah' => 1950000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Pelantikan PCM',
                'jumlah' => 6712500
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Cetak kaos gebyar musycab',
                'jumlah' => 24000000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Perbaikan dan pemeliharaan inventaris',
                'jumlah' => 1050000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Setor Majelis Dikdas PCM (UIS SDM CC)',
                'jumlah' => 19893000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'pengeluaran',
                'kategori' => 'Majelis ZIS',
                'jumlah' => 5200000
            ],
            [
                'id' => strtolower((string) Str::ulid()),
                'tanggal_transaksi' => '2016-04-10',
                'tipe' => 'saldo',
                'kategori' => 'saldo akhir',
                'jumlah' => 104216970,
                'saldo_akhir' => 104216970,
            ],
        ];

        foreach ($data as &$entry) {
            $entry['saldo_awal'] = $entry['saldo_awal'] ?? null;
            $entry['saldo_akhir'] =  $entry['saldo_akhir'] ?? null;
            $entry['created_at'] = Carbon::now();
            $entry['updated_at'] = Carbon::now();
        }

        Keuangan::insert($data);
    }
}
