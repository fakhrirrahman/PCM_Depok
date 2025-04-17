<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Keuangan;
use App\Models\StrukturOrganisasi;

class AnggotaCountWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2; // Menampilkan dalam 2 kolom
    }

    protected function getStats(): array
    {
        return [

            Stat::make('Total Anggota', Anggota::count())
                ->description('Jumlah total anggota saat ini')
                ->color('primary')
                ->icon('heroicon-o-users'),

            Stat::make('Total Data Kegiatan', Kegiatan::count())
                ->description('Jumlah kegiatan saat ini')
                ->color('primary')
                ->icon('heroicon-m-clipboard-document-list'),

            Stat::make('Total Pengeluaran', 'Rp ' . number_format(Keuangan::where('tipe', 'pengeluaran')->sum('jumlah'), 0, ',', '.'))
                ->description('Total semua pengeluaran')
                ->color('danger')
                ->icon('heroicon-m-arrow-trending-down'),
            Stat::make('Total Pemasukan', 'Rp ' . number_format(Keuangan::where('tipe', 'pemasukan')->sum('jumlah'), 0, ',', '.'))
                ->description('Total semua pemasukan')
                ->color('success')
                ->icon('heroicon-m-arrow-trending-up')

        ];
    }
}
