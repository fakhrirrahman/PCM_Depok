<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleris extends ListRecords
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Galeri'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            GaleriResource::getUrl() => 'Galeri',
            url()->current() => 'Data Galeri',
        ];
    }
}
