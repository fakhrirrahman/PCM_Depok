<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Anggota;

class AnggotaProfesiPieChart extends ChartWidget
{
    protected static ?string $heading = 'Anggota Berdasarkan Profesi';

    protected function getData(): array
    {
        $data = Anggota::selectRaw('COUNT(*) as total, (SELECT nama FROM profesi WHERE profesi.id = anggota.profesi_id) as nama_profesi')
            ->groupBy('profesi_id')
            ->pluck('total', 'nama_profesi')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Total Anggota',
                    'data' => array_values($data),
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // pie chart
    }
}
