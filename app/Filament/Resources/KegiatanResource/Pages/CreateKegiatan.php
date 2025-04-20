<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KegiatanResource;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;
    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Kegiatan'; // Ubah teks di sini
    }

    public function getBreadcrumbs(): array
    {
        return [
            KegiatanResource::getUrl() => 'Kegiatan',
            url()->current() => 'Tambah Kegiatan',
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
            ->body('Data kegiatan berhasil disimpan.')
            ->success();
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }
}
