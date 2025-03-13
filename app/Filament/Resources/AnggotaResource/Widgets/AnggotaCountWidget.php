<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Anggota;
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

            Stat::make('Total Data Pimpinan', StrukturOrganisasi::count())
                ->description('Jumlah total pimpinan saat ini')
                ->color('primary')
                ->icon('heroicon-m-building-office'), // Ikon gedung kantor di Filament 3
        ];
    }
}
