<x-filament::page>
    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
        @livewire(\App\Filament\Resources\AnggotaResource\Widgets\AnggotaCountWidget::class)
        @livewire(\App\Filament\Resources\AnggotaResource\Widgets\AnggotaProfesiPieChart::class)</div>
</x-filament::page>