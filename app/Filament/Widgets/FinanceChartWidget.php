<?php

namespace App\Filament\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\LineChartWidget;

class FinanceChartWidget extends LineChartWidget
{
    protected static ?string $heading = 'Keuangan';

    protected function getData(): array
    {
        // Inisialisasi array pemasukan dan pengeluaran untuk setiap bulan (12 bulan)
        $pemasukan = array_fill(0, 12, 0);
        $pengeluaran = array_fill(0, 12, 0);

        // Ambil data keuangan dari database dan kelompokkan berdasarkan bulan serta jenis transaksi
        $keuangan = Keuangan::selectRaw('MONTH(tanggal_transaksi) as bulan, jenis_transaksi, SUM(jumlah) as total')
            ->groupBy('bulan', 'jenis_transaksi')
            ->get();

        // Loop melalui hasil query dan isi array pemasukan & pengeluaran berdasarkan bulan
        foreach ($keuangan as $item) {
            $index = $item->bulan - 1; // Sesuaikan index agar sesuai dengan array (0-based)

            if ($item->jenis_transaksi === 'Pemasukan') {
                $pemasukan[$index] = $item->total;
            } elseif ($item->jenis_transaksi === 'Pengeluaran') {
                $pengeluaran[$index] = $item->total;
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
                'Desember',
            ],
        ];
    }
}
