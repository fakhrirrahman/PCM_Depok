<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

  

    public function getBreadcrumbs(): array
    {
        return [
            ContactResource::getUrl() => 'Pesan',
            url()->current() => 'Data Pesan',
        ];
    }
}
