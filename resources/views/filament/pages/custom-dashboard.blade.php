<x-filament::page>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @livewire(\App\Filament\Resources\AnggotaResource\Widgets\AnggotaCountWidget::class)
        @livewire(\App\Filament\Widgets\FinanceChartWidget::class)
        {{-- @livewire(\Filament\Widgets\AccountWidget::class) --}}
        {{-- @livewire(\Filament\Widgets\FilamentInfoWidget::class) --}}
    </div>
</x-filament::page>