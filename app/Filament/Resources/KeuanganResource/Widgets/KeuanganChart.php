<?php

namespace App\Filament\Resources\KeuanganResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Keuangan;

class KeuanganChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Keuangan per Kategori';

   protected function getData(): array
{
    $pengeluaranData = Keuangan::selectRaw('kategori as nama_kategori, COUNT(*) as total')
        ->where('tipe', 'pengeluaran')
        ->groupBy('kategori')
        ->pluck('total', 'nama_kategori')
        ->toArray();

    $pemasukanData = Keuangan::selectRaw('kategori as nama_kategori, COUNT(*) as total')
        ->where('tipe', 'pemasukan')
        ->groupBy('kategori')
        ->pluck('total', 'nama_kategori')
        ->toArray();

    // Ambil semua kategori unik
    $allCategories = array_unique(array_merge(array_keys($pengeluaranData), array_keys($pemasukanData)));

    // Bangun ulang data sesuai kategori
    $pengeluaran = [];
    $pemasukan = [];

    foreach ($allCategories as $kategori) {
        $pemasukan[] = $pemasukanData[$kategori] ?? 0;
        $pengeluaran[] = $pengeluaranData[$kategori] ?? 0;
    }

    return [
        'datasets' => [
            [
                'label' => 'Pemasukan',
                'data' => $pemasukan,
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
            ],
            [
                'label' => 'Pengeluaran',
                'data' => $pengeluaran,
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 1,
            ]
        ],
        'labels' => $allCategories,
    ];
}


    protected function getType(): string
    {
        return 'bar'; 
    }
}
