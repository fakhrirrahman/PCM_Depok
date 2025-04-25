<?php

namespace BezhanSalleh\FilamentShield\Resources\RoleResource\Pages;

use BezhanSalleh\FilamentShield\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('tambah peran'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            RoleResource::getUrl() => 'Peran',
            url()->current() => 'Data Peran',
        ];
    }

}
