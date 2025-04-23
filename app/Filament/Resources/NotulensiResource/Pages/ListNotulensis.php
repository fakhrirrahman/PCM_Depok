<?php

namespace App\Filament\Resources\NotulensiResource\Pages;

use App\Filament\Resources\NotulensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNotulensis extends ListRecords
{
    protected static string $resource = NotulensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Notulensi')
                ->color('success'),
        ];
    }
    public function getBreadcrumbs(): array
    {
        return [
            NotulensiResource::getUrl() => 'Notulensi',
            url()->current() => 'Data Notulensi',
        ];
    }
}
