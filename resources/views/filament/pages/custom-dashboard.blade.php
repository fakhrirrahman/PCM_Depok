<x-filament::page>
    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
        @livewire(\App\Filament\Resources\AnggotaResource\Widgets\AnggotaCountWidget::class)
        {{-- @livewire(\Filament\Widgets\AccountWidget::class) --}}
        {{-- @livewire(\Filament\Widgets\FilamentInfoWidget::class) --}}
    </div>
</x-filament::page>