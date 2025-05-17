<?php

namespace App\Filament\Resources\AnggotaResource\Widgets;

use App\Models\Anggota;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class AnggotaStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Jumlah Anggota', Anggota::count()),
            Card::make('Jumlah Profesi', Anggota::distinct('profesi')->count('profesi')),
            Card::make('Jumlah Ranting', Anggota::distinct('ranting')->count('ranting')),
        ];
    }
}
