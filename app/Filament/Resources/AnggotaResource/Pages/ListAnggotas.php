<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AnggotaResource;
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
    //make no data table
  

    public function getBreadcrumbs(): array
    {
        return [
            AnggotaResource::getUrl() => 'Anggota',
            url()->current() => 'Data Anggota',
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AnggotaProfesiPieChart::class, // <- Tambahkan widget kamu disini
        ];
    }
}
