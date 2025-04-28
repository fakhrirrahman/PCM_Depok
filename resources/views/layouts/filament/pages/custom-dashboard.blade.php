<x-filament::page>
    <div class="grid grid-cols-1 gap-4">
        @foreach (static::getWidgets() as $widget)
        @livewire($widget)
        @endforeach
    </div>
</x-filament::page>