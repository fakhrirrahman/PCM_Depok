<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Anggota;

class AnggotaTahunLineChart extends ChartWidget
{
    protected static ?string $heading = 'Pertumbuhan Anggota per Tahun';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Anggota::selectRaw('tahun_pembuatan, COUNT(*) as total')
            ->groupBy('tahun_pembuatan')
            ->orderBy('tahun_pembuatan')
            ->pluck('total', 'tahun_pembuatan');

        return [
            'datasets' => [
    [
            'label' => 'Jumlah Anggota',
            'data' => $data->values(),
            'borderColor' => '#10b981',
            'backgroundColor' => '#10b981',
            'fill' => false,
            'tension' => 0.3, // agar garis lebih halus
            'pointRadius' => 4,
            'pointHoverRadius' => 6,
        ],
    ],

            'labels' => $data->keys(),
        ];
    }

   

    protected function getType(): string
    {
        return 'line';
    }
}
