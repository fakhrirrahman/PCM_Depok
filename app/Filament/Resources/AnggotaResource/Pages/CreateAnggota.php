<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use App\Filament\Resources\AnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;

class CreateAnggota extends CreateRecord
{
    protected static string $resource = AnggotaResource::class;
    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Anggota'; // Ubah teks di sini
    }

    public function getBreadcrumbs(): array
    {
        return [
            AnggotaResource::getUrl() => 'Anggota',
            url()->current() => 'Tambah Anggota',
        ];
    }
    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Simpan'); // Tombol utama
    }

    protected function getCreateAnotherFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('simpan dan buat baru')
            ->hidden();
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }

    protected function getCreatedNotification(): Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data anggota berhasil disimpan.')
            ->success();
    }
}
