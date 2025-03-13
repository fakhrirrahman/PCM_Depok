<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;

class CustomDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.custom-dashboard';
    protected static ?string $navigationLabel = 'Dashboard Utama';
    protected static ?string $title = '🎯 Dashboard Kinerja';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('refresh')
                ->label('Refresh Data')
                ->icon('heroicon-m-arrow-path')
                ->color('success')
                ->action(fn() => $this->refreshPage())
                ->tooltip('Klik untuk memperbarui data terbaru'),
        ];
    }
    protected function refreshPage()
    {
        $this->dispatch('refreshData');
    }
}
