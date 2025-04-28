<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KategoriResource;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Kategori Keuangan'; 
    }

    public function getBreadcrumbs(): array
    {
        return [
            KategoriResource::getUrl() => 'Kategori Keuangan',
            url()->current() => 'Tambah Kategori Keuangan',
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
            ->body('Data anggota berhasil disimpan.')
            ->success();
    }

}
