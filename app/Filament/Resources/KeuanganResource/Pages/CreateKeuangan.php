<?php

namespace App\Filament\Resources\KeuanganResource\Pages;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KeuanganResource;

class CreateKeuangan extends CreateRecord
{
    protected static string $resource = KeuanganResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Keuangan'; // Ubah teks di sini
    }
    
    public function getBreadcrumbs(): array
    {
        return [
            KeuanganResource::getUrl() => 'Keuangan',
            url()->current() => 'Tambah Keuangan',
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
            ->body('Data keuangan berhasil disimpan.')
            ->success();
    }
}
