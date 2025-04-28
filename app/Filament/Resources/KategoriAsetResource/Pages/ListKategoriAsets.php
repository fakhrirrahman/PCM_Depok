<?php

namespace App\Filament\Resources\KategoriAsetResource\Pages;

use App\Filament\Resources\KategoriAsetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriAsets extends ListRecords
{
    protected static string $resource = KategoriAsetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Kategori Aset')
        ];
    }
    //make no data table
  

    public function getBreadcrumbs(): array
    {
        return [
            KategoriAsetResource::getUrl() => 'Kategori Aset',
            url()->current() => 'Data Kategori Aset',
        ];
    }
}
