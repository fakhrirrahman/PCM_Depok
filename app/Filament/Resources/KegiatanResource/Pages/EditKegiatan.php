<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\KegiatanResource;

class EditKegiatan extends EditRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hapus'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            KegiatanResource::getUrl() => 'Kegiatan',
            url()->current() => 'Edit Kegiatan',
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
    protected function getSavedNotification(): Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data kegiatan berhasil diperbarui.')
            ->success();
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id(); // set user yang melakukan update
        return $data;
    }
}
