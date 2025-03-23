<?php

namespace App\Filament\Resources\NotulensiResource\Pages;

use App\Filament\Resources\NotulensiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNotulensi extends CreateRecord
{
    protected static string $resource = NotulensiResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Notulensi'; // Ubah teks di sini
    }
}
