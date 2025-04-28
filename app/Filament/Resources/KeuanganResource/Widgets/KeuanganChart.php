<?php

namespace App\Filament\Resources\KeuanganResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Keuangan;

class KeuanganChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Keuangan per Kategori';


    protected function getData(): array
    {
        $data = Keuangan::selectRaw('kategori as nama_kategori, COUNT(*) as total')
        ->groupBy('kategori')
        ->pluck('total', 'nama_kategori')
        ->toArray();
    
    
        return [
            'datasets' => [
                [
                    'label' => 'Ringkasan Keuangan',
                    'data' => array_values($data),
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