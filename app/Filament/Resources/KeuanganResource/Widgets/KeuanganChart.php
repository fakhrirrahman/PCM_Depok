<?php

namespace App\Filament\Resources\KeuanganResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Keuangan;

class KeuanganChart extends ChartWidget
{
    protected static ?string $heading = 'Perbandingan Pemasukan dan Pengeluaran per Kategori';

    protected function getData(): array
    {
        $pemasukanData = Keuangan::selectRaw("CONCAT(kategori, ' - Pemasukan') as nama_kategori, COUNT(*) as total")
            ->where('tipe', 'pemasukan')
            ->groupBy('kategori')
            ->pluck('total', 'nama_kategori')
            ->toArray();

        $pengeluaranData = Keuangan::selectRaw("CONCAT(kategori, ' - Pengeluaran') as nama_kategori, COUNT(*) as total")
            ->where('tipe', 'pengeluaran')
            ->groupBy('kategori')
            ->pluck('total', 'nama_kategori')
            ->toArray();

        $allData = array_merge($pemasukanData, $pengeluaranData);

        return [
            'datasets' => [
                [
                    'label' => 'Keuangan',
                    'data' => array_values($allData),
                    'backgroundColor' => $this->generateColorArray(count($allData)),
                ]
            ],
            'labels' => array_keys($allData),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // atau 'pie'
    }

    protected function getOptions(): ?array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                ],
                'tooltip' => [
                    'mode' => 'index',
                    'intersect' => false,
                ],
            ],
        ];
    }

    /**
     * Fungsi bantu untuk membuat array warna secara dinamis
     */
    protected function generateColorArray(int $count): array
    {
        $colors = [
            '#3366CC', '#DC3912', '#FF9900', '#109618', '#990099',
            '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395',
            '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300',
        ];

        // Ulangi jika warna kurang
        while (count($colors) < $count) {
            $colors = array_merge($colors, $colors);
        }

        return array_slice($colors, 0, $count);
    }
}
