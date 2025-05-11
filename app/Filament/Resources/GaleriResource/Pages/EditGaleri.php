<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\GaleriResource;

class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Hapus Galeri'),
        ];
    }

    protected function getSavedNotification(): Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data galeri berhasil diperbarui.')
            ->success();
    }

    public function getBreadcrumbs(): array
    {
        return [
            GaleriResource::getUrl() => 'Galeri',
            url()->current() => 'Edit Galeri',
        ];
    }
    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }
}
