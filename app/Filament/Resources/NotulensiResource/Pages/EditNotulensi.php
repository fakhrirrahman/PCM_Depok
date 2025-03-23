<?php

namespace App\Filament\Resources\NotulensiResource\Pages;

use App\Filament\Resources\NotulensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNotulensi extends EditRecord
{
    protected static string $resource = NotulensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hapus'),
        ];
    }
}
