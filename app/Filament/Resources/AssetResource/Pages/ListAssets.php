<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Filament\Resources\AssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssets extends ListRecords
{
    protected static string $resource = AssetResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Aset')
        ];
    }
    //make no data table
  

    public function getBreadcrumbs(): array
    {
        return [
            AssetResource::getUrl() => 'Aset',
            url()->current() => 'Data Aset',
        ];
    }
}
