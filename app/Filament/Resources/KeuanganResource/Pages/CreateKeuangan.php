<?php

namespace App\Filament\Resources\KeuanganResource\Pages;

use App\Filament\Resources\KeuanganResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKeuangan extends CreateRecord
{
    protected static string $resource = KeuanganResource::class;

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Tambah Keuangan'; // Ubah teks di sini
    }
}
