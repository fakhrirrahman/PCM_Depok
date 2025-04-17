<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleris extends ListRecords
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Galeri'),
        ];
    }

    protected function getEmptyStateHeading(): ?string
    {
        return 'Belum Ada Gambar Galeri';
    }

    protected function getEmptyStateDescription(): ?string
    {
        return 'Silakan tambahkan gambar ke galeri dengan menekan tombol di bawah.';
    }

    protected function getEmptyStateIcon(): ?string
    {
        return 'heroicon-o-photo';
    }

    protected function getEmptyStateActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Galeri'),
        ];
    }
}
