<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Keuangan;

class AnggotaCountWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $filters = session('dashboard_filters', []);

        $keuanganQuery = Keuangan::query();

        if (!empty($filters['from'])) {
            $keuanganQuery->whereDate('tanggal_transaksi', '>=', $filters['from']);
        }

        if (!empty($filters['until'])) {
            $keuanganQuery->whereDate('tanggal_transaksi', '<=', $filters['until']);
        }

        $totalPengeluaran = (clone $keuanganQuery)->where('tipe', 'pengeluaran')->sum('jumlah');
        $totalPemasukan = (clone $keuanganQuery)->where('tipe', 'pemasukan')->sum('jumlah');
        $totalSaldoAkhir = $totalPemasukan - $totalPengeluaran;

        return [
            Stat::make('Total Anggota', Anggota::count())
                ->description('Jumlah total anggota saat ini')
                ->color('primary')
                ->icon('heroicon-o-users'),

            Stat::make('Total Data Kegiatan', Kegiatan::count())
                ->description('Jumlah kegiatan saat ini')
                ->color('primary')
                ->icon('heroicon-m-clipboard-document-list'),
                
                Stat::make('Total Pemasukan', 'Rp ' . number_format($totalPemasukan, 0, ',', '.'))
                ->description('Total semua pemasukan (berdasarkan filter)')
                ->color('success')
                ->icon('heroicon-m-arrow-trending-up'),

            Stat::make('Total Pengeluaran', 'Rp ' . number_format($totalPengeluaran, 0, ',', '.'))
                ->description('Total semua pengeluaran (berdasarkan filter)')
                ->color('danger')
                ->icon('heroicon-m-arrow-trending-down'),

        

            Stat::make('Saldo Akhir', 'Rp ' . number_format($totalSaldoAkhir, 0, ',', '.'))
                ->description('Saldo akhir berdasarkan pemasukan & pengeluaran (berdasarkan filter)')
                ->color('success')
                ->icon('heroicon-m-banknotes'),
        ];
    }
}
