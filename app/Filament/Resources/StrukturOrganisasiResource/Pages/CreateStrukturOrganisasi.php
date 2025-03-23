<?php

namespace App\Filament\Resources\StrukturOrganisasiResource\Pages;

use App\Filament\Resources\StrukturOrganisasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStrukturOrganisasi extends CreateRecord
{
    protected static string $resource = StrukturOrganisasiResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Struktur Organisasi'; // Ubah teks di sini
    }
}
