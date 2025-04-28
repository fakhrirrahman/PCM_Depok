<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\KategoriResource;

class EditKategori extends EditRecord
{
    protected static string $resource = KategoriResource::class;

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
            KategoriResource::getUrl() => 'Kategori Keuangan',
            url()->current() => 'Edit Kategori Keuangan',
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
