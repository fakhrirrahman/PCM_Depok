<?php

namespace App\Filament\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\LineChartWidget;
use Illuminate\Support\Carbon;

class FinanceChartWidget extends LineChartWidget
{
    protected static ?string $heading = 'Grafik Keuangan Bulanan';

    protected function getData(): array
    {
        // Ambil data dan format bulan sebagai key
        $data = Keuangan::selectRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as bulan, SUM(jumlah) as total, tipe")
            ->groupBy('bulan', 'tipe')
            ->orderBy('bulan', 'asc')
            ->get();

        // Ambil semua bulan unik
        $bulanKeys = $data->pluck('bulan')->unique()->values();

        // Ubah ke format yang lebih ramah (contoh: April 2025)
        $labels = $bulanKeys->map(function ($bulan) {
            return Carbon::createFromFormat('Y-m', $bulan)->translatedFormat('F Y');
        });

        // Ambil data masing-masing tipe
        $pemasukan = $bulanKeys->map(
            fn($bulan) =>
            $data->where('bulan', $bulan)->where('tipe', 'pemasukan')->sum('total')
        );

        $pengeluaran = $bulanKeys->map(
            fn($bulan) =>
            $data->where('bulan', $bulan)->where('tipe', 'pengeluaran')->sum('total')
        );

        return [
            'labels' => $labels->toArray(),
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => $pemasukan->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'tension' => 0.4,
                    'fill' => true,
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $pengeluaran->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'tension' => 0.4,
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
