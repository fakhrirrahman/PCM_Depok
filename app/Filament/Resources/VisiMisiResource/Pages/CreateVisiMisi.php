<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVisiMisi extends CreateRecord
{
    protected static string $resource = VisiMisiResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Visi Misi'; // Ubah teks di sini
    }
}
