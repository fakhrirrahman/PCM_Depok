<?php

namespace App\Filament\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\LineChartWidget;

class FinanceChartWidget extends LineChartWidget
{
    protected static ?string $heading = 'Grafik Keuangan';

    protected function getData(): array
    {
        $data = Keuangan::selectRaw('DATE(tanggal_transaksi) as date, SUM(jumlah) as total, tipe')
            ->groupBy('date', 'tipe')
            ->orderBy('date', 'asc')
            ->get();

        $dates = $data->pluck('date')->unique()->values();

        $pemasukan = $dates->map(fn($date) => $data->where('date', $date)->where('tipe', 'pemasukan')->sum('total'));
        $pengeluaran = $dates->map(fn($date) => $data->where('date', $date)->where('tipe', 'pengeluaran')->sum('total'));

        return [
            'labels' => $dates->toArray(),
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => $pemasukan->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.5)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $pengeluaran->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
