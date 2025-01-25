<?php

namespace App\Filament\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\LineChartWidget;

class FinanceChartWidget extends LineChartWidget
{
    protected static ?string $heading = 'Keuangan';

    protected function getData(): array
    {
        // Inisialisasi array pemasukan dan pengeluaran untuk setiap bulan
        $pemasukan = array_fill(0, 12, 0);
        $pengeluaran = array_fill(0, 12, 0);

        // Ambil data keuangan dari database dan kelompokkan berdasarkan bulan
        $keuangan = Keuangan::selectRaw('MONTH(tanggal_transaksi) as bulan, jenis_transaksi, SUM(jumlah) as total')
            ->groupBy('bulan', 'jenis_transaksi')
            ->get();

        foreach ($keuangan as $item) {
            if ($item->jenis_transaksi === 'Pemasukan') {
                $pemasukan[$item->bulan - 1] = $item->total;
            } elseif ($item->jenis_transaksi === 'Pengeluaran') {
                $pengeluaran[$item->bulan - 1] = $item->total;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $pemasukan,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Pengeluaran',
                    'data' => $pengeluaran,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ],
        ];
    }
}
