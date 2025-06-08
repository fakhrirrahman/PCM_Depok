<?php

namespace App\Filament\Pages;

use App\Filament\Resources\KeuanganResource\Widgets\KeuanganChart;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\AnggotaResource\Widgets\AnggotaProfesiPieChart;

class CustomDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard Utama';
    protected static ?string $title = '🎯 Dashboard Utama';
    protected static string $view = 'filament.pages.custom-dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            AnggotaProfesiPieChart::class,
            KeuanganChart::class,
        ];
    }

    public function getActions(): array
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
                    $this->redirect(url()->current());
                }),
        ];
    }
}
