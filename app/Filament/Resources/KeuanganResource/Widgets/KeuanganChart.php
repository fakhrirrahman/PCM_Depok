<?php

namespace App\Filament\Resources\KeuanganResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Keuangan;

class KeuanganChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Keuangan per Kategori';

    protected function getData(): array
    {
        // Ambil data pengeluaran
        $pengeluaranData = Keuangan::selectRaw('kategori as nama_kategori, COUNT(*) as total')
            ->where('tipe', 'pengeluaran')  // Filter berdasarkan tipe pengeluaran
            ->groupBy('kategori')
            ->pluck('total', 'nama_kategori')
            ->toArray();
        
        // Ambil data pemasukan
        $pemasukanData = Keuangan::selectRaw('kategori as nama_kategori, COUNT(*) as total')
            ->where('tipe', 'pemasukan')  // Filter berdasarkan tipe pemasukan
            ->groupBy('kategori')
            ->pluck('total', 'nama_kategori')
            ->toArray();

        // Gabungkan data pemasukan dan pengeluaran
        $mergedData = array_merge($pengeluaranData, $pemasukanData);

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => array_values($pemasukanData),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)', // Warna untuk pemasukan
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => array_values($pengeluaranData),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Warna untuk pengeluaran
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ]
            ],
            'labels' => array_keys($mergedData), // Gabungkan kategori
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Gunakan chart tipe bar
    }
}
