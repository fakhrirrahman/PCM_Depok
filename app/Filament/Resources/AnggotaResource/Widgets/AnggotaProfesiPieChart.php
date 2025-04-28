<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Anggota;

class AnggotaProfesiPieChart extends ChartWidget
{
    protected static ?string $heading = 'Anggota Berdasarkan Profesi';

    protected function getData(): array
    {
        $data = Anggota::selectRaw('profesi as nama_profesi, COUNT(*) as total')
        ->groupBy('profesi')
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
        return 'bar'; 
    }
}
