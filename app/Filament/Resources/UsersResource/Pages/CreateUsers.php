<?php

namespace App\Filament\Resources\UsersResource\Pages;

use Filament\Notifications\Notification;
use App\Filament\Resources\UsersResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUsers extends CreateRecord
{
    protected static string $resource = UsersResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Pengguna'; // Ubah teks di sini
    }

    public function getBreadcrumbs(): array
    {
        return [
            UsersResource::getUrl() => 'Pengguna',
            url()->current() => 'Tambah Pengguna',
        ];
    }
    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Simpan'); 
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
            ->body('Data pengguna berhasil disimpan.')
            ->success();
    }
}
