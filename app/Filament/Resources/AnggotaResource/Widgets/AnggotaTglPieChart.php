<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Anggota;

class AnggotaTglPieChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Tanggal Lahir Anggota (Berdasarkan Tahun)';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = Anggota::selectRaw('YEAR(tanggal_lahir) as tahun, COUNT(*) as total')
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->pluck('total', 'tahun')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anggota',
                    'data' => array_values($data),
                    // Gunakan warna bawaan Chart.js
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
