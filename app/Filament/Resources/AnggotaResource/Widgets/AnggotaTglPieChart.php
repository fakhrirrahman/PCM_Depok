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
    $data = Anggota::selectRaw('FLOOR(YEAR(tanggal_lahir) / 10) * 10 AS dekade, COUNT(*) as total')
        ->groupBy('dekade')
        ->orderBy('dekade')
        ->pluck('total', 'dekade')
        ->toArray();

    // Format label jadi "2000 - 2009"
    $labels = [];
    foreach (array_keys($data) as $dekade) {
        $labels[] = $dekade . ' - ' . ($dekade + 9);
    }

    return [
        'datasets' => [
            [
                'label' => 'Jumlah Anggota',
                'data' => array_values($data),
                'hoverOffset' => 20,
                'borderWidth' => 1,
                'hoverBorderWidth' => 3,
            ],
        ],
        'labels' => $labels,
    ];
}

    protected function getType(): string
    {
        return 'pie';
    }
}
