<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Anggota;

class AnggotaCountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Anggota', Anggota::count())
                ->description('Jumlah total anggota saat ini')
                ->icon('heroicon-o-users'),
        ];
    }
}
