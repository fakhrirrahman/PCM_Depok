<?php

namespace App\Filament\Resources\KategoriAsetResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\KategoriAsetResource;

class EditKategoriAset extends EditRecord
{
    protected static string $resource = KategoriAsetResource::class;
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
            KategoriAsetResource::getUrl() => 'Kategori Aset',
            url()->current() => 'Edit Kategori Aset',
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
            ->body('Data anggota berhasil diperbarui.')
            ->success();
    }
}
