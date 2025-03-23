<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;
    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Kegiatan'; // Ubah teks di sini
    }
}
