<?php

namespace App\Filament\Resources\StrukturOrganisasiResource\Pages;

use App\Filament\Resources\StrukturOrganisasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrukturOrganisasis extends ListRecords
{
    protected static string $resource = StrukturOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Sturktur Organisasi'),
        ];
    }
    public function getBreadcrumbs(): array
    {
        return [
            StrukturOrganisasiResource::getUrl() => 'Struktur Organisasi',
            url()->current() => 'Data Struktur Organisasi',
        ];
    }
}
