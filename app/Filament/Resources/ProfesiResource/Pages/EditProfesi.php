<?php

namespace App\Filament\Resources\ProfesiResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProfesiResource;

class EditProfesi extends EditRecord
{
    protected static string $resource = ProfesiResource::class;


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
            ProfesiResource::getUrl() => 'Profesi',
            url()->current() => 'Edit Kategori profesi',
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

