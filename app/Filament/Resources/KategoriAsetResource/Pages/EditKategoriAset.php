<?php

namespace App\Filament\Resources\KategoriAsetResource\Pages;

use App\Filament\Resources\KategoriAsetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriAset extends EditRecord
{
    protected static string $resource = KategoriAsetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
