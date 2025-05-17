<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AnggotaResource;
use App\Filament\Resources\AnggotaResource\Widgets\AnggotaTglPieChart;
use App\Filament\Resources\AnggotaResource\Widgets\AnggotaStatsOverview;
use App\Filament\Resources\AnggotaResource\Widgets\AnggotaTahunLineChart;
use App\Filament\Resources\AnggotaResource\Widgets\AnggotaProfesiPieChart;

class ListAnggotas extends ListRecords
{
    protected static string $resource = AnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Anggota')
        ];
    }

  protected function getHeaderWidgets(): array
{
    return [
        AnggotaStatsOverview::class,
        AnggotaTglPieChart::class,
        AnggotaTahunLineChart::class,
    ];
}
  

    public function getBreadcrumbs(): array
    {
        return [
            AnggotaResource::getUrl() => 'Anggota',
            url()->current() => 'Data Anggota',
        ];
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         AnggotaProfesiPieChart::class, // <- Tambahkan widget kamu disini
    //     ];
    // }
}
