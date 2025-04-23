<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\VisiMisiResource;

class CreateVisiMisi extends CreateRecord
{
    protected static string $resource = VisiMisiResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Visi Misi'; // Ubah teks di sini
    }

    public function getBreadcrumbs(): array
    {
        return [
            VisiMisiResource::getUrl() => 'Visi Misi',
            url()->current() => 'Tambah Visi Misi',
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
            ->body('Data visi misi berhasil disimpan.')
            ->success();
    }
}

