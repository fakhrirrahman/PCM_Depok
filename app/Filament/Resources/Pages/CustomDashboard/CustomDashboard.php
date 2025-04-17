<?php

namespace App\Filament\Pages;

use App\Models\Keuangan;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class CustomDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.custom-dashboard';
    protected static ?string $navigationLabel = 'Dashboard Utama';
    protected static ?string $title = '🎯 Dashboard Kinerja';

    public function getHeaderActions(): array
    {
        return [
            Action::make('filter')
                ->label('Filter Tanggal')
                ->icon('heroicon-o-calendar-days')
                ->modalHeading('Filter Berdasarkan Tanggal')
                ->modalSubmitActionLabel('Terapkan Filter')
                ->modalCancelActionLabel('Batal')
                ->modalWidth('sm')
                ->form([
                    DatePicker::make('from')->label('Dari Tanggal'),
                    DatePicker::make('until')->label('Sampai Tanggal'),
                ])
                ->action(function (array $data): void {
                    session([
                        'dashboard_filters' => $data,
                    ]);

                    $this->redirect(request()->header('Referer'));
                }),
        ];
    }
}
