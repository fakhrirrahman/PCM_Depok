<?php

namespace App\Filament\Resources\RantingResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\RantingResource;
use App\Filament\Resources\NotulensiResource;

class CreateRanting extends CreateRecord
{
    protected static string $resource = RantingResource::class;

     public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Ranting'; 
    }
    
    public function getBreadcrumbs(): array
    {
        return [
            NotulensiResource::getUrl() => 'Ranting',
            url()->current() => 'Tambah Ranting',
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
            ->body('Data notulensi berhasil disimpan.')
            ->success();
    }

}
