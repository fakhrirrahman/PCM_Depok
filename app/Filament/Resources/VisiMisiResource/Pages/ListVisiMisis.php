<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisiMisis extends ListRecords
{
    protected static string $resource = VisiMisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Visi Misi')
                ->color('success'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            VisiMisiResource::getUrl() => 'Visi Misi',
            url()->current() => 'Data Visi Misi',
        ];
    }
}
