<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Anggota;
use Filament\Widgets\StatsOverviewWidget\Card;


class AnggotaCountWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 3; // Mengatur jumlah kolom untuk tampilan lebih teratur
    }

    protected function getStats(): array
    {
        $totalAnggota = Anggota::count();
        $activeAnggota = Anggota::where('status', 'aktif')->count();
        $inactiveAnggota = Anggota::where('status', 'nonaktif')->count();

        return [
            Stat::make('Total Anggota', $totalAnggota)
                ->description('Jumlah total anggota saat ini')
                ->icon('heroicon-o-users')
                ->color('primary')
                ->chart([2, 5, 8, 10, 12, 15, 18]) // Contoh grafik tren data
                ->extraAttributes(['class' => 'p-4 shadow-md rounded-lg bg-white']),

            Stat::make('Anggota Aktif', $activeAnggota)
                ->description('Anggota yang sedang aktif')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->chart([1, 4, 6, 8, 10, 12, 14]) // Contoh grafik tren data
                ->extraAttributes(['class' => 'p-4 shadow-md rounded-lg bg-white']),

            Stat::make('Anggota Nonaktif', $inactiveAnggota)
                ->description('Anggota yang tidak aktif')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->chart([3, 2, 4, 5, 7, 6, 5]) // Contoh grafik tren data
                ->extraAttributes(['class' => 'p-4 shadow-md rounded-lg bg-white']),
        ];
    }
}
